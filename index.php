<?php
// Cabeceras principales para evitar la descarga automática
header("Content-Type: text/html; charset=UTF-8");
header("X-Frame-Options: ALLOWALL");
header("Access-Control-Allow-Origin: *");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>IABOT Smartbot – JJMM</title>
  <style>
    html, body {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: Sans-Serif;
      line-height: 1.5em;
    }

    /* Contenedor principal con flex para layout vertical */
    #wrapper {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    /* Header y footer fijos en altura y contexto */
    #header, #footer {
      flex: 0 0 120px;
      background-repeat: no-repeat;
      background-position: center center;
      background-size: cover;
      position: sticky;
      left: 0;
      width: 100%;
      z-index: 999;
    }

    #header {
      top: 0;
      background-image: url("https://web2.iabot.com.co/wp-content/uploads/2025/07/HEADER-AF-1.png");
      background-color: #020303;
	  background-attachment: scroll;
    }

    #footer {
      bottom: 0;
      background-image: url("https://web2.iabot.com.co/wp-content/uploads/2025/07/FOOTER-AF-1.png");
	  background-attachment: scroll;
      background-color: #F6F7F8;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    /* Ajuste del contenido para que quede entre header y footer */
    main {
      flex: 1 0 auto;
      width: 100%;
    }

    iframe {
      width: 100%;
      height: 100%;
      border: none;
    }

    /* Imágenes posicionadas dentro del header */
    .innertube {
      display: flex;
      justify-content: space-between;
      align-items: center;
      height: 100%;
      padding: 0 1em;
    }

    .left-image, .center-image {
      height: 120px;
      width: auto;
    }

    .center-image {
      margin: 0 auto;
    }
  </style>
  <link type="image/x-icon" rel="shortcut icon" href="https://iabot.com.co/web/image/website/1/favicon?unique=0693908">
  <meta property="og:image" content="https://www.iabot.com.co/web/image/website/1/logo?unique=0693908">
</head>
<body>
  <div id="wrapper">
    <header id="header">
      <div class="innertube">
        <img class="left-image" src="https://web2.iabot.com.co/wp-content/uploads/2025/07/LOGO-IABOT-FONDOS-OSCUROS-2.png" alt="IABOT">
        <img class="right-image" width="220px" src="https://web2.iabot.com.co/wp-content/uploads/2025/07/FEMBOT-para-Header-1.png" alt="IABOT">
      </div>
    </header>

    <main>
	  <iframe src="proxy.php" width="100%" height="1024" scrolling="no" border="0">Iframes no soportados. Utilice otro navegador.</iframe>
    </main>

    <footer id="footer">
      <img class="center-image" src="https://web2.iabot.com.co/wp-content/uploads/2025/07/LOGO-IABOT-FONDOS-CLAROS-1.png" alt="IABOT">
    </footer>
  </div>
</body>
</html>
