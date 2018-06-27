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
<html lang="es">
   <head>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
       <link rel="stylesheet" href="Css/navbar-footer-admin.css">
       <link rel="stylesheet" href="Css/styles.css">
       <link rel="stylesheet" href="Css/stylescambios-admin.css">
   </head>
    <body>
       <!-------------------------------------------------NAVBAR------------------------------------------------->
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
    <!----------------------------------------FORMULARIO---------------------------------------->
    <h1>Editar Ticket</h1>
      <form action="edit-ticket2.php" method="post">
       <?php
        while($tickets = $resultado->fetch_array(MYSQLI_BOTH))
        {
            echo'
            <table>
            <tr>
            <td><label>ID: </label></td>
            <input type="hidden" name="idviejo" value=" '.$tickets['idticket'].'">
            <td><label>'.$tickets['idticket'].'</label></td>
            </tr>
            <tr>
            <td><label> Tipo de Incidencia: </label></td>
                <td><select name="NuevoTipo" id="">
                    <option value="'.$tickets['idtipoequipo'].'">'.$tickets['descripcionequipo'].'</option>
                    <option value="1">Software</option>
                    <option value="2">Hardware</option>
                    <option value="3">Audiovisual</option>
                </select></td>
            </tr>
            <tr>    
            <td><label>Asunto: </label></td>
            <td><label>'.$tickets['asunto_incidencia'].'</label></td>
            </tr>
            <tr>
            <td><label>Fecha: </label></td>
            <td><label>'.$tickets['fecha'].'</label></td>
            </tr>
            <tr>
            <td><label>Descripcion: </label></td>
            <td><label>'.$tickets['descripcion_incidencia'].'</label></td>
            </tr>
            <tr>
            <td><label>Usuario: </label></td>
            <td><label>'.$tickets['nombre'].'</label></td>
            </tr>
            <tr>
            <td><label> Estado: </label></td>
                <td><select name="NuevoEstado" id="">
                    <option value="'.$tickets['id_estado'].'">'.$tickets['descripcion'].'</option>
                    <option value="1">En Revision</option>
                    <option value="2">Sin Atencion</option>
                    <option value="3">Solucionado</option>
                </select></td>
                </table>
            ';
        }
        ?>
        <button type="submit">Guardar Cambios</button>
        
    </form>
    
    <!------------------------------------FOOTER------------------------------------>
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