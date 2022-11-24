<?php
    session_start();
	//echo $_SESSION["variable"];	
	require('ASSETS/PLANTILLAS/Plantilla-Head-Heater-Aside-Admin.php');
	error_reporting(E_ERROR |  E_PARSE);
?>
<!--Página de Bienvenida (Parte Secttion)-->
	<section>
		<center>
		<div class="Section-css">
			<br><br><br><br><br>
			<h1>Bienvenido</h1>			
			<?php

				//Espacio en blanco.

			?>
		</center>
	</section>
<!--Concatenador con la parte Footer. -->
<?php
	require('ASSETS/PLANTILLAS/Plantilla-Footer.html');
	error_reporting(E_ERROR |  E_PARSE);
	
?>