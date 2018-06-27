<?php
session_start();
$varsesion = $_SESSION['usuario'];

if($varsesion == null || $varsesion = ''){
echo 'Acceso Denegado';
die();
}
?>
   <html>
    <head>
        <meta charset="utf-8">
           <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
           <link rel="stylesheet" href="Css/navbar-footer-tecnico.css">
           <link rel="stylesheet" href="Css/styles.css">
    </head>
    <body>
        <div class="contenedor-n">
    <header>
       <div class="cont-head">
                      <img src="Img/tyt-logo.png" alt="" class="logotyt">
        <input type="checkbox" id="btn-menu">
        <label for="btn-menu"><span class="icon-lista" ></span></label>
        <nav class="menu">
            <ul>
               <li><a href="tecnico.php">Inicio</a></li>
                <li><a href="lista-tickets-tec.php">Lista Incidencias</a></li>
                <li><a href="InformeTec.php">Informes</a></li>
                <li><a href="cerrar-sesion.php"><?php echo $_SESSION ['infousuario']['nombre']. " ". $_SESSION['infousuario']['apellidos']; ?></a></li>
            </ul>
        </nav>
        </div>
    </header>
    </div>
    <h1>INFORME</h1>
      <footer class="footer">
        <div class="social">
            <a class="icon-facebook"></a>
            <a class="icon-twitter"></a>
            <a class="icon-instagram"></a>
        </div>
        <p class="copy"> &copy; IMDA TYT Adsi los mejores - 2018 todas las recochas reservadas. </p>
    </footer>
    </body>
</html>