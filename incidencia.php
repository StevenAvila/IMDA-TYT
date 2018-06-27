<?php
    session_start();
    $varsesion = $_SESSION['usuario'];

        if($varsesion == null || $varsesion = ''){
    echo 'Acceso Denegado';
    die();
    }
?>
  <!DOCTYPE html>
   <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="Css/navbar-footer.css">
        <link rel="stylesheet" href="Css/styles.css">
        <link rel="stylesheet" href="Css/incidenciastyle.css">
    </head>
    <body>
        <div class="contenedor-n">
    <header>
       <div class="cont-head">
        <img src="Img/tyt-logo.png" alt="" class="logotyt">
        <input type="checkbox" id="btn-menu">
        <label for="btn-menu"><span class="icon-lista" ></span></label>
        <nav class="menu">
            <ul>
                <li><a href="bienvenido.php">Inicio</a></li>
                <li><a href="incidencia.php">Generar Incidencia</a></li>
                <li><a href="historial.php">Historial</a></li>
                <li><a href="cerrar-sesion.php">Salir</a></li>
            </ul>
        </nav>
        </div>
    </header>
    </div>
       <!--------------FORMULARIO----------------->
        <form action="ver-incidencia.php" method="post" class="form-incidencia">
          
        <h1 class="tit">Incidencia De <?php echo $_SESSION ['infousuario']['nombre']. " ". $_SESSION['infousuario']['apellidos']; ?></h1>
           
            <label for="" class="des-tipo">Tipo de Daño</label>
            <select name="tipodedaño" id="" class="form-input" placeholder="Seleccione...">
                <option value="1">Software</option>
                <option value="2">Hardware</option>
                <option value="3">Audiovisual</option>
            </select>
            <label for="" class="inf-fecha">Fecha</label>
            <label for="" class="inf-asunto">Asunto</label>
            <input type="date" class="input-fecha" name="fecha" required>
            <input type="text" class="asunto" maxlength="30" name="asunto">
            
            
            <label for="" class="inf-desc">Descripcion Breve</label>
            <textarea name="descripcion" id="" cols="30" rows="10" maxlength="100"></textarea>
            <input type="submit" value="Enviar" class="form-submit">
        </form>
        
        
        
    <footer class="footer">
        <div class="social">
            <a class="icon-facebook"></a>
            <a class="icon-twitter"></a>
            <a class="icon-instagram"></a>
        </div>
        
        <p class="copy"> &copy; IMDA TYT Adsi los mejores - 2018 todas las recochas reservadas. </p>
    </footer>
    </body>
</html>