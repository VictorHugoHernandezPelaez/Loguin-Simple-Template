<!DOCTYPE html>
<!--Esta página tenemos diseñada la plantilla donde se encuentra el Body-Head y Header.-->
<html>
<head>
	<title>SIE</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="text/css" href="ASSETS/IMG/estudiantes.png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="ASSETS/CSS/css.css">
	<script src="ASSETS/JS/script.js" language="Javascript"></script>  

</head>
<!--Sección Body-->
<body>
	<div id="Body-css">
		<!--Sección Header-->
		<HEADER>
			<div class="Header-css">
				<br><br>
				<center><h2>PÁGINA PRINCIPAL</h2></center>
				<br><br>
			</div>
			<!--En esta sección tenemos los botones de las opciones para redirigir a las diferentes páginas.-->
			<div class="Aside-css">
				<center>
				
				<?php 	
					//session_start();
					// Se rcupera la variable enviada desde 'L_Validar_Ingreso.php'.
					// Esta variable me trae los datos que tiene permisos.
					//$value = $_SESSION["variable"];					
				?>
				<!--Botones Principales -->
					<br/>
					<ul>
						<li>
							<button class="btn" onclick="location.href='I_Usuarios_Control.php'">Control Usuarios</button>
						</li>
						<li>
							<button class="btn" onclick="location.href='I_Registrar_Usuarios.php'">Control Inventario</button>
						</li>
						<li>
							<button class="btn" onclick="location.href='index.php'">Cerrar Sesión</button>
						</li>	
					</ul>
					<br/>
				</center>
			</div>
	</HEADER>