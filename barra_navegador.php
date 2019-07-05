<style type="text/css">
	#navegador ul(
		list-style: none;
		overflow: hidden;
		)
	#navegador li(
    	float: left;
		font-style: italic;
		)
	#navegador li a(
		width: 100%;
		display: block;
		padding: 20px;
		text-decoration: none;
		color: #fff;
		)
	#navegador li:hover(
		background: #004EEF;
		)
</style>

<div id="navegador">
	<ul>
		<li><a href="index.php">Inicio</a></li>
		<li><a href="perfilr.php?id= <?php echo $_SESSION['id']; ?>">Mi Perfil</a>
		</li>
		<?php   if ($_SESSION['rango']== '1' or $_SESSION['rango']== '0') {?><li><a href="panel">Panel</a></li><?php }?>
		
	</ul>
</div>