<?php  
session_start();
include "../lib/config.php";
  //si la sesion no esta definida entonces te manda a login
  if (!isset($_SESSION['usuario'])) {
  	header("location: ../login.php");
  }
//si la sesion es rango 1 o 0 entonces muesro la pagina
  if ($_SESSION['rango']== '1' or $_SESSION['rango']== '0') {

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Agregar Rango</title>

		
</head>
<body>
	<?php include"barra_navegador.php"; ?>
	

	
				
				<br><br><br><br><br>
				<form id="form1" name="form1" method="post" action="">
	<p>
		<label for="textfield"></label>
		Nombre del Rango:
		<input type="text" name="nombre" id="textfield">
	</p>
	<br>
	<p>
		Color del Rango:
		<input type="text" name="color" id="textfield2">
	</p>
	<br>
	<p>
		<input type="submit" name="guardar" id="button" value="Add Rango">
	</p>
</form>

<?php  
//insertar el nuevo rango a la base de datos 
if (isset($_POST['guardar'])) {
	$query="INSERT INTO rangop (nombre,color) VALUES ('".$_POST['nombre']."','".$_POST['color']."')";
	$result=mysqli_query($con,$query);
	//si funciona entonces
	if ($result) {
		echo "El rango se te inserto prro";
	}
}
?>

			
		

</body>
</html>
<?php } ?>