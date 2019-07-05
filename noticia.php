<?php
session_start();
include 'lib/config.php';
//si la sesion no esta iniciada entonces te manda al login
if (!isset($_SESSION['usuario'])) {
	header("location:login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Noticia | Saca las retas</title>
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
				<br>
				<a href="./index.php">Regresar al inicio</a><br><br><br>
				<?php
				//si el id de la noticia esta definido entonces...
					if (isset($_GET['id'])) {
						//llamdo a base de datos para mostrar la noticia y que el id sea igual al definido antes
						$query="SELECT * FROM noticias WHERE id = '".$_GET['id']."'";
						$result=mysqli_query($con,$query);
						//recojo y muestro los reusltados
					while ($row=mysqli_fetch_array($result)) {
//llamado a base de datos para sacar el nombre del usuario donde el id sea igual al row=id del reportero
						$usuarios="SELECT * FROM usuarios WHERE id_use= '".$row['reportero']."'";
									$resus=mysqli_query($con,$usuarios);
									//recojer los datos
									$user= mysqli_fetch_array($resus);

						?>


									 <strong><?php echo $row['titulo']; ?></strong>&nbsp;&nbsp;
									
									De:
									<?php echo $user['usuario']; ?>.
									<?php echo $row['fecha']; ?>
									<hr>
									<br><br>
									<?php echo $row['noticia']; ?>
									<br><br><br>
									

									

						<?php 
					}
					?>
					<br><br><h2>Comentarios</h2><hr>

					<?php 
					//SELECCIONAR  LOS COMENTARIOS Y ORDENARLOS
					$comen="SELECT * FROM comentarios WHERE not_id = '".$_GET['id']."' ORDER BY id DESC";
					$rescom1=mysqli_query($con,$comen);
					//MOSTRAR LOS OCMENTARIOS
					while ($row=mysqli_fetch_array($rescom1)) {
					//LLAMADO A BASE DE DATOS PARA CAMBIAR A EL NOMBRE DE USUARIO EN VES DEL ID
					$user="SELECT * FROM usuarios WHERE id_use='".$row['usuario']."' ";
					$resuser=mysqli_query($con,$user);
					//recojer y mostrar los datos
					while ($us=mysqli_fetch_array($resuser)) {
						

						?>

						<br><br>
					-Usuario:&nbsp;&nbsp;<strong><?php  echo $us['usuario']; ?></strong><br>
					<li><?php echo $row['comentario']; ?></li>
					

						<?php
					}
					}

					 ?>


					</p>
						<form id="form1" name="form1" method="post" action="">
					<p>
						<label for="textfield"></label>
						<br><br><br><br>
					Comentario:
					</p>
					
					<p>
						<textarea name="comentario" cols="90" rows="4" id="textfield"></textarea>
					</p>
					<p>
						<input type="submit" name="comentar" id="button" value="Comentar">
					</p>
					</form>

					<?php 
					//si se postea el comentar entonces...

					if (isset($_POST['comentar'])) {
						// insertar el comentario en base de datos

						$insert="INSERT INTO comentarios (comentario,not_id,usuario) VALUES ('".$_POST['comentario']."', '".$_GET['id']."', '".$_SESSION['id']."')";
						$rescom=mysqli_query($con,$insert);
					 if ($rescom) {
					 	echo "SE AGREGO EL COMENRARIO";
					 }

					}
					 ?>
					<br>




					<?php
					}

						?>
				</div>		
			</div>

			<div id="footer">
				<p style="font-family: arial; font-size: 12px;">© Saca las retas | Todos los derechos reservados a tu carita bonita</p>
			</div>

		</main>
		
		

</body>
</html>