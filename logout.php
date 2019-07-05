<?php
session_start();
//si le postea el cerrar
if (isset($_POST['cerrar_s'])) {
//destruimos las sesiones del usuario
unset($_SESSION['usuario']);
unset($_SESSION['id']);

session_destroy();
//lo mandamos al login
header("Location: login.php");
}
?>