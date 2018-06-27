<?php
session_start();
$varsesion = $_SESSION['usuario'];

if($varsesion == null || $varsesion = ''){
echo 'Acceso Denegado';
die();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="Css/superslides.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
        <link rel="stylesheet" href="Css/styles.css">
        <link rel="stylesheet" href="Css/navbar-footer.css">
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
                <li><a href="">Inicio</a></li>
                <li><a href="incidencia.php">Generar Incidencia</a></li>
                <li><a href="historial.php">Historial</a></li>
                <li><a href="cerrar-sesion.php">Salir</a></li>
                
            </ul>
        </nav>
        </div>
    </header>
    </div>
    <div id="slides">
        <ul class="slides-container">
            <li>
               <img src="Img/inicio1.jpg" alt="">
                <div class="description">
                    <h1 class="mod_titulo">Bienvenido <br> <?php echo $_SESSION ['infousuario']['nombre']. " ". $_SESSION['infousuario']['apellidos']; ?></h1>
                    <p class="mod_parrafo">¿Tienes una falla? Registrala inmediatamente en nuestro sistema con el fin de que tenga la mas pronta atencion por parte de nuestros tecnicos disponibles, asi cumplir con el objetivo de esta aplicacion y mejorar tu experiencia.</p>
                    <button onclick="window.location.href='incidencia.php'">Ver</button>
                </div>
            </li>
            <li>
            <img src="Img/inicio2.jpg" alt="">
            <div class="description">
                    <h1 class="mod_titulo">Configura tus Datos</h1>
                    <p class="mod_parrafo">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione consequuntur cum a ipsum labore, nostrum blanditiis quod optio porro, corrupti cupiditate amet fugiat, adipisci alias dolores! Excepturi unde perferendis, mollitia?</p>
                    <button onclick="window.location.href='incidencia.html'">Ver</button>
                </div>
            </li>
            <li>
            <img src="Img/inicio3.jpg" alt="">
            <div class="description">
                    <h1 class="mod_titulo">Vigilado por Administrador</h1>
                    <p class="mod_parrafo">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione consequuntur cum a ipsum labore, nostrum blanditiis quod optio porro, corrupti cupiditate amet fugiat, adipisci alias dolores! Excepturi unde perferendis, mollitia?</p>
                    <button onclick="window.location.href='incidencia.html'">Ver</button>
                </div>
            </li>
            <li>
            <img src="Img/inicio4.jpg" alt="">
            <div class="description">
                    <h1 class="mod_titulo">Solucion Efectiva y Pronta</h1>
                    <p class="mod_parrafo">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione consequuntur cum a ipsum labore, nostrum blanditiis quod optio porro, corrupti cupiditate amet fugiat, adipisci alias dolores! Excepturi unde perferendis, mollitia?</p>
                    <button onclick="window.location.href='incidencia.html'">Ver</button>
                </div>
            </li>
        </ul>
        <nav class="slides-navigation">
               <a href="#" class="next">&#62;</a>
               <a href="#" class="prev">&#60;</a>
        </nav>
    </div>
    <footer class="footer">
        <div class="social">
            <a class="icon-facebook"></a>
            <a class="icon-twitter"></a>
            <a class="icon-instagram"></a>
        </div>
        <p class="copy"> &copy; IMDA TYT Adsi los mejores - 2018 todas las recochas reservadas. <?php echo $_SESSION ['infousuario']['idusuario']; ?></p>
    </footer>
    <script src="Javascript/jquery.js"></script>
    <script src="Javascript/jquery.superslides.js"></script>
    </body>
</html>