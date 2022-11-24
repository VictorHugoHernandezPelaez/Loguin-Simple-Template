<!--Concatenador con las partes Head-Heater-Aside. -->
<?php
	require('ASSETS/PLANTILLAS/Plantilla-Head-Heater-Aside-Admin.php');
	error_reporting(E_ERROR |  E_PARSE);
?>
<!--Página Agregar Estudiantes (Parte Secttion)-->
	<section>
	    <div class="Section-css"> 
            <center>
                <div class="form">
                    <br/>
                    <h1>REGISTRO EXITOSO</h1>
        	        <form action="I_Bienvenida.php" method="post">       
                        <br><input name="ok" type="submit"  class="btn" value="ACEPTAR"></br> 
        	        </form>
                </div>
            </center>
        </div>
	</section>
<!--Concatenador con la parte Footer. -->
<?php
	require('ASSETS/PLANTILLAS/Plantilla-Footer.html');
	error_reporting(E_ERROR |  E_PARSE);
?>