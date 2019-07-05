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
    <title>Regístrate | Saca las retas</title>
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
        <h1 >Regístrate en Saca las Retas :v</h1>
        <br>

    <form action="" method="post">
   
        <input type="text" name="nombre"  placeholder="Nombre completo"  required>
 
     
      <br><br>
      
        <input type="email" name="email"  placeholder="Email" " required>  
  
   
      <br><br>

        <input type="text" name="usuario"  placeholder="Usuario" " required>
        
     
      <br><br>
        <input type="password" name="contrasena"  placeholder="Contraseña" required>
     
   
      <br><br>
    
     
        <div>
          <button type="submit" name="registrar" >Registrarme</button>
        </div>
      
    </form>

<?php
//si se postea el registrarme y los campos estas llenos.
if (isset($_POST['registrar']) && $_POST['nombre']!="" &&  ['email']!="" && ['usuario']!="" && ['contrasena']!="")
 {
//defino variables
  $nombre=$_POST['nombre'];
  $email=$_POST['email'];
  $usuario=$_POST['usuario'];
  $contrasena=$_POST['contrasena'];

//llamado a base de datos para ver que el usuario y el email no sean iguales
$sql2="SELECT * FROM usuarios WHERE usuario='$usuario'";
$sql3="SELECT * FROM usuarios WHERE email='$email'";

$result2=mysqli_query($con,$sql2);
$result3=mysqli_query($con,$sql3);
//cuento los resultados
$contar1=mysqli_num_rows($result2);
$contar2=mysqli_num_rows($result3);


//se muestra cual ya esta en uso
if($contar1==1) {
  echo "El usuario está en uso";
}
else if($contar2==1) {
  echo "El correo o el usuario ya están en uso";
}
//si no estan en uso entonces inserto sus datos a la base de datos
else{

$sql="INSERT INTO usuarios(id_use,nombre,email,usuario,contrasena,fecha_reg,avatar,rango,descripcion,edad,tipfut) VALUES ('', '$nombre','$email','$usuario','$contrasena',now(),'avatars/defect.jpg','2','Añadir','Añadir','Añadir')";
$result=mysqli_query($con,$sql);





echo "Datos guardados, inicie sesion";
//despues de un segundo te manda al login a iniciar sesion
header("Refresh:1; url=login.php");
}

}
else{
  echo "";
}
//header("Refresh:2; Location: login.php");
?>
    

  <br>
    <a href="login.php" class="text-center">Tengo actualmente una cuenta</a>

</script>
    </main>
    
    <footer>   
        <div id="copy">
           <p style="font-family: arial; font-size: 12px; margin-right: 20px;">© Saca las retas | Todos los derechos reservados a tu carita bonita</p>
        </div>
    </footer>
    
</body>
</html>