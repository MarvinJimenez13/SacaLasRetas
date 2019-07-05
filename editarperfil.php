<?php
session_start();
include 'lib/config.php';
//si la sesion mo esta definida te manda al login
if (!isset($_SESSION['usuario'])) {
	header("location:login.php");
}
//ini_set('error_reporting', 0);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Editar perfil | Saca las retas</title>
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
				<div id="perf">
					
					<br>
					<br>
					<a href="perfilr.php?id= <?php echo $_SESSION['id']; ?>" style="padding-left: 20px">Regresar al perfil</a>
					<br>
					<br>
					<?php
//si el id del usuario esta definido entonces muestro la pagina
					if (isset($_GET['id'])) {
						//llamado a base de datos de usuarios pdonde el id que esta definida sea igual al usuario en sesion
						$query="SELECT * FROM usuarios WHERE id_use = '".$_GET['id']."'";
						$result=mysqli_query($con,$query);
						//recojo y  muestro los resultados
					while ($row=mysqli_fetch_array($result)) {
					?>

					<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
					<h3 style="padding-left: 20px">Avatar:</h3>
					<p>
					<img src="<?php echo $row['avatar']; ?>" height="100" width="100">
					</p>
					<p>
					<label for="fileField"></label>
    				<input type="file" name="avatar" id="fileField">
					</p>
					<p>
					<label for="textfield2"></label>
					<br>
					Usuario:<br>
	    			<input type="text" name="usuario" id="textfield2" value="<?php echo $row['usuario']; ?>">
					</p>
					<br>
					<p>
					Cambio de contraseña:<br>
					<input type="text" name="contrasena" id="textfield">
					</p>
					<br>
					<p>
					Descripción de ti y tus gustos:<br>
					<input type="text" name="des" id="textfield" value="<?php echo $row['descripcion']; ?>">
					</p>
					<br>
					<p>
					Edad:<br>
					<input type="text" name="edad" id="textfield" value="<?php echo $row['edad']; ?>">
					</p>
					<br>
					<p>
					¿Qúe estilo de futbol prefieres?<br>
					<input type="text" name="fut" id="textfield" value="<?php echo $row['tipfut']; ?>">
					</p>
					<br>
					<p>
					<input type="submit" name="editar" id="button" value="Editar Perfil" align="center">
					</p>
					</form>

					<?php 
//si se postea el editar entonces..
					if (isset($_POST['editar'])) {
						//defino variables de la info
					$descripcion=$_POST['des'];
					$edad=$_POST['edad'];
					$fut=$_POST['fut'];
					$usuario=$_POST['usuario'];
					//si el campo de la contraseña no esta vaci0o entonces la cambio, de lo contrario dejo la que esta en la base de datos
					if($_POST['contrasena'] != '' ) { $contrasena=$_POST['contrasena']; } else{$contrasena= $row['contrasena'];}
//defino variables para subir la imagen
					//defino el formato de las imagenes
					$tips = 'jpg';
					//cambio los formatos a jpg
					$type = array('image/jpeg' => 'jpg');
					//variable id es igual al que recoji en el row del inico
					$id = $row['id_use'];
//defino el nombre
					$nombrefoto1= $_FILES['avatar']['name'];
					//defino ruta y nombre temporal
					$ruta1=$_FILES['avatar']['tmp_name'];
					// el nombre sera igual al id del usuario y el formato antes definido
					$name = $id.'.'.$tips;
					//si se sube a la ruta 1
					if(is_uploaded_file($ruta1))
					{
						//entonces la guardo en la carpeta
					$destino1= "avatars/".$name;
					// la copio en la base y en carpeta
					copy($ruta1, $destino1);
					}

					else{
						//si no se agrega una imagen se queda la anterior de la base de datos
					$destino1=$row['avatar'];

					}
//se suben los cambios del perfil
					$sql="UPDATE usuarios SET usuario = '".$usuario."', contrasena = '".$contrasena."', avatar = '".$destino1."',descripcion = '".$descripcion."',edad = '".$edad."',tipfut = '".$fut."' WHERE id_use = '".$_GET['id']."' ";
					$resultado=mysqli_query($con,$sql);

					if($resultado) 

					{

					echo "Se modificó le Perfil";

					}

					}
					?>




	
					<?php 

					}


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