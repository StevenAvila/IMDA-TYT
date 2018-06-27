$(document).ready(function(){


  $('#formlog').submit(function(event){
   event.preventDefault();

    var data = $(this).serializeArray();

    $.ajax({
       url: 'logeo.php',
       type: 'post',
       dataType: 'json',
       data: data,
       beforeSend: function(){
           $('btn-ingresar').val('Validando...');
       }
   })
.done(function(respuesta){
       console.log(respuesta);
        if(!respuesta.error){
           if(respuesta.tipo == 1){
               window.location = 'administrador.php';
           }else if (respuesta.tipo == 2){
               location.href = 'bienvenido.php';
           }
           else if (respuesta.tipo == 3){
               window.location = 'tecnico.php';
       }
   }else{
        alert("Datos Incorrectos");
           window.history.go(-0);
           $('btn-ingresar').val('Ingresar');
   }
})
.fail(function(resp){
       console.log(resp.responseText);
   })
.always(function(){
       console.log("complete");
     })
   });
});