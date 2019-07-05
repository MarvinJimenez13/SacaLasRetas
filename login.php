<?php
session_start();
include 'lib/config.php';
//si la sesion esta definida te manda al index

if(isset($_SESSION['usuario']))
{
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login | Saca las retas</title>
    <link rel="stylesheet" href="css/estilosindex.css">
</head>
<body>
    <header>
        <div id="logo">
           <a href="./login.php"><img src="./img/logo.png" alt="logo" width="100%" height="100"></a>
        </div>
        <div id="head">
          <br>
          <nav>
            <ul>
              <li><a href="./faq.html">Preguntas Frecuentes</a></li>
              <li><a href="./sobre_nosotros.html">Sobre nosotros</a></li>
              <li><a href="./gfcita.html">Sobre tu gfcita >:v</a></li>
              <li><a href="./soporte.html">Soporte</a></li>
             </ul>
          </nav>
        </div>
    </header>
    
    <main>
        <br>
        <br>
        <h1>Bienvenido a Saca las Retas :v</h1>

          <br>
          <form action="" method="post">
          
              <input type="text"  placeholder="Usuario" name="usuario">
       
        
            <br><br>
        
              <input type="password" class="form-control" placeholder="Contraseña" name="contrasena" >
             
            <br><br>
        
              <button type="submit" name="login" >Iniciar Sesión</button>
         
          </form>

    <?php
    //si se postea iniciar sesion
    if(isset($_POST['login']))

    {

//defino las variables :v      
      $usuario = $_POST['usuario'];
      $contrasena = $_POST['contrasena'];

//llamado a base de datos para ver que el usuario ycontra sean los mismos :v
      $query = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
      $result=mysqli_query($con,$query);
      //se cuentan los resltados
      $contar = mysqli_num_rows($result);

      if($contar == 1) 

      {

        while($row=mysqli_fetch_array($result)) 

        {
//si las variables usuario y contraseña con los mismos que el row(donde recogimos la svariables) entonces creamos sesiones :P
          if($usuario = $row['usuario'] && $contrasena = $row['contrasena'])

          {

            $_SESSION['usuario'] = $row['usuario'];
            $_SESSION['id'] = $row['id_use'];
            $_SESSION['avatar']=$row['avatar'];
            $_SESSION['rango']=$row['rango'];
//los mandamos al index
            header('Location: index.php');

          }

        }
        
      } else { echo 'Los datos ingresados no son correctos'; }


    }

    ?>

    <br>

            <a href="registro.php" class="text-center">Registrarme porfa</a>


    </main>
    
    <footer>   
        <div id="copy">
           <p style="font-family: arial; font-size: 12px; margin-right: 20px;">© Saca las retas | Todos los derechos reservados a tu carita bonita</p>
        </div>
    </footer>
    
</body>
</html>
