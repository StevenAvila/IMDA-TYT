<?php
session_start();
$varsesion = $_SESSION['usuario'];

if($varsesion == null || $varsesion = ''){
echo 'Acceso Denegado';
die();
}
include 'conexion.php';


//Consulta base de Datos//
$consulta="SELECT informe.idinforme, informe.fecha_fin, informe.comentario, estado.descripcion, ticket.asunto_incidencia FROM informe
INNER JOIN ticket ON informe.ticket_idticket = ticket.idticket
INNER JOIN estado ON ticket.estado_idestado = estado.id_estado";
$resultado = $conexion->query($consulta);
if(!$resultado){
    echo 'error pto';
}

?>
<html>
    <head lang="es">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="Css/styles.css">
        <link rel="stylesheet" href="Css/navbar-footer-tecnico.css">
        <link rel="stylesheet" href="Css/styletabletecnico.css">
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
       
       <h1 class="tit-informe">Informes De <?php echo $_SESSION ['infousuario']['nombre']. " ". $_SESSION['infousuario']['apellidos']; ?></h1>
       <!-------------------------------------------------------TABLAS------------------------------------------------------->
       <table>
             <tr>
                 <th class="titulo1">id</th>
                 <th class="titulos">Fecha Final</th>
                 <th class="titulos">Comentario Del Tecnico</th>
                 <th class="titulos">Estado Del ticket</th>
                 <th class="titulof">Asunto del Ticket</th>
                 
             </tr>
        <!---------------------------DATOS--------------------------->
             <?php
             while($verinforme = $resultado->fetch_array(MYSQLI_BOTH))
             {
                 echo'<tr>
                        <th class="filas"> '.$verinforme['idinforme'].'</th>
                        <th class="filas">'.$verinforme['fecha_fin'].'</th>
                        <th class="filas"> '.$verinforme['comentario'].'</th>
                        <th class="filas"> '.$verinforme['descripcion'].'</th>
                        <th class="filas"> '.$verinforme['asunto_incidencia'].'</th>
                      </tr>';
             }
             ?>
         </table>
       
        
        <!------------------------------------------------------FOOTER------------------------------------------------------>
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