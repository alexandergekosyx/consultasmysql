<?php
  session_start();
  require '../conexion.php';
  if(!empty($_POST)){
    $usuario = $_POST['user'];
    $clave = $_POST['clave'];

    $con = "select * from usuario where username='$usuario' ";

    $res = $conexionbdd->query($con);
    $contador = 0;
    foreach ($res as $x) {

      if($x['username'] = $usuario ){
        $contador=$contador+1;
      }
    }

    if($contador==1 && password_verify($clave, $x['password'])){
      $_SESSION['id_user'] = $x['idu'];

      header('Location: ../promociones.php');

    } else{ 
        echo '<div class="bad"><h4> LA CUENTA O LA CONTRASEÑA NO COINCIDEN ! </h4></div>';

     }
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
  <link rel="stylesheet" href="stylesuser.css">
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
      <h1>INICIAR SESION</h1>
      <form action="#" method="post">

        <!-- USERNAME INPUT -->
        <label for="user">USUARIO</label>
        <input name="user" id="user" type="text" maxlength="50" minlength="3" placeholder="nombre de usuario" pattern="[a-zA-Z0-9]+" required autofocus/>
        <!-- PASSWORD INPUT -->
        <label for="clave">CONTRASEÑA</label>
        <input name="clave" id="clave" type="password" autocompled="off" placeholder="ingrese su contraseña" required autofocus/>

        <input type="submit" value="INICAR">

        <a href="signup.php">No tienes una cuenta ?<br></a>
        <a href="#">olvidaste tu comtraseña?</a>
      </form>
      </div>
    </header>
    
    
    <div class="footer-ub">
       <P>HORARIOS <br>Lunes - Viernes: 8:00 am - 10:00 pm <br> Sabados y Domingos: 1:00 pm - 6:00 pm <br><br>ENCUENTRANOS <br>Direccion: Av.Santander / Calle Pando / #100 <br>La Paz-Bolivia <br><br>Tel: 2-2552555 / 2-2552525 <br>Email:
        alexpresscoffee@gmail.com
    </P>
    </div>

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
</body>

</html>




