<?php
session_start();
include 'lib/config.php';
//si la sesion no esta definia te regresa al login
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
				<div id="noticias">
					<br>
				<h1>Noticias bien dorilocas</h1>
				<hr>
				<br>
				<br>
				<?php 
				//llamado a base de datos para mostrar noticias en orden descendente
				$noticia="SELECT * FROM noticias ORDER BY id DESC";
				$resnot=mysqli_query($con,$noticia);
				//muestro los datos
				while ($not=mysqli_fetch_array($resnot)) {
				//mostrar el nombre del reportero
				$usuarios="SELECT * FROM usuarios WHERE id_use= '".$not['reportero']."'";
				$resus=mysqli_query($con,$usuarios);
				$user= mysqli_fetch_array($resus);
		 			?>
	
				<a href="noticia.php?id=<?php echo $not['id']; ?>"> <?php echo $not['titulo']; ?></a>
				<br>
				<?php echo $not['noticia']; ?>
				<br>De:
				<strong><?php echo $user['usuario']; ?></strong>
				<hr>			
				<?php echo $not['fecha']; ?>
				
				<br>
				<br>
				<br>
					<?php

					}
					?>

				<br>
				<br>



				<br>
				



  				<?php
				//}
				//}
    
				?>
				</div>
				<div id="white">
					
				</div>
			</div>

			<div id="footer">
				<p style="font-family: arial; font-size: 12px;">© Saca las retas | Todos los derechos reservados a tu carita bonita</p>
			</div>

		</main>
		
		

</body>
</html>