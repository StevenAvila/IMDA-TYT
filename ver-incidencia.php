<?php
session_start();

include 'conexion.php';
$tipodano = $_POST["tipodedaño"];
$asunto = $_POST ["asunto"];
$fecha = $_POST["fecha"];
$descripcion= $_POST["descripcion"];
$idUsuario = $_SESSION ['infousuario']['idusuario'];
$estado = 2;

//CONSULTA

$insertar = "INSERT INTO ticket(tipoequipo_idtipoequipo, asunto_incidencia,fecha,descripcion_incidencia,usuario_idusuario,estado_idestado) VALUES ($tipodano,'$asunto','$fecha','$descripcion',$idUsuario,$estado)";

//Ejecucion

$resultado = mysqli_query($conexion,$insertar);
if(!resultado){
    echo 'Error en la incidencia';
}else{
    echo'<script>
    alert ("Envio exitoso");
    window.location="historial.php";
    </script>';   
}
//Cerrar Conexion
mysql_close($conexion);