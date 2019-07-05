<?php  
session_start();
include "../lib/config.php";
  //si la sesion no esta definida entonces te manda a login
  if (!isset($_SESSION['usuario'])) {
  	header("location: ../login.php");
  }
// si la sesion es rango 1 o 0 entonces muestro la pagina
  if ($_SESSION['rango']== '1' or $_SESSION['rango']== '0') {

ini_set('error_reporting', 0);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Panel | Admin</title>
	<link rel="stylesheet" href="../css/estilos.css">
		
</head>
<body>
	<header> 
			<div id="logo">
				<img class="borde" src="../img/logo.png" width="232" height="62">
			</div>

			<div id="menu">
				<br>
				<ul>
		<li><a href="../index.php">Web</a></li>
		   <?php  if ($_SESSION['rango']=='1') { ?><li><a href="editarusuario.php">Editar usuarios</a><?php } ?></li>
		     <?php  if ($_SESSION['rango']=='0') { ?><li><a href="agregarnoticia.php">Agregar Noticia</a></li><?php } ?>
		
		
	</ul>
			</div>

			<div id="perfil">
				<?php
//llamado a base de datos cuando el id sea igual al de la sesion iniciada
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
						
						<img src="../<?php echo $row['avatar']; ?>" width="50" height="50">
						<?php } ?>
					</div>
					<div id="edit">
						
						
						
					</div>
				
				
			</div>

			
			
		</header>
		
		<nav></nav>

		<main>
			<div id="note">	
				<br><br><br><br>
				<h1>Bienvenido</h1><br>
				<p style="color: <?php echo $ran['color']; ?> "><?php echo $_SESSION['usuario'];  ?>  (<?php echo $_SESSION['rango'];  ?>) </p>
				<br>
				<br>
				<h3>Selecciona en el menú que deseas hacer. </h3>
			</div>	

			<div id="footer">
				<p style="font-family: arial; font-size: 12px;">© Saca las retas | Todos los derechos reservados a tu carita bonita</p>
			</div>

		</main>
</body>
</html>
<?php } ?>