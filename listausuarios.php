<?php
error_Reporting(E_ERROR);
session_start();
$varsesion = $_SESSION['usuario'];

if($varsesion == null || $varsesion = ''){
echo 'Acceso Denegado';
die(); 
}
include 'conexion.php';


//VARIABLES FILTRO

$where="";
$nombre=$_POST['busqueda'];
$tipodaño=$_POST['tipousuario'];
$genero=$_POST['genero'];
//$conteo=$_POST['nregistros'];

//CONDICIONES DE FILTRO

if(isset($_POST['buscar']))
{
    if(($_POST['busqueda']))
      {
          $where="WHERE nombre like '".$nombre."%'";
      }else if(($_POST['busqueda']))
      {
          $where="WHERE correo like '".$nombre."%'";
      }
    else if($_POST['tipousuario']){
        
         $where="WHERE descripcion_usuario like '".$tipodaño."'";
    }
    else if($_POST['genero']){
        
         $where="WHERE descripcion_genero like '".$genero."'";
    }
}

    /////////////////////////////CONSULTA/////////////////////////////
    $consulta ="SELECT usuario.idusuario, usuario.nombre, usuario.apellidos, usuario.correo, genero.descripcion_genero, tipousuario.descripcion_usuario, usuario.usuario, usuario.contrasena, usuario.telefono FROM usuario
    INNER JOIN genero ON usuario.genero_idgenero = genero.idgenero
    INNER JOIN tipousuario ON usuario.tipousuario_idtipousuario = tipousuario.idtipousuario
    $where ORDER BY usuario.idusuario ASC";
    $resultado = $conexion->query($consulta);
    if(!$resultado){
        echo 'ERROR';
    }
//CONSULTA FILTROS
$tipousuario ="SELECT descripcion_usuario FROM tipousuario";
$buscUsuario=$conexion->query($tipousuario);

$genero = "SELECT descripcion_genero FROM genero";
$buscGenero = $conexion->query($genero);




?>
   <html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="Css/styles.css">
        <link rel="stylesheet" href="Css/navbar-footer-admin.css">
        <link rel="stylesheet" href="Css/styletableadmin.css">
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
                <li><a href="administrador.php">Inicio</a></li>
                <li><a href="listausuarios.php">Lista Usuarios</a></li>
                <li><a href="tickets-admin.php">Lista Tickets</a></li>
                <li><a href="cerrar-sesion.php">Salir</a></li>
                
            </ul>
        </nav>
        </div>
    </header>
       <!------------------------------------TABLAS------------------------------------>
     
        <h1>LISTA USUARIOS</h1>
        <!--------------------------FORMULARIO FILTROS -------------------------->
                  
    <form  method="post">
       <label for="">Nombre de Usuario</label>
        <input type="text" placeholder="Buscar..." name="busqueda" class="filtros">
        <label for="">Filtrar Por:</label>
        <select name="tipousuario" class="filtros-1">
            <option value="">Tipo de Usuario</option>
            <?php
            while ($regUser = $buscUsuario->fetch_array(MYSQLI_BOTH)) 
            {
                echo '<option value ="'.$regUser['descripcion_usuario'].'">'.$regUser['descripcion_usuario'].'</option>';
            }
            ?>
        </select>
        <label for="">Filtrar Por:</label>
        <select name="genero" class="filtros-1">
            <option value="">Genero</option>
            <?php
            while ($EncGenero = $buscGenero->fetch_array(MYSQLI_BOTH)) 
            {
                echo '<option value ="'.$EncGenero['descripcion_genero'].'">'.$EncGenero['descripcion_genero'].'</option>';
            }
            ?>
            
        </select>
        <!--<select name="nregistros"  class="filtros-1">
           <option value="">No de Registros</option>
            <option value="">1</option>
            <option value="">3</option>
            <option value="">4</option>
        </select>-->
        <button name="buscar" type="submit" class="btn-his">Buscar</button>
    </form>
              <!--------------------------TABLA USUARIOS -------------------------->      
        <table>
            <tr>
                <th class="titulo1">Id Usuario</th>
                <th class="titulos">Nombre</th>
                <th class="titulos">Apellidos</th>
                <th class="titulos">Correo</th>
                <th class="titulos">Genero</th>
                <th class="titulos">Tipo de Usuario</th>
                <th class="titulos">Usuario</th>
                <th class="titulos">Contraseña</th>
                <th class="titulos">Telefono</th>
                <th class="titulof">Opcion</th>
                <!--<th class="titulos"><a href="eliminar_user.php"><button></button></a></th>-->
            </tr>
        
        <?php
        while($veruser=$resultado->fetch_array(MYSQLI_BOTH))
        {
            echo '<tr>
                        <th class="filas"> '.$veruser['idusuario'].'</th>  
                        <th class="filas"> '.$veruser['nombre'].'</th>
                        <th class="filas"> '.$veruser['apellidos'].'</th>
                        <th class="filas"> '.$veruser['correo'].'</th>
                        <th class="filas"> '.$veruser['descripcion_genero'].'</th>
                        <th class="filas"> '.$veruser['descripcion_usuario'].'</th>
                        <th class="filas"> '.$veruser['usuario'].'</th>
                        <th class="filas"> '.$veruser['contrasena'].'</th>
                        <th class="filas"> '.$veruser['telefono'].'</th>
                        <th class="filas"><a href="Edit-user.php?id='.$veruser['idusuario'].'"><button type="submit" class="edit"> Editar </button></a></th>
                      </tr>';   
        }
        ?>
        
        </table>
        
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