<?php  
session_start();
include "../lib/config.php";
  //si la sesion no esta definida te manda al login
  if (!isset($_SESSION['usuario'])) {
  	header("location: ../login.php");
  }
//si el rango de la sesion es 1 o 0 se muestra la pagina
  if ($_SESSION['rango']== '1' or $_SESSION['rango']== '0') {


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Editar Usuario</title>
	<link rel="stylesheet" href="../css/estilos.css">
	<script language="JavaScript" type="text/javascript">
		
function Confirmar (frm){

	var borrar = confirm("¿Seguro prro?");

	return borrar;
}


	</script>

</head>
<body>
	<header> 
			<div id="logo">
				<img class="borde" src="../img/logo.png" width="232" height="62">
			</div>

			<div id="menu">
				<br>
				<ul>
					<li><a href="index.php">Panel</a></li>
	   				<?php  if ($_SESSION['rango']=='1') { ?>
	   	 			<li><a href="editarusuario.php">Editar usuarios</a><?php } ?></li>
	        		<?php  if ($_SESSION['rango']=='1') { ?> <li><a href="rangos.php">Ver rangos</a><?php } ?></li>	
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
				<br>
				<br>
				<?php

if (isset($_GET['borrar'])) {

//llamado a  la base de datos para eliminar imagen y usuario.

	$user ="SELECT * FROM usuarios WHERE id_use = '".$_GET['borrar']."'";

	$ress1=mysqli_query($con,$user);

//recojer variables
	$us=mysqli_fetch_array($ress1);

//link de la imagen 
	$avatar= unlink("../".$us['avatar']."");

	//eliminar el usuario de la base de datos.
	
	$sqlx="DELETE FROM usuarios WHERE id_use= '".$_GET['borrar']."'";
	
	$ress=mysqli_query($con,$sqlx);
}
	?>

<table width="200" border="1">
	<thead>
	<tr>
		<td>ID</td>
		<td>NOMBRE COMPLETO</td>
		<td>USUARIO</td>
		<td>AVATAR</td>
		<td>EMAIL</td>
		<td>FECHA DE REGISTRO</td>
		<td>RANGO</td>
		<td>OPCIONES</td>
	</tr>
</thead>
<tbody>
<?php 
//llamado a base de datos y seleccionar todo
$query="SELECT * FROM usuarios";
$result=mysqli_query($con,$query);

//recojer variable y mostrar
while ($row=mysqli_fetch_array($result)) {

	//llamado a la base de datos para sacar el rango

$rango="SELECT * FROM rangop WHERE id= '".$row['rango']."'";
$resulran=mysqli_query($con,$rango);

//arrastro el rango

$ran= mysqli_fetch_array($resulran);


	?>

	<tr>
		<td><?php echo $row['id_use']; ?></td>
		<td><?php echo $row['nombre']; ?></td>
		<td><?php echo $row['usuario']; ?></td>
		<td><img src="../<?php echo $row['avatar'];?>" width="100" height="100"></td>
		<td><?php echo $row['email']; ?></td>
		<td><?php echo $row['fecha_reg']; ?></td>
		<td><?php echo $ran['nombre']; ?></td>
		<td><a href="editarperfil.php?id=<?php echo $row['id_use']; ?>"> Editar</a>/ <a href="editarusuario.php?borrar=<?php echo $row['id_use'];?> " onclick="return Confirmar (this.form)" > Borrar </a></td>
	</tr>


<?php
}

 ?>
</tbody>
	</table>
			</div>

			<div id="footer">
				<p style="font-family: arial; font-size: 12px;">© Saca las retas | Todos los derechos reservados a tu carita bonita</p>
			</div>

		</main>
		
		

	
</body>
</html>
<?php } ?>