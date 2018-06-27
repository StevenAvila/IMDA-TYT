<?php
session_start();
$varsesion = $_SESSION['usuario'];

if($varsesion == null || $varsesion = ''){
echo 'Acceso Denegado';
die(); 
}
include 'conexion.php';

 $num_id = $_GET['id'];

?>
<html>
    <head>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
       <link rel="stylesheet" href="Css/styles.css">
       <link rel="stylesheet" href="Css/navbar-footer-tecnico.css">
       <link rel="stylesheet" href="Css/style-informe.css">
    </head>
    <body>
        <!----------------------------------------------NAVBAR---------------------------------------------->
        <header>
       <div class="cont-head">
                      <img src="Img/tyt-logo.png" alt="" class="logotyt">
        <input type="checkbox" id="btn-menu">
        <label for="btn-menu"><span class="icon-lista" ></span></label>
        <nav class="menu">
            <ul>
                <li><a href="tecnico.php">Inicio</a></li>
                <li><a href="lista-tickets-tec.php">Lista Incidencias</a></li>
                <li><a href="lista-informes.php">Informes</a></li>
                <li><a href="cerrar-sesion.php">Salir</a></li>
                
            </ul>
        </nav>
        </div>
    </header>
    <!--------------------------------------------------FORMULARIO-------------------------------------------------->
    <h1>INFORME DEL TICKET <?php echo $num_id?></h1>
    
    <form action="enviar-informe.php" method="post">
       <table>
       
       <tr>
           <td><label for="">Id Ticket: </label></td>
           <input type="hidden" id="fecha-fin" name="id" class="input-100" value="<?php echo $num_id ?>"  required>
           <td><label name="idticket"><?php echo $num_id ?></label></td> 
        </tr>
       <tr>
           <td><label for="">Fecha Final</label></td>   
        <td><input type="date" id="fecha-fin" name="fecha-fin" placeholder="Nombres" class="fecha-style"  required></td>
        </tr>
        <tr>
            <td><label for="">Comentario Final</label></td>
        <td><textarea name="comentario" id="comentario" cols="30" rows="10" maxlength="100"></textarea></td>
        </tr>
        </table>
        
        <button type="submit"> Enviar </button>
    </form>
    
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