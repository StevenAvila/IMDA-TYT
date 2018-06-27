<?php

include 'conexion.php';

$id=$_POST["idviejo"];
$tipoin= $_POST["NuevoTipo"];
$newestado = $_POST["NuevoEstado"];

$editar = "UPDATE ticket SET tipoequipo_idtipoequipo ='".$tipoin."',estado_idestado ='".$newestado."' WHERE idticket='".$id."'";

$resultado = mysqli_query($conexion,$editar);

if(!$resultado){
    echo'<script>
    alert ("No se pudo actualizar datos");
    window.history.go(-1);
    </script>';
}else{
    echo '<script>
    alert ("Datos Actualizados");
    window.location = "tickets-admin.php";
    </script>';
}

mysqli_close($conexion);