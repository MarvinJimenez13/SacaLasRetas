<?php
session_start();
include 'lib/config.php';
//si la sesion no esta definida te manda al login
if (!isset($_SESSION['usuario'])) {
	header("location:login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Foros | Saca las retas</title>
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
						
						<form action="logout.php" method="post">
						<input type="submit" name="cerrar_s" value="Cerrar sesion">
					</div>
				
				
			</div>

			
			
		</header>
		
		<nav></nav>

		<main>
			<div id="note">	
				<div id="foro-y">
					<br>
					<h3>Aquí podras encontrar lugares preferidos por otros usuarios para ir a las retas.</h3>
					<br>
					Hola <strong><?php echo $_SESSION['usuario']; ?></strong>
					<br>
					<br>
					Si deseas publicar tu lugar favorito para retar de click en:
					<a href="agregarretas.php">Agregar reta</a>
					<br>
					<br>
					Para ver el lugar donde se encontará tu sabrosa reta deberas copiar y pegar las coordenadas en el mapa:
					<br>
					<img src="ins/ret.jpg" width="320" height="200">

					<br> 
					<br>
					<form>
	
					</form>

					<?php 
					//llamdo a base de datos del as retas
					$foro="SELECT * FROM retas ORDER BY id_ret DESC";
					$resforo=mysqli_query($con,$foro);
					//muestro resultados
					while ($row=mysqli_fetch_array($resforo)) {
						?>
					<a href="reta.php?id=<?php echo $row['id_ret']; ?>">  RETA------</a>
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
						<hr>
						<br>
						


						<?php	
						}

						?>
   					
					<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d60200.63803196419!2d-99.13753509521518!3d19.432276716299377!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sus!4v1512021018189" width="720" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			</div>

			<div id="footer">
				<p style="font-family: arial; font-size: 12px;">© Saca las retas | Todos los derechos reservados a tu carita bonita</p>
			</div>

		</main>
		
		

</body>
</html>