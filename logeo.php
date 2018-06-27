<?php
session_start();
include 'conexion.php';

$usuario	=mysqli_real_escape_string($conexion,$_POST['usuario']);
$clave		=mysqli_real_escape_string($conexion,$_POST['clave']);

$_SESSION['usuario'] = $usuario;

//Consulta

$consulta = "SELECT * FROM usuario WHERE usuario='$usuario' and contrasena='$clave'";

$resultado = mysqli_query($conexion, $consulta);
$datosuser = mysqli_fetch_assoc($resultado);
$_SESSION ['infousuario'] = $datosuser;

$filas = mysqli_num_rows($resultado);
if($filas > 0){
    echo json_encode(array('error' => false, 'tipo' => $datosuser['tipousuario_idtipousuario']));  
    // header("location:bienvenido.php");
}else{
    echo json_encode(array('error' => true));
}
mysqli_free_result($resultado);
//Cerrar conexion
mysqli_close($conexion);
