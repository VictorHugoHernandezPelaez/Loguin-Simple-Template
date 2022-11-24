<?php
	session_start();
	//$value = $_SESSION["variable"];		
	//echo $value;
	require('ASSETS/PLANTILLAS/Plantilla-Head-Heater-Aside-Admin.php');
	error_reporting(E_ERROR |  E_PARSE);
?>
<!--Página de Bienvenida (Parte Secttion)-->
	<section>
		<center>
		<div class="Section-css">
			<br/><br/><br/><br/>
			<table>
            	<th colspan="4">Control de Usuarios</tr>
            	<tr>    

	            	<?php 	
						//session_start();
						// Se rcupera la variable enviada desde 'L_Validar_Ingreso.php'.
						// Esta variable me trae los datos que tiene permisos.
						$value = $_SESSION["variable"];		
						//echo $value;			
					?>
					<!--Se diferencia los permisos. Caso para el Administrador "usuario_permiso == 1"-->
					<?php

						if($value == 1)
						{
					?>
							<td>                    
                        		<button class="btn" onclick="location.href='I_Usuarios_Registrar.php'">Registrar Usuarios</button>
                    		</td>                
		                    <td>
		                        <button class="btn" onclick="location.href='I_Usuarios_Buscar.php'">Buscar Usuarios</button>
		                    </td>  
							
					<?php
						}
					?>
					<!--Se diferencia los permisos. Caso para el Empleado "usuario_permiso == 2"-->
					<?php

						if($value == 2)
						{
					?>
							<td>                    
                        		<button class="btn" disabled="" onclick="location.href='I_Usuarios_Registrar.php'">Registrar Usuarios</button>
                    		</td>                
		                    <td>
		                        <button class="btn" onclick="location.href='I_Usuarios_Buscar.php'">Buscar Usuarios</button>
		                    </td>  
							
					<?php
						}
					?>
					<!--Se diferencia los permisos. Caso para el Admin_Auxiliar "usuario_permiso == 3"-->
					<?php

						if($value == 3)
						{
					?>
							<td>                    
                        		<button class="btn" disabled="" onclick="location.href='I_Usuarios_Registrar.php'">Registrar Usuarios</button>
                    		</td>                
		                    <td>
		                        <button class="btn" onclick="location.href='I_Usuarios_Buscar.php'">Buscar Usuarios</button>
		                    </td>  
							
					<?php
						}
					?>		        
                </tr>
            </table>
		</center>
	</section>
<!--Concatenador con la parte Footer. -->
<?php
	require('ASSETS/PLANTILLAS/Plantilla-Footer.html');
	error_reporting(E_ERROR |  E_PARSE);
	
?>