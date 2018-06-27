<?php
session_start();
$varsesion = $_SESSION['usuario'];

if($varsesion == null || $varsesion = ''){
echo 'Acceso Denegado';
die();
}
include 'conexion.php';

          
//Variables Consulta//
$where="";
$nombre=$_POST['busqueda'];
$tipodaño=$_POST['tipoincidencia'];
$fecha=$_POST['fecha1'];
$fecha2=$_POST['fecha2'];

//BOTON BUSCAR//

if(isset($_POST['buscar']))
{
      if(($_POST['busqueda']))
      {
          $where="WHERE asunto_incidencia like '".$nombre."%'  ";
      }
      else if($_POST['tipoincidencia'])
      {
          $where="WHERE descripcionequipo like '".$tipodaño."'";
          
      }else if(empty($_POST['busqueda']) && empty($_POST['tipoincidencia']) && empty($_POST['fecha1']) && empty($_POST['fecha2']))
      {
          $where=" WHERE idticket = idticket ";
        
      }else if(($_POST['fecha1']) && ($_POST['fecha2']))
      {
          $where = "WHERE fecha BETWEEN '$fecha' and '$fecha2'"; 
      }else if(($_POST['fecha1'])){
          $where = "WHERE fecha like '$fecha' ";
      }else if(($_POST['fecha2'])){
          $where = "WHERE fecha like '$fecha2' ";
      }
}

//Consulta base de Datos//
        $consulta1 = "SELECT ticket.idticket, tipoequipo.descripcionequipo, ticket.asunto_incidencia, ticket.fecha,ticket.descripcion_incidencia, estado.descripcion, usuario.nombre FROM ticket
        INNER JOIN tipoequipo ON ticket.tipoequipo_idtipoequipo = tipoequipo.idtipoequipo
        INNER JOIN estado ON ticket.estado_idestado = estado.id_estado
        INNER JOIN usuario ON ticket.usuario_idusuario = usuario.idusuario
        $where ORDER BY ticket.idticket ASC";
        $resultado = $conexion->query($consulta1);
    if(!$resultado){
        echo'error pto';
    }

////////////////////FILTROS///////////////////
$tipodaño ="SELECT descripcionequipo FROM tipoequipo";
$busctipo=$conexion->query($tipodaño);

?>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="Css/navbar-footer-admin.css">
        <link rel="stylesheet" href="Css/styles.css">
        <link rel="stylesheet" href="Css/styletableadmin.css">
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
        
        <!--<h1>LISTA DE USUARIOS</h1>-->
        
        
        <!-------------FORMULARIO------------->
    <form  method="post">
       <label for="">Por Asunto:</label>
        <input type="text" placeholder="Buscar..." name="busqueda" class="filtros">
        
        <label for="">Desde:</label>
        <input type="date" name="fecha1" class="filtros-2">
        <label for="">Hasta:</label>
        <input type="date" name="fecha2" class="filtros-3">
        <label for="" class="filtro-n">Filtrar por:</label>
        <select name="tipoincidencia" class="filtros-1">
            <option value="">Tipo de Daño</option>
            <?php
            while ($regTipo = $busctipo->fetch_array(MYSQLI_BOTH)) 
            {
                echo '<option value ="'.$regTipo['descripcionequipo'].'">'.$regTipo['descripcionequipo'].'</option>';
            }
            ?>
        </select>
        <button name="buscar" type="submit" class="btn-his-2">Buscar</button>
    </form>
         <!----------------------------TABLA---------------------------->
         <table>
             <tr>
                 <th class="titulo1">id</th>
                 <th class="titulos">Usuario</th>
                 <th class="titulos">Tipo de Incidencia</th>
                 <th class="titulos">Asunto</th>
                 <th class="titulos">Fecha</th>
                 <th class="titulos">Descripcion</th>
                 <th class="titulos">Estado</th>
                 <th class="titulof">Modificar</th>
             </tr>
        <!---------------------------DATOS--------------------------->
             <?php
             while($verticket = $resultado->fetch_array(MYSQLI_BOTH))
             {
                 echo'<tr>
                        <th class="filas"> '.$verticket['idticket'].'</th>
                        <th class="filas">'.$verticket['nombre'].'</th>
                        <th class="filas"> '.$verticket['descripcionequipo'].'</th>
                        <th class="filas"> '.$verticket['asunto_incidencia'].'</th>
                        <th class="filas"> '.$verticket['fecha'].'</th>
                        <th class="filas"> '.$verticket['descripcion_incidencia'].'</th>
                        <th class="filas">'.$verticket['descripcion'].'</th>
                        <th class="filas"><a href="edit-ticket.php?id='.$verticket['idticket'].'"><button type="submit" class="edit-ticket"> Editar </button></a></th>
                      </tr>';
             }
             ?>
         </table>
         <!---------------------FOOTER--------------------->
        
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
