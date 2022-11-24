<!DOCTYPE html>
<!--Esta página tenemos diseñada la plantilla donde se encuentra el Body-Head y Header.-->
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../ASSETS/CSS/css.css">
</head>
</html>

<!--Concatenador con las partes Head-Heater-Aside. -->
<?php
require('../ASSETS/PLANTILLAS/Plantilla-Head-Heater-Aside-Admin.php');
/*include('LOGICA/L_Consultar_Personas.php');*/
include('L_Funciones.php');
error_reporting(E_ERROR |  E_PARSE);
?>

<?php  

//-------------validamos envio --------------------------------------------
if(isset($_GET['id_usuario']))
{
	/*Se coteja que cada 'VALUE' que viene desde el metodo 'POST' contenga infomacion y sea el formato adecuado.*/
	/*Con la funcion 'is_numeric', valido un 'TRUE' para caracteres numericos y un 'FALCE' para caracteres alfabeticos*/
	if(empty($_GET["id_usuario"]) || is_numeric($_GET["id_usuario"]) === false)
	{
		echo "La identificación es requerida y no debe contener caracteres alfabéticos.";
	}
	if(empty($errores)) 
	{
		$id_usuario = filtrado($_GET['id_usuario']);
	?>
		<center>
			<div class="form">
				<h3>Va a proceder a eliminar al usuario con documento de indentificación número [<?php echo $id_usuario; ?>]</h3>
				</br>
				</br>	
				<table>
						<th ROWSPAN="1">
							<?php 
								echo "<a href =../I_Usuarios_Borrados.php?id_usuario_eliminar=$id_usuario title='Eliminar usuario'> Aceptar </a>";
							?>        
						</th>
						<th ROWSPAN="1">
							<?php 
								echo "<a href=../I_Usuarios_Buscar.php title='Eliminar usuario'> Cancelar </a>";
							?>
						</th>
					<table>
			</div>
        </center>
	<?php
		
		
	}
	
	
}
?>

<!--Concatenador con la parte Footer. -->
<?php
require('../ASSETS/PLANTILLAS/Plantilla-Footer.html');
error_reporting(E_ERROR |  E_PARSE);
?>