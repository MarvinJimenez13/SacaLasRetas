<?php
session_start();
include 'lib/config.php';
//si la sesion no esta definida entonces te manda al login
if (!isset($_SESSION['usuario'])) {
	header("location:login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Inicio | Saca las retas</title>
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <header> 
      <div id="logo">
        <img class="borde" src="./img/logo.png" width="232" height="62">
      </div>

      <div id="menu">
        <br>
        <ul>
          <li><a href="index.php">Inicio</a></li>
          <li><a href="perfilr.php?id= <?php echo $_SESSION['id']; ?>">Perfil</a></li>
          <li><a href="foros.php">Foros</a></li>
          <li><a href="reglas.php">Reglas</a></li>
          <?php   if ($_SESSION['rango']== '1' or $_SESSION['rango']== '0') {?><li><a href="panel">Panel</a></li><?php }?>
    
        </ul>
      </div>

      <div id="perfil">
        <?php
//llamado a  base d edatos de usuarios donde el id del usuario sea igual al de la sesion
        $query="SELECT * FROM usuarios WHERE id_use = '".$_SESSION['id']."'";
          $result=mysqli_query($con,$query);
            //recojo las variables
        $row= mysqli_fetch_array($result);
          //llamado a base de datos del ragop para ver el id del rango que es igual al row de la sesion iniciada.
        $rango="SELECT * FROM rangop WHERE id = '".$row['rango']."'";
            $result1=mysqli_query($con,$rango);
            //recojo las variables de rangop
            $ran= mysqli_fetch_array($result1);

        ?>
          <div id="name">
            <br>
            <h5>Bienvenido</h5> <font size="2"><p style="color: <?php echo $ran['color']; ?> "><?php echo $_SESSION['usuario'];  ?>  (<?php echo $_SESSION['rango'];  ?>) </p></font>
            <br>
            <?php if ($row['avatar']!='') {?>
          </div>
          <div id="p_img">
            
            <img src="<?php echo $row['avatar']; ?>" width="50" height="50">
            <?php } ?>
          </div>
          <div id="edit">
            
            
          </div>
        
        
      </div>

      
      
    </header>
    
    <nav></nav>

    <main>
      <div id="note"> 
        <div id="foro-y">
                  
                  <br>
                  <a href="./foros.php">Regresar a foro</a>
                  <br>
                  <br>
                  Ok amiguito, para publicar tu lugar donde armaras tu equipo para jugar una sabrosa y suckistrikis reta tendras que hacer lo siguiente:
                  <br>
                  <br>
                  1-Llena los campos....
                  <br>
                  2- Amplía el mapa como en la imagen.
                  <br>
                  <img src="ins\reta.jpg" width="250" height="200">
                  <br>
                  3- Busca tu lugar donde retaras o tu ubicación y coloca un marcador.
                  <br>
                  <img src="ins\reta22.jpg" width="250" height="200">
                  <br>
                  4-Copia y pega las coordenadas en el campo de "Coordenadas o direccion del lugar".
                  <br>
                   <img src="ins\reta33.jpg" width="250" height="200">
                  <br>
                  5- Guarda y espera a que los prros te respondan. xd
                  <br>
                  <br>
                  <hr>
                  <br>
                  <form id="form1" name="form1" method="post" action="">
                  Nombre del Usuario:<br>
                  <input type="text" name="nomus" id="textfield">
                  <br>
                  Numero de jugadores que necesita:<br>
                  <input type="text" name="num" id="textfield">
                  <br>
                  Fecha(DD/MM/AAAA):<br>
                  <input type="text" name="fecha" id="textfield">
                  <br>
                  Hora:<br>
                  <input type="text" name="hora" id="textfield">
                  <br>
                  Descripción:<br>
                  <textarea name="desret" cols="100" rows="10" id="textfield2"></textarea>
                  <br>
                  Coordenadas o dirección del lugar:<br>
                  <input type="text" name="coor" id="textfield">
                  <br>
                  <br>
                  <input type="submit" name="dele"  id="button" value="Agregar reta">
                  <br>
                  <br>
                  </form>
                  <?php
//si se postea el dele prro entonces....
                  if (isset($_POST['dele'])) {
                    //inserto la reta en la base de datos
                    $reta="INSERT INTO retas (nombreusuario,numjugadores,fecha,hora,descripcion,coor) VALUES ('".$_POST['nomus']."','".$_POST['num']."','".$_POST['fecha']."','".$_POST['hora']."','".$_POST['desret']."','".$_POST['coor']."')";
                    $resret=mysqli_query($con,$reta);

                   if ($resret) {
                      echo "Se guardo tu reta prro";
                    }
                  }


                   ?>
                  <hr>
                  <br>
                  <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d60200.63803196419!2d-99.13753509521518!3d19.432276716299377!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sus!4v1512021018189" width="720" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>

      </div>


      <div id="footer">
        <p style="font-family: arial; font-size: 12px;">© Saca las retas | Todos los derechos reservados a tu carita bonita</p>
      </div>

    </main>
    
    

</body>
</html>