<?php  
session_start();
include "../lib/config.php";
 // si la sesion no esta definida te manda  a login 
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
	<title>Editar Perfil</title>
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
		<li><a href="../panel/index.php">Panel</a></li>
		<?php  if ($_SESSION['rango']=='1') { ?><li><a href="editarusuario.php">Regresar a Usuarios</a><?php } ?></li>
		
		
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
				<div id="foro-y">
				<br><br><br><br>
				<?php
						//si el id esta definido
						if (isset($_GET['id'])) {
							//llamado a base de datos donde el id sea el definido antes
							$query="SELECT * FROM usuarios WHERE id_use = '".$_GET['id']."'";
							$result=mysqli_query($con,$query);
							//recojo y muestro los resultados  de usuarios
						while ($row=mysqli_fetch_array($result)) {
							//llamada  base de datos para editar rango

						$rango= "SELECT * FROM rangop WHERE id='".$row['rango']."'";
						$resulran=mysqli_query($con,$rango);
						//recojo los resultados de rangop
						$rang=mysqli_fetch_array($resulran);

						//llamado  a base de datos para mostrar todos los rangos
						$rana="SELECT * FROM rangop WHERE id!= '".$rang['id']."'";

						$resrana=mysqli_query($con,$rana);
							?>

						<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
							<p>
								<label for="textfield2"></label>
								Usuario:<br>
							    <input type="text" name="usuario" id="textfield2" value="<?php echo $row['usuario']; ?>">
							</p><br>
							<p>
								Si desea cambiar su contraseña escriba la nueva aquí:<br>
								<input type="text" name="contrasena" id="textfield">
							</p>
							<p><br>
								Rango:<br>
								<label for="select"></label>
								<select name="rango" id="select">
							<option value="<?php echo $row['rango']; ?>"><?php echo $rang['nombre']; ?></option>
						<?php
						//recojer y mostrar los resultados  
						while ($rangos=mysqli_fetch_array($resrana)) {?>  

						<option value="<?php echo $rangos['id']; ?>"><?php echo $rangos['nombre']; ?></option>
						<?php } ?>
							</select>
							</p><br>
							<p>Avatar:</p>
						<p>
							<img src="../<?php echo $row['avatar']; ?>" height="100" width="100">
						</p>

						<p>
							<label for="fileField"></label>
						    <input type="file" name="avatar" id="fileField">
						</p><br>
						<p>
							<input type="submit" name="editar" id="button" value="Editar Perfil">
						</p>
						</form>

						<?php 
//si se postea el editar perfil entonces...
						if (isset($_POST['editar'])) {
//defino variables
						$usuario=$_POST['usuario'];
						$ranki =$_POST['rango'];
						//si el campo de la contraseña no está vacio entonces se cambia, de lo contrario se queda la que etsba en la base de datos.
						if($_POST['contrasena'] != '' ) { $contrasena=$_POST['contrasena']; } else{$contrasena= $row['contrasena'];}
//definir el formato de las imagenes a jpg
						$tips = 'jpg';
						//todos los formatos pasaran a jpg
						$type = array('image/jpeg' => 'jpg');
						//variable id es el id del usuario
						$id = $row['id_use'];
//guardar el nombre d ela foto
						$nombrefoto1= $_FILES['avatar']['name'];
						//ruta de la imagen
						$ruta1=$_FILES['avatar']['tmp_name'];
						//el nombre se define con el id del usuario y con formato jpg
						$name = $id.'.'.$tips;
						//subir la imagen a la ruta 1
						if(is_uploaded_file($ruta1))
						{
							//carpeta de destino
						$destino1= "avatars/".$name;
						//ya que panel esta en una subcarpeta se agrega ../ para otra acciones
						$destino2= "../avatars/".$name;
						copy($ruta1, $destino2);
						}

						else{
							//si no cambia la imagen se queda la que estaba
							$destino1=$row['avatar'];

						}
//se suben los nuevo datos a usuarios
						$sql="UPDATE usuarios SET usuario = '".$usuario."', contrasena = '".$contrasena."',rango = '".$ranki."', avatar = '".$destino1."' WHERE id_use = '".$_GET['id']."' ";
						$resultado=mysqli_query($con,$sql);
//si se modifican entonces..
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
<?php } ?>
	