<?php
//defino variables para el servidor,usuario, contra y base de datos
$BBDD_host="localhost";
$BBDD_user="root";
$BBDD_pass="";
$BBDD_BBDD="redsocial";
//la variable con sera para conectar a la base de datos
$con=mysqli_connect($BBDD_host,$BBDD_user,$BBDD_pass);
if (mysqli_connect_errno()) {
	echo "No se puede";
}

mysqli_set_charset($con,"UTF8");
//seleccionamos la base de datos
mysqli_select_db($con,$BBDD_BBDD) or die ("Error");
?>