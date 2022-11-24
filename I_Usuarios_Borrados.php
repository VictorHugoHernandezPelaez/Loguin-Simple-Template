<!DOCTYPE html>
<!--Esta página tenemos diseñada la plantilla donde se encuentra el Body-Head y Header.-->
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../ASSETS/CSS/css.css">
</head>
</html>

<!--Concatenador con las partes Head-Heater-Aside. -->
<?php
require('ASSETS/PLANTILLAS/Plantilla-Head-Heater-Aside-Admin.php');
/*include('LOGICA/L_Consultar_Personas.php');*/
include('LOGICA/L_Funciones.php');
error_reporting(E_ERROR |  E_PARSE);
?>

<?php  

//-------------validamos envio --------------------------------------------
if(isset($_GET['id_usuario_eliminar']))
{
	/*Se coteja que cada 'VALUE' que viene desde el metodo 'POST' contenga infomacion y sea el formato adecuado.*/
	/*Con la funcion 'is_numeric', valido un 'TRUE' para caracteres numericos y un 'FALCE' para caracteres alfabeticos*/
	if(empty($_GET["id_usuario_eliminar"]) || is_numeric($_GET["id_usuario_eliminar"]) === false)
	{
		echo "La identificación es requerida y no debe contener caracteres alfabéticos.";
	}
	if(empty($errores)) 
	{
		$id_usuario_eliminar = filtrado($_GET['id_usuario_eliminar']);
		Funcion_Eliminar_Usuario($id_usuario_eliminar);
				
	?>
		
			<div class="form">
				<br/>
					<?php
						echo "<br/><center><h2 style ='color: blue;'>REGISTRO EXITOSO</h2></center></br>";
						echo "<a href='I_Bienvenida.php'><center><h3> Aceptar </h3></center></a>";
					?>
				
			</div>
        
	<?php		
	}	
}
?>

<!--Concatenador con la parte Footer. -->
<?php
require('ASSETS/PLANTILLAS/Plantilla-Footer.html');
error_reporting(E_ERROR |  E_PARSE);
?>