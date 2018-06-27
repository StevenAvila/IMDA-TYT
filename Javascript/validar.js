function validar(){
 var nombre, apellidos, correo, usuario, clave, telefono, expresion;
    nombre = document.getElementById("nombres").value;
    apellidos = document.getElementById("apellidos").value;
    correo = document.getElementById("correo").value;
    usuario = document.getElementById("usuario").value;
    clave = document.getElementById("contraseña").value;
    telefono = document.getElementById("telefono").value;
    
    expresion = /\w+@+\w+\.+[a-z]/;
    
    if(nombre ==="" || apellidos ==="" || correo ==="" || usuario ==="" || clave ==="" || telefono ==="")
    {
        alert("Todos los campos son obligatorios");
        return false;
    }
    else if(nombre.length>50){
        alert("El nombre es muy largo")
        return false;
    }
    else if(apellidos.length>50){
        alert("El apellido es muy largo")
        return false;
    }
    else if(correo.length>50){
        alert("El correo es muy largo")
        return false;
    }
    else if(nombre.length>25 || clave.length>25){
        alert("Usuario y contraseña deben tener como maximo 25 caracteres")
        return false;
    }else if(telefono.length>15){
        alert("El telefono es muy largo")
        return false;
    }else if(isNaN(telefono)){
        alert("El telefono ingresado no es un numero")
        return false;
    }else if(!expresion.test(correo)){
        alert("Formato incorrecto en correo");
        return false;
    }
}