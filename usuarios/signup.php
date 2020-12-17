<?php
  require '../conexion.php';

  if(!empty($_POST)){

    $captcha = $_POST['g-recaptcha-response'];

    $secret = '6LeYYQUaAAAAAA_cNX4eF7EYdh_d2uO27xRYyQLj';

    
    if(!$captcha) { /*cambiar el ! para que funcione el captcha*/

      $nombre = $_POST['nombre'];
      $apellido = $_POST['apellido'];
      $usuario = $_POST['user'];
      $clave1 = $_POST['clave'];
      $clave2 = $_POST['confcla'];
      
      $con = "select username from usuario where username='$usuario' ";

      $res = $conexionbdd->query($con);
      $contador = 0;
      foreach ($res as $x) {
        if($x['username'] = $usuario ){+
          $contador=$contador+1;
        }
      }

      if($contador==0){
        if($clave1==$clave2){ 
          $clave = password_hash($_POST['clave'], PASSWORD_BCRYPT);
          $consulta = "INSERT INTO usuario(nombres, apellidos, username, password)
          VALUES ('$nombre','$apellido','$usuario','$clave')";
          $resultado = mysqli_query($conexionbdd,$consulta);
          if($resultado){
          echo '<div class="god"><h4> TE REGISTRASTE CORRECTAMENTE ! </h4></div>';
          }else{
          echo '<div class="bad"><h4> AH OCURRIDO UN ERROR EN EL REGISTRO ! </h4></div>';
          }

        } else{  

          echo '<div class="bad"><h4> LAS CONTRASEÑAS NO COINCIDEN ! </h4></div>';


          }
      } else{ 
        echo '<div class="bad"><h4>  EL USUARIO YA EXISTE ! </h4></div>';

        }

    }else{ 

        echo '<div class="verf"><h4> VERIFICA EL CAPTCHA !!! </h4></div>';

    } 

    $response = file_get_contents(
    "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha"
    );

    /* ENVIA DATOS DEL CAPTCHA FECHA UBICION DE DONDE SE VERIFICO EL CAPTCHA

    var_dump($response);

    $arr = json_decode($response, TRUE);

    if($arr['success']){

      echo '<h4> CORRECTO </h4>';
      
    }
      else{ echo '<h4> ERROR </h4>';

      } */

  
  }

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NOMBRE DE MI PAGINA </title>
  <!-- LINK A LOS ESTILOS DE LETRAS -->
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500&display=swap" rel="stylesheet">
  <!-- LINK A LOS FONDOS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <!-- LINCK A LOS ESTILOS CSS -->
  <link rel="stylesheet" href="stylessign.css">

  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

<body>

  <div class="menu-btn">
    <i class="fas fa-bars fa-2x"></i>
  </div>

  <div class="container">
    <!-- NAVEGACION -->
    <nav class="nav-main">
      <!-- LOGO -->
      <img src="../imagenes/logo.jpeg" alt="Cafeteria Logo" class="nav-logo">
      <!-- NAVEGACION IZQUIERDA -->
      <ul class="nav-menu">
        <li>
          <a href="../index.php">ALEXPRESS</a>
        </li>
        <li>
          <a href="../categorias/categorias.php">CATEGORIAS</a>
        </li>
        <li>
          <a href="../promociones.php">PROMOCIONES</a>
        </li>
        <li>                  
          <a href="../nosotros.php">NOSOTROS</a>
        </li>
        <li>
          <a href="#">DELIVERY</a>
        </li>
      </ul>

      <!-- NAVEGACION DERECHA-->
      <ul class="nav-menu-right">
        <li>
          <a href="login.php">
            <i class="fas fa-user-circle"></i>
          </a>
        </li>
      </ul>
    </nav>
    <hr>

    <!-- SHOWCASE -->
    <header class="showcase">
      <div class="login-box">
      <img src="../imagenes/logo.jpeg" class="avatar" alt="Avatar Image">
      <h1>CREAR CUENTA</h1>
      <form action="signup.php" method="POST">

        <label for="nombre">NOMBRE</label>
        <input name="nombre" id="nombre" type="text" maxlength="50" minlength="2"placeholder="nombres" pattern="[a-z A-Z]+" required autofocus />

        <label for="apellido">APELLIDO</label>
        <input name="apellido" id="apellido" type="text" maxlength="50" minlength="2" placeholder="apellidos" pattern="[a-z A-Z]+" required autofocus/>
        
        <label for="user">USUARIO</label>
        <input name="user" id="user" type="text" placeholder="nombre de usuario" maxlength="50" minlength="3" placeholder="nombre de usuario" pattern="[a-zA-Z0-9]+" required autofocus/>

  
        <label for="clave">CONTRASEÑA</label>
        <input name="clave" id="clave" type="password" autocomplete="off"  placeholder="letras y numeros"
        required autofocus/>
        
        <label for="confcla">CONFIRMAR CONTRASEÑA</label>
        <input name="confcla" id="confcla" type="password"  autocomplete="off" placeholder="vuelva a escribir la contraseña" required autofocus/>
        
        <div class="g-recaptcha" data-sitekey="6LeYYQUaAAAAAF5sfOx205GH1vWhqu4_7W6CaV39"></div>
        <br/>
    
        <input name="go" type="submit" value="REGISTRARSE">

        <a href="login.php">Prefiero Iniciar Sesion<br></a>
        <a href="#">olvidaste tu comtraseña ?</a>
      </form>
      </div>
    </header>
    
    <!-- LINKS -->
    <div class="footer-ub">
    <P>HORARIOS <br>Lunes - Viernes: 8:00 am - 10:00 pm <br> Sabados y Domingos: 1:00 pm - 6:00 pm <br><br>ENCUENTRANOS <br>Direccion: Av.Santander / Calle Pando / #100 <br>La Paz-Bolivia <br><br>Tel: 2-2552555 / 2-2552525 <br>Email:
    alexpresscoffee@gmail.com
    </P>
    </div>

    <!-- REDES SOCIALES -->
    <section class="social">
      <p></p>
      <div class="links">
        <a href="https://facebook.com">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://twitter.com">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="https://www.youtube.com/watch?v=1lyu1KKwC74&list=RD1lyu1KKwC74&start_radio=1">
          <i class="fab fa-linkedin"></i>
        </a>
      </div>
    </section>

    <!-- COPYRIGHT -->
    <footer class="footer">
      <h3>AlexpressCoffee Copyright ♥</h3>
    </footer>
    
  </div>
  <!-- EFECTO AL DESLIZAR JS. -->
  <script src="https://unpkg.com/scrollreveal"></script>
  <script src="../main.js"></script>

 
  <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
  async defer>
  </script>
</body>

</html>