<?php
session_start();
$varsesion = $_SESSION['usuario'];

if($varsesion == null || $varsesion = ''){
echo 'Acceso Denegado';
die(); 
}
include 'conexion.php';

    $num_id = $_GET['id'];

    $consulta="SELECT usuario.idusuario, usuario.nombre, usuario.apellidos, usuario.correo, genero.descripcion_genero, genero.idgenero, tipousuario.descripcion_usuario, tipousuario.idtipousuario, usuario.usuario, usuario.contrasena, usuario.telefono FROM usuario
    INNER JOIN genero ON usuario.genero_idgenero = genero.idgenero
    INNER JOIN tipousuario ON usuario.tipousuario_idtipousuario = tipousuario.idtipousuario WHERE idusuario = '".$num_id."' ";
    $resultado = $conexion->query($consulta);
    if(!$resultado){
        echo 'error';
    }

?>
<html>
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
        <!---------------------------FORMULARIO--------------------------->
        <h1>Editar Usuario</h1>
        <form action="Edit-user-2.php" method="post">
          
          <?php
            while($lista = $resultado->fetch_array(MYSQLI_BOTH))
            {
                echo'
                <table>
                <tr>
                <td><label> ID: </label></td>
                <input type="hidden" name="idviejo" value=" '.$lista['idusuario'].'"></td>
                <td><label>'.$lista['idusuario'].'</label>
                </tr>
                <tr>
                <td><label> Nombre: </label></td>
                <td><input type="text" name="NuevoNombre" value="'.$lista['nombre'].'"></td>
                </tr>
                <tr>
                <td><label> Apellido: </label></td>
                <td><input type="text" name="NuevoApellido" value="'.$lista['apellidos'].'"></td>
                </tr>
                <tr>
                <td><label> Correo: </label></td>
                <td><input type="email" name="NuevoCorreo" value="'.$lista['correo'].'"></td>
                </tr>
                <tr>
                <td><label> Genero: </label></td>
                <td><select name="NuevoGenero" id="">
                    <option value="'.$lista['idgenero'].'">'.$lista['descripcion_genero'].'</option>
                    <option value="1">Masculino</option>
                    <option value="2">Femenino</option>
                    <option value="3">Indefinido</option>
                </select></td>
                </tr>
                <tr>
                <td><label> Tipo de Usuario: </label></td>
                <td><select name="NuevoTipo" id="">
                    <option value="'.$lista['idtipousuario'].'">'.$lista['descripcion_usuario'].'</option>
                    <option value="1">Administrador</option>
                    <option value="2">Usuario</option>
                    <option value="3">Tecnico</option>
                </select></td>
                </tr>
                <tr>
                <td><label>Usuario</label></td>
                <td><label>'.$lista['usuario'].'</label></td>
                </tr>
                <tr>
                <td><label>Contraseña</label></td>
                <td><label>'.$lista['contrasena'].'</label> </td> 
                </tr>
                <tr>
                <td><label>Telefono</label></td>
                <td><label>'.$lista['telefono'].'</label></td>
                </tr>
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