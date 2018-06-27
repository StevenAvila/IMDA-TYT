<?php

include 'conexion.php';
    
$id =$_POST["idviejo"];
$name =$_POST["NuevoNombre"];
$secondname =$_POST["NuevoApellido"];
$email =$_POST["NuevoCorreo"];
$newgenero =$_POST["NuevoGenero"];
$tipe =$_POST["NuevoTipo"];
//$user =$_POST["Olduser"];
//$password =$_POST["Oldpass"];
//$phone =$_POST["Oldtelefono"];

$editar="UPDATE usuario SET nombre='".$name."', apellidos='".$secondname."',correo='".$email."',genero_idgenero='".$newgenero."',tipousuario_idtipousuario='".$tipe."'WHERE idusuario='".$id."'";

$resultado = mysqli_query($conexion,$editar);

if(!$resultado){
    echo'<script>
    alert ("No se pudo actualizar datos");
    window.history.go(-1);
    </script>';
}else{
    echo '<script>
    alert ("Datos Actualizados");
    window.location = "listausuarios.php";
    </script>';
}

mysqli_close($conexion);
