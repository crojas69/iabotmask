<?php

$url = "https://chatwoot-test.iabot.com.co/app/login";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
curl_close($ch);

// QUITAR CABECERAS QUE BLOQUEEN EL IFRAME
$response = preg_replace('/<meta[^>]+http-equiv=["\']Content-Security-Policy["\'][^>]*>/i', '', $response);
$response = preg_replace('/X-Frame-Options/i', '', $response);

// LIMPIARLE HEADER Y FOOTER DE CHATWOOT
$response = preg_replace('/<header[^>]*>.*?<\/header>/is', '', $response);
$response = preg_replace('/<footer[^>]*>.*?<\/footer>/is', '', $response);
$response = preg_replace('/<img[^>]*(logo|brand)[^>]*>/i', '', $response);

// FUENTES PARA PERSONALIZAR
$custom_css = "
<style>
  body {
    background-color: #f6f7f8 !important;
    font-family: 'Sans-Serif', Arial, Helvetica !important;
  }
  .navbar, .sidebar, .topbar, .branding, .app-header {
    display: none !important;
  }
  .main-container, .content, .app {
    width: 100% !important;
    max-width: 100% !important;
    background-color: #ffffff !important;
    padding: 20px !important;
    box-shadow: none !important;
    border-radius: 12px !important;
  }
  button, .btn {
    border-radius: 8px !important;
    background-color: #F19106 !important;
    color: white !important;
    border: none !important;
    padding: 8px 16px !important;
    font-weight: bold !important;
    cursor: pointer !important;
  }
  button:hover, .btn:hover {
    background-color: #cb6216 !important;
  }
  /* Oculta cualquier texto de marca */
  [class*='powered'], [class*='brand'], [class*='logo'], .footer-text {
    display: none !important;
  }
  /* Espaciado superior para dejar espacio al logo */
  #custom-logo {
    display: block;
    max-width: 280px;
    margin: 10px auto 20px auto;
  }
</style>
<img id='custom-logo' src='https://web2.iabot.com.co/wp-content/uploads/2025/07/HEADER-AF-1.png' alt='Smartbot Logo'>
";

$response = preg_replace('/<\/head>/i', $custom_css . '</head>', $response, 1);

// ACTIVAR CABECERAS HTTP
header("Content-Type: text/html; charset=UTF-8");
header("X-Frame-Options: ALLOWALL");
header("Access-Control-Allow-Origin: *");

echo $response;
exit;
?>
