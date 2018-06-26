<?php
session_start();
$varsesion = $_SESSION['usuario'];

if($varsesion == null || $varsesion = ''){
echo 'Acceso Denegado';
die();
}
?>
   <html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="Css/navbar-footer-admin.css">
        <link rel="stylesheet" href="Css/styles.css">
    </head>
    <body>
       <header>
       <div class="cont-head">
                      <img src="Img/tyt-logo.png" alt="" class="logotyt">
        <input type="checkbox" id="btn-menu">
        <label for="btn-menu"><span class="icon-lista" ></span></label>
        <nav class="menu">
            <ul>
                <li><a href="administrador.php">Inicio</a></li>
                <li><a href="listausuarios.php">Lista Usuarios</a></li>
                <li><a href="tickets-admin.php">Lista Tickets</a></li>
                <li><a href="cerrar-sesion.php">Salir</a></li>
                
            </ul>
        </nav>
        </div>
    </header>
        <h1 class="tit-pr" >BIENVENIDO ADMINISTRADOR  <br> <?php echo $_SESSION ['infousuario']['nombre']. " ". $_SESSION['infousuario']['apellidos']; ?></h1>
        <footer class="footer">
        <div class="social">
            <a class="icon-facebook"></a>
            <a class="icon-twitter"></a>
            <a class="icon-instagram"></a>
        </div>
        <p class="copy"> &copy; IMDA TYT Adsi los mejores - 2018 todas las recochas reservadas. <?php echo $_SESSION ['infousuario']['idusuario']; ?></p>
    </footer>
    </body>
</html>