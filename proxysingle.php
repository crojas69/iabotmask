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

// FUENTES PARA PERSONALIZAR
$custom_css = "
<style>
  body {
    background-color: #f6f7f8 !important;
    font-family: 'Sans-Serif', Arial, Helvetica !important;
  }
  .app-header, .navbar, .sidebar {
    display: none !important; /* Oculta barras laterales o menús si los hay */
  }
  .main-container, .content {
    width: 100% !important;
    max-width: 100% !important;
    background-color: #f6f7f8 !important;
    padding: 20px !important;
    box-shadow: none !important;
  }
  button, .btn {
    border-radius: 8px !important;
    background-color: #F19106 !important;
    color: white !important;
  }
</style>
";

// INTECTAR EL CSS </head>
$response = preg_replace('/<\/head>/i', $custom_css . '</head>', $response, 1);

// ACTIVAR CABECERAS HTTP
header("Content-Type: text/html; charset=UTF-8");
header("X-Frame-Options: ALLOWALL");
header("Access-Control-Allow-Origin: *");

echo $response;
exit;
?>
