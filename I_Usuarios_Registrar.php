<!--Concatenador con las partes Head-Heater-Aside. -->
<?php
	require('ASSETS/PLANTILLAS/Plantilla-Head-Heater-Aside-Admin.php');
	error_reporting(E_ERROR |  E_PARSE);    
?>
<!--Página Agregar Personas (Parte Secttion)-->
	<section>
	    <div class="Section-css"> 
            <center>
            <div class="form">
                <br/>
                <br/>
                <h3>REGISTRO DE USUARIOS</h3><br/>
        	    <form action="LOGICA/L_Usuarios_Registrar.php" method="post"> 

                    <table>
                        <th>Identificacion</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Edad</th>                                                
                        <tr>
                            <td>   
                                <input style="text-align:center;" name="id" type="text" maxlength="10" required="Ingresar Numero de Identificacion.">
                            </td>
                            <td>
                                <input style="text-align:center;" name="nombre" type="text" maxlength="15" required="Ingresar Nombre.">
                            </td>
                            <td>
                                <input style="text-align:center;" name="apellido" type="text" maxlength="20" required="Ingresar Aprellido.">
                            </td>
                            <td>
                                <input style="text-align:center;" name="edad" type="text" maxlength="2" required="Ingresar Edad.">
                            </td>
                        </tr>
                        <th>Genero</th>
                        <th>Telefono</th>
                        <th>Dirección</th>
                        <th>Ciudad</th>
                        <tr>
                            <td>
                                <select name="genero">
                                    <option value="Ninguno" disabled="" selected="">Elija una opción</option>
                                    <option value="Masculino" required="Seleccione una Opción." >Masculino</option>
                                    <option value="Femenino" required="Seleccione una Opción.">Femenino</option>
                                    <option value="Otro" required="Seleccione una Opción.">Otro</option>                  
                                </select>
                            </td>
                            <td>
                                <input style="text-align:center;" name="telefono" type="text" maxlength="10" required="Ingresar Número Telefonico."> 
                            </td>
                            <td>
                                <input style="text-align:center;" name="direccion" type="text" maxlength="25" required="Ingresar Dirección.">
                            </td>
                            <td>
                                <input style="text-align:center;" name="ciudad" type="text" maxlength="25" required="Ingresar Ciudad.">
                            </td>
                        </tr>
                    </table>
                    <br/>
                    <table>
                        <th>Cargo del Usuario</th>
                        <th>E-Mail</th>
                        <th>Fecha Registro</th>
                        <tr>                            
                            <td>
                                <input style="text-align:center;" name="cargo" type="text" maxlength="25" required="Ingresar Cargo.">
                            </td>
                            <td>
                                <input style="text-align:center;" name="email" type="text" maxlength="45" required="Ingresar Email.">
                            </td>
                            <td>
                            <?php
                                date_default_timezone_set('America/Bogota');
                                $fecha_actual=date("Y-m-d H:i:s");
                            ?>
                                <input style="text-align:center;" name="fecha_registro" type="DateTime" class="fecha"  value="<?=$fecha_actual?>" readonly="">
                            </td>
                        </tr>
                            <th>Rol</th>
                            <th>Contraseña</th>
                            <th>Permisos</th>                        
                        <tr>
                            <td>
                               <select name="rol" style="text-align:center;" required="Ingresar el rol de la persona.">
                                        <option value="Ninguno" disabled="" selected="">Elija una opción</option>
                                        <option value="Administrador" required="Seleccione una Opción.">Administrador</option>
                                        <option value="Empleado" required="Seleccione una Opción.">Empleado</option>
                                        <option value="Admin_Auxiliar" required="Seleccione una Opción.">Admin_Auxiliar</option>
                                    </select> 
                            </td>
                            <td>
                                <input style="text-align:center;" name="contrasena" type="text" required="Ingresar Contraseña del Usuario.">
                            </td>
                            <?php    
                                // Este Conjunto es el seleecionable por el usuario.
                                ?>
                                    <td>
                                        <input type="checkbox" name="permiso[]" value="1">Registrar
                                        <br/>
                                        <input type="checkbox" name="permiso[]" value="3">Ver
                                        <br/>
                                        <input type="checkbox" name="permiso[]" value="5">Editar
                                        <br/>
                                        <input type="checkbox" name="permiso[]" value="10">Eliminar      
                                    </td>
                                <?php    
                                // -------------------------------------------------.
                                ?>                               
                        </tr>
                    </table>
                    <br/>                
                        <table>
                            <tr>            
                                <td>                    
                                    <input name="submit" type="submit"  class="btn" value="Registrar">
                                </td>                
                                <td>
                                     <a href='javascript:history.back(-1);' title='Ir la página anterior' class="btn" value="Regresar">Regresar</a>
                                </td>          
                            </tr>
                        </table>
                    <br/>
                    <br/>
                    <br/> 
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






