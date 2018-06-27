<?php
session_start();
$varsesion = $_SESSION['usuario'];

if($varsesion == null || $varsesion = ''){
echo 'Acceso Denegado';
die(); 
}
include 'conexion.php';

    $num_id = $_GET['id'];
    
    $consulta="SELECT ticket.idticket, tipoequipo.idtipoequipo, tipoequipo.descripcionequipo, ticket.asunto_incidencia, ticket.fecha, ticket.descripcion_incidencia, usuario.idusuario, usuario.nombre, estado.id_estado, estado.descripcion FROM ticket
    INNER JOIN tipoequipo ON ticket.tipoequipo_idtipoequipo  = tipoequipo.idtipoequipo 
    INNER JOIN usuario ON ticket.usuario_idusuario = usuario.idusuario
    INNER JOIN estado ON ticket.estado_idestado = estado.id_estado
    WHERE idticket = '".$num_id."'";
    $resultado = $conexion->query($consulta);
?>
<html>
    <head>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
       <link rel="stylesheet" href="Css/styles.css">
       <link rel="stylesheet" href="Css/navbar-footer-tecnico.css">
       <link rel="stylesheet" href="Css/stylescambios.css">
    </head>
    <body>
    <!------------------------------------NAVBAR------------------------------------>
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
    <h1 class="tit-edit">Editar Ticket</h1>
    <!----------------------------------------FORMULARIO---------------------------------------->
    <form action="edit-ticket-tec-2.php" method="post">
       
       <?php
        while($tickets = $resultado->fetch_array(MYSQLI_BOTH))
        {
            echo'
            <table>
            <tr>
            <td><label class="subtitulo">ID: </label></td>
            <input type="hidden" name="idviejo" value=" '.$tickets['idticket'].'">
            <td><label class="subtitulo">'.$tickets['idticket'].'</label></td>
            </tr>
            <tr>
            <td><label class="subtitulo"> Tipo de Incidencia: </label></td>
            <td><label class="subtitulo">'.$tickets['descripcionequipo'].' </label></td>
            </tr>
            <tr>
            <td><label class="subtitulo">Asunto: </label></td>
            <td><label class="subtitulo">'.$tickets['asunto_incidencia'].'</label></td>
            </tr>
            <tr>
            <td><label class="subtitulo">Fecha: </label></td>
            <td><label class="subtitulo">'.$tickets['fecha'].'</label></td>
            </tr>
            <tr>
            <td><label class="subtitulo">Descripcion: </label></td>
            <td><label class="subtitulo">'.$tickets['descripcion_incidencia'].'</label></td>
            </tr>
            <tr>
            <td><label class="subtitulo">Usuario: </label></td>
            <td><label class="subtitulo">'.$tickets['nombre'].'</label></td>
            </tr>
            <tr>
            <td><label class="subtitulo"> Estado: </label></td>
                <td><select class="subtitulo "name="NuevoEstado" id="">
                    <option value="'.$tickets['id_estado'].'">'.$tickets['descripcion'].'</option>
                    <option value="1">En Revision</option>
                    <option value="2">Sin Atencion</option>
                    <option value="3">Solucionado</option>
                </select></td><br>
                </table>
                
            ';
        }
        ?>
        <br><button type="submit">Guardar Cambios</button>
        
    </form>
    <!-----------------------------------FOOTER----------------------------------->
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