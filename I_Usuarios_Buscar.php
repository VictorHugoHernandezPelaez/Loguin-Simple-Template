<?php
session_start();
	require('ASSETS/PLANTILLAS/Plantilla-Head-Heater-Aside-Admin.php');
	error_reporting(E_ERROR |  E_PARSE);
?>
<!--Página Agregar Estudiantes (Parte Secttion)-->
	<section>
	    <div class="Section-css"> 
            <center>
                <br/><br/>
                <div class="form">
                    <h3>BURCAR PERSONA</h3>
        	        <form action="I_Usuarios_Buscar_Resultado.php" method="post">
                        <br><label for="id_usuario">Ingrese Identificacion:</label></br>
                        <br><input style="text-align:center;" name="id_usuario" type="text" maxlength="10" required="Ingresar Numero de Identificacion.">
                        </br></br>
                        <table>
                            <tr>            
                                <td>                    
                                    <input name="submit_Buscar_Persona" type="submit"  class="btn" value="Buscar">
                                </td>                
                                <td>
                                     <a href='javascript:history.back(-1);' title='Ir la página anterior' class="btn" value="Regresar">Regresar</a>
                                </td>          
                            </tr>
                        </table>
        	        </form>
                </div>
                <br/><br/>
                </center>
        </div>
	</section>
<!--Concatenador con la parte Footer. -->
<?php
	require('ASSETS/PLANTILLAS/Plantilla-Footer.html');
	error_reporting(E_ERROR |  E_PARSE);
?>






