<?php  
session_start();
include "../lib/config.php";
  //si la sesion no esta definida entonces te manda a login
  if (!isset($_SESSION['usuario'])) {
  	header("location: ../login.php");
  }
  //si el rango de la sesion es 1 o 0 entonces muestro la pagina
  if ($_SESSION['rango']== '1' or $_SESSION['rango']== '0') {
  	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Agregar Noticia</title>
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
		<li><a href="../panel/index.php">Regresar al panel</a></li>
		   
		
		
	</ul>
			</div>

			<div id="perfil">
				<?php
//llamdo a base de datos cuando el id sea igual al de la sesion iniciada
				$query="SELECT * FROM usuarios WHERE id_use = '".$_SESSION['id']."'";
  				$result=mysqli_query($con,$query);
  				//recojo los datos de usuarios
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
				<form id="form1" name="form1" method="post" action="">
	<p>
		<label for="textfield"></label>
		Titulo de la noticia:
		<input type="text" name="titulo" id="textfield">
	</p>
	<br>
	<p>
		Noticia:
		<textarea name="noticia" cols="100" rows="10" id="textfield2"></textarea>
	</p>
	<br>
	<p>
		<input type="submit" name="guardar" id="button" value="Agregar Noticia">
	</p>
</form>

<?php  
//insertar el nuevo rango a la base de datos 
if (isset($_POST['guardar'])) {
	$query="INSERT INTO noticias (titulo,noticia,reportero,fecha) VALUES ('".$_POST['titulo']."','".$_POST['noticia']."','".$_SESSION['id']."',now())";
	$result=mysqli_query($con,$query);
	//si funciona entonces
	if ($result) {
		echo "la noticia se agrego";
	}
}
?>
			</div>	

			<div id="footer">
				<p style="font-family: arial; font-size: 12px;">© Saca las retas | Todos los derechos reservados a tu carita bonita</p>
			</div>

		</main>
</body>
</html>
<?php } ?>
