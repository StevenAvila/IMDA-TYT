<?php
include 'conexion.php';

$ticket = $_POST["id"];
$fechafinal = $_POST["fecha-fin"];
$comentario = $_POST["comentario"];

$insertar ="INSERT INTO informe(fecha_fin,comentario,ticket_idticket)VALUES ('$fechafinal','$comentario','$ticket')";    
//Ejecucion
$resultado = mysqli_query($conexion, $insertar);

if(!$resultado){
    echo 'Error al enviar informe';
}else{
    echo '<script>
        alert ("Registro exitoso");
        window.location="lista-informes.php";
        </script>
        ';
}
//Cerrar Conexion
mysqli_close ($conexion);
