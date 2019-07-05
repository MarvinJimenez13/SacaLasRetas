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
	<title>Reglamento | Saca las retas</title>
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
					<br>
					<h1>Reglamento</h1>
					<br>
					<br>
					<p>1.- Todo los datos que proporciones deberán ser verídicos, de lo contrario será baneada la cuenta.</p><br>
					<p>2.- Evita palabras altisonantes. Al incurrir en el mismo error 3 veces será merito de baneo.</p><br>
					<p>3.- Las etiquetas de subnormal están permitidas (ejemplo: ci papuh, pro prro, etc...)</p><br>
					<p>4.- Si tienes una mala experiencia con algun usuario, reportalo con tu admin de confianza.</p><br>
					<p>5.- Prohíbido el porno, sólo si lo pasan por links de mega :v</p><br>
					<p>6.- Cualquier usuario que se sorprenda soplando burbujas será brutalmente golpeado.</p><br>
					<p>7.- No insultar a las gfcitas, ellas son chulas.</p><br>
					<p>8.- Disfruten de las retas que para eso son.</p><br>
				</div>
			</div>

			<div id="footer">
				<p style="font-family: arial; font-size: 12px;">© Saca las retas | Todos los derechos reservados a tu carita bonita</p>
			</div>

		</main>
		
		

</body>
</html>