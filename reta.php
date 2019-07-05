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
				
				<?php
				//si el id de la reta esta definido entonces...
if (isset($_GET['id'])) {

//llamado a bse de datos de las retas donde el id de la reta sea igual al dfinido antes
$foro="SELECT * FROM retas WHERE id_ret= '".$_GET['id']."'";
$resforo=mysqli_query($con,$foro);
//recojo y muestro  los resultados
while($row=mysqli_fetch_array($resforo)) {
	?>

<br>
    Nombre:
	<?php echo $row['nombreusuario']; ?>
    <br>
    Numero de jugadores: 
	<?php echo $row['numjugadores']; ?>
	<br>
	Fecha:
    <?php echo $row['fecha']; ?>
	<br>
	Hora:
	<?php echo $row['hora']; ?>
	<br>
	Direccion o Coordenadas:
	<?php echo $row['coor']; ?>
	<br>
	Descripcion:
	<?php echo $row['descripcion']; ?>
	<br>

	<br><br>

	<?php 
}
?>



<hr>

<?php 

	

//llamado a base de datos para mostrar los comentarios
$comen="SELECT * FROM comretas WHERE ret_id= '".$_GET['id']."' ";
$rescomen=mysqli_query($con,$comen);
//recojo y muestro los comentarios
while ($roww=mysqli_fetch_array($rescomen)) {?>
<?php
//llamado a la base de datos para mostar el nombre d eusuario
$user="SELECT * FROM usuarios WHERE id_use = '".$roww['usuario']."'";
$resuser=mysqli_query($con,$user);
//recojo y muestro el usuario
while ($userr=mysqli_fetch_array($resuser)) {?>

Usuario:
<li><?php  echo $userr['usuario']; ?></li>

<li><?php  echo $roww['comentario']; ?></li>
<br><br>
<?php
}
}
 ?>



<hr>
Comentario:


<br>
<form method="post">
	<textarea name="comentario" cols="90" rows="4" id="textfield">
		
	</textarea>
<br>
	<input type="submit" name="comentar" value="Comentar">
</form>
<?php  


//si se postea el comentar entonces....
if (isset($_POST['comentar'])) {
	//insertar el comentario
	$com="INSERT INTO comretas (comentario,ret_id,usuario)  VALUES  ('".$_POST['comentario']."', '".$_GET['id']."','".$_SESSION['id']."') ";
$resco=mysqli_query($con,$com);


	if ($resco) {
		echo "si inserto com";
	}
}

?>

<?php	
}

?>
			</div>

			<div id="footer">
				<p style="font-family: arial; font-size: 12px;">© Saca las retas | Todos los derechos reservados a tu carita bonita</p>
			</div>

		</main>
		
		

</body>
</html>