<?php
include 'conexion.php';
$nombres = $_POST["nombres"];
$apellidos = $_POST["apellidos"];
$correo = $_POST["correo"];
$usuario = $_POST["usuario"];
$clave = $_POST["contraseña"];
$telefono = $_POST["telefono"];
$tipousuario = 2;
$genero = $_POST["newgenero"];
//Consulta para insertar
$insertar = "INSERT INTO usuario(nombre, apellidos, correo, genero_idgenero, tipousuario_idtipousuario, usuario, contrasena,telefono) VALUES ('$nombres','$apellidos','$correo','$genero','$tipousuario','$usuario','$clave','$telefono')"; 

//No repetidos
$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuario WHERE usuario = '$usuario'");
    if(mysqli_num_rows($verificar_usuario)>0)
    {
        echo '<script>
        alert ("El usuario ya esta registrado");
        window.history.go(-1);
        </script>
        ';
        exit;
    }

$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo = '$correo'");
    if(mysqli_num_rows($verificar_correo)>0)
    {
        echo '<script>
        alert ("El correo ya esta registrado");
        window.history.go(-1);
        </script>
        ';
        exit;
    }

//Ejecucion
$resultado = mysqli_query($conexion, $insertar);
if(!$resultado){
    echo 'Error al registrarse';
}else{
    echo '<script>
        alert ("Registro exitoso");
        window.location="login.html";
        </script>
        ';
}
//Cerrar Conexion
mysqli_close ($conexion);

