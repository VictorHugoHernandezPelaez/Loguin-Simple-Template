<!--Concatenador con las partes Head-Heater-Aside. -->
<?php 
    require('ASSETS/PLANTILLAS/Plantilla-Head-Heater-Aside-Admin.php');
    include('LOGICA/L_Funciones.php');
    error_reporting(E_ERROR |  E_PARSE);
    /* Se recibe y verifica que la variable "identificación" haya llegado por el metodo GET.*/
    if (isset($_GET['id_usuario'])) 
    {
        /*Se filtra y limpia el valor de la variable "identificacion" que ha llegado por el metodo GET*/
        $id_usuario = filtrado($_GET['id_usuario']);
        /* Se llama la funcion que permite buscar en la base de datos el registro de una persona.*/
        $datos = Funcion_Buscar_Usuario($id_usuario);
    }
    else
    {
        echo("El número de identificación no concuerda con el registro visto previamente.");
    }
?>
    <section>
        <div class="Section-css">
            <center>
            <div class="form">
                <h2>Editar Persona con Identificación Número:</h2>
                <?php
                    /*Imprime la identificación que se esta buscando.*/
                    echo ("<h3 style ='color: blue;'>[".$id_usuario."]</h3></br>");
                ?>
                <form action="LOGICA/L_Usuarios_Editar.php" method="POST">
                <?php 
                foreach($datos as $dato) {
                // El dato_usuario[2], es el arreglo donde en el campo "2", contiene la información de la contraseña, la cual se encuentra encriptada, se realiza el proceso de desencriptación para ser mostrada.
                $contrasena = $dato[2];
                $contrasena_desencriptada = Funcion_Contrasena_desencriptar($contrasena);
                ?>
                    <table>
                        <th>Identificación</th>
                        <th>Nombre</th>
                        <th colspan="2">Apellido</th>
                        <th>Edad</th>                      
                        <tr>
                            <td><input style="text-align:center; color: red;" name="id" type="text" maxlength="10" required="Ingresar Numero de Identificacion." value ="<?php echo $dato[0];?>" readonly=""><br/></td>

                            <td><input style="text-align:center; color: red;" name="nombre" type="text" maxlength="15" required="Ingresar Nombre." value ="<?php echo $dato[3]; ?>" readonly=""><br/></td>

                            <td colspan="2"><input style="text-align:center; color: red;" name="apellido" type="text" maxlength="20" required="Ingresar Aprellido." value ="<?php echo $dato[4]; ?>" readonly=""><br/></td>

                            <td><input style="text-align:center; color: red;" name="edad" type="text" maxlength="2" required="Ingresar Edad." value ="<?php echo $dato[5]; ?>" readonly=""><br/></td>
                        </tr>
                        <th>Género</th>
                        <th>Teléfono</th>
                        <th colspan="2">Dirección</th>
                        <th>Ciudad</th>
                        <tr>
                            <td><input style="text-align:center; color: red;" name="genero" type="text" required="Ingresar el genero de la persona." value ="<?php echo $dato[6]; ?>" readonly=""><br/></td>

                            <td><input style="text-align:center; color: green;" name="telefono" type="text" maxlength="10" required="Ingresar Número Telefonico." value ="<?php echo $dato[7]; ?>"><br/> </td>

                            <td colspan="2"><input style="text-align:center; color: green;" name="direccion" type="text" maxlength="25" required="Ingresar Dirección." value ="<?php echo $dato[8]; ?>"><br/></td>

                            <td><input style="text-align:center; color: green;" name="ciudad" type="text" maxlength="25" required="Ingresar Ciudad." value ="<?php echo $dato[9]; ?>"><br/></td>
                        </tr>
                   
                        
                            <tr>
                                <th>Cargo</th>                  
                                <th>Email</th>
                                <th colspan="2">Contraseña</th>
                                 <th>Fecha Registro</th>
                            </tr>
                        
                        <tbody>
                            <tr>                          
                                <td><input style="text-align:center; color: green;" name="cargo" type="text" required="Ingresar el cargo del usuario." value ="<?php echo $dato[10]; ?>"><br/></td>                           
                                <td><input style="text-align:center; color: green;" name="email" type="text" maxlength="45" required="Ingresar Email." value ="<?php echo $dato[11]; ?>"><br/></td>
                                <td colspan="2"><input style="text-align:center; color: green;" name="contrasena" type="text" required="Ingresar la constraseña de la persona." value ="<?php echo $contrasena_desencriptada; ?>"><br/></td> 
                                <td><input style="text-align:center; color: red;" name="fecha_registro" type="date" class="fecha" value ="<?php echo $dato[12]; ?>" readonly=""><br/></td>   
                            </tr>
                            <tr>
                                <th>Estado Actual</th>
                                <th>Rol Actual</th>
                                <th colspan="2">Permisos Inventario [<?php echo $dato[13]?>] </th>
                                <th rowspan="2"><input type="submit" class="btn" value="Actualizar"></th>
                            </tr>    
                            <tr>
                                <?php
                                if ($dato[14] == 1) 
                                    {
                                ?>
                                    <td>
                                    <select name="estado" style="text-align:center; color: green;" required="Ingresar el estado de la persona.">
                                        <option value="1" selected="">Activo</option>
                                        <option value="1" required="Seleccione una Opción.">Activo</option>
                                        <option value="0" required="Seleccione una Opción.">Inactivo</option>
                                    </select>
                                    </td> 
                                <?php  
                                    }
                                elseif ($dato[14] == 0) 
                                    {
                                ?>
                                    <td>
                                    <select name="estado" style="text-align:center; color: green;" required="Ingresar el estado de la persona.">
                                        <option value="0" selected="">Inactivo</option>
                                        <option value="1" required="Seleccione una Opción.">Activo</option>
                                        <option value="0" required="Seleccione una Opción.">Inactivo</option>
                                    </select>
                                    </td>    
                                <?php    
                                    }
                                ?> 
                                <td>
                                    <select name="rol" style="text-align:center; color: green;" required="Ingresar el rol de la persona.">
                                        <option value="<?php echo $dato[1] ?>" required="Seleccione una Opción."><?php echo $dato[1]; ?></option>
                                        <option value="Administrador" required="Seleccione una Opción.">Administrador</option>
                                        <option value="Empleado" required="Seleccione una Opción.">Empleado</option>
                                        <option value="Admin_Auxiliar" required="Seleccione una Opción.">Admin_Auxiliar</option>
                                    </select> 
                                <br/></td>

                                <?php
                                // Muestra todas las posibles combinaciones del CRUD de Inventario.
                                ?>
                                <?php
                                if ($dato[13] == 0) 
                                    {
                                ?>
                                    <td><input type="checkbox" name="permiso[]" value="1" disabled="" >Registrar<br/>
                                        <input type="checkbox" name="permiso[]" value="2" disabled="" >Ver<br/>
                                        <input type="checkbox" name="permiso[]" value="3" disabled="" >Editar<br/>
                                        <input type="checkbox" name="permiso[]" value="3" disabled="" >Eliminar</td>
                                <?php  
                                    }
                                elseif ($dato[13] == 10)
                                    {
                                ?>
                                    <td><input type="checkbox" name="permiso[]" value="1" disabled="" >Registrar<br/>
                                        <input type="checkbox" name="permiso[]" value="2" disabled="" >Ver<br/>
                                        <input type="checkbox" name="permiso[]" value="3" disabled="" >Editar<br/>
                                        <input type="checkbox" name="permiso[]" value="3" disabled="" checked="">Eliminar</td>
                                <?php    
                                    }                               
                                elseif ($dato[13] == 5)
                                    {
                                ?>
                                    <td><input type="checkbox" name="permiso[]" value="1" disabled="" >Registrar<br/>
                                        <input type="checkbox" name="permiso[]" value="2" disabled="" >Ver<br/>
                                        <input type="checkbox" name="permiso[]" value="3" disabled="" checked="">Editar<br/>
                                        <input type="checkbox" name="permiso[]" value="3" disabled="" >Eliminar</td>
                                <?php    
                                    }
                                elseif ($dato[13] == 15)
                                    {
                                ?>
                                    <td><input type="checkbox" name="permiso[]" value="1" disabled="" >Registrar<br/>
                                        <input type="checkbox" name="permiso[]" value="2" disabled="" >Ver<br/>
                                        <input type="checkbox" name="permiso[]" value="3" disabled="" checked="">Editar<br/>
                                        <input type="checkbox" name="permiso[]" value="3" disabled="" checked="">Eliminar</td>
                                <?php    
                                    }
                                elseif ($dato[13] == 3)
                                    {
                                ?>
                                    <td><input type="checkbox" name="permiso[]" value="1" disabled="" >Registrar<br/>
                                        <input type="checkbox" name="permiso[]" value="2" disabled="" checked="">Ver<br/>
                                        <input type="checkbox" name="permiso[]" value="3" disabled="" >Editar<br/>
                                        <input type="checkbox" name="permiso[]" value="3" disabled="" >Eliminar</td>
                                <?php    
                                    }
                                elseif ($dato[13] == 13)
                                    {
                                ?>
                                    <td><input type="checkbox" name="permiso[]" value="1" disabled="" >Registrar<br/>
                                        <input type="checkbox" name="permiso[]" value="2" disabled="" checked="">Ver<br/>
                                        <input type="checkbox" name="permiso[]" value="3" disabled="" >Editar<br/>
                                        <input type="checkbox" name="permiso[]" value="3" disabled="" checked="">Eliminar</td>
                                <?php    
                                    }
                                elseif ($dato[13] == 8)
                                    {
                                ?>
                                    <td><input type="checkbox" name="permiso[]" value="1" disabled="" >Registrar<br/>
                                        <input type="checkbox" name="permiso[]" value="2" disabled="" checked="">Ver<br/>
                                        <input type="checkbox" name="permiso[]" value="3" disabled="" checked="">Editar<br/>
                                        <input type="checkbox" name="permiso[]" value="3" disabled="" >Eliminar</td>
                                <?php    
                                    }
                                elseif ($dato[13] == 18)
                                    {
                                ?>
                                    <td><input type="checkbox" name="permiso[]" value="1" disabled="" >Registrar<br/>
                                        <input type="checkbox" name="permiso[]" value="2" disabled="" checked="">Ver<br/>
                                        <input type="checkbox" name="permiso[]" value="3" disabled="" checked="">Editar<br/>
                                        <input type="checkbox" name="permiso[]" value="3" disabled="" checked="">Eliminar</td>
                                <?php    
                                    }
                                elseif ($dato[13] == 1)
                                    {
                                ?>
                                    <td><input type="checkbox" name="permiso[]" value="1" disabled="" checked="">Registrar<br/>
                                        <input type="checkbox" name="permiso[]" value="2" disabled="" >Ver<br/>
                                        <input type="checkbox" name="permiso[]" value="3" disabled="" >Editar<br/>
                                        <input type="checkbox" name="permiso[]" value="3" disabled="" >Eliminar</td>
                                <?php    
                                    }
                                elseif ($dato[13] == 11)
                                    {
                                ?>
                                    <td><input type="checkbox" name="permiso[]" value="1" disabled="" checked="">Registrar<br/>
                                        <input type="checkbox" name="permiso[]" value="2" disabled="" >Ver<br/>
                                        <input type="checkbox" name="permiso[]" value="3" disabled="" >Editar<br/>
                                        <input type="checkbox" name="permiso[]" value="3" disabled="" checked="">Eliminar</td>
                                <?php    
                                    }
                                    elseif ($dato[13] == 6)
                                    {
                                ?>
                                    <td><input type="checkbox" name="permiso[]" value="1" disabled="" checked="">Registrar<br/>
                                        <input type="checkbox" name="permiso[]" value="2" disabled="" >Ver<br/>
                                        <input type="checkbox" name="permiso[]" value="3" disabled="" checked="">Editar<br/>
                                        <input type="checkbox" name="permiso[]" value="3" disabled="" >Eliminar</td>
                                <?php    
                                    }
                                elseif ($dato[13] == 16)
                                    {
                                ?>
                                    <td><input type="checkbox" name="permiso[]" value="1" disabled="" checked="">Registrar<br/>
                                        <input type="checkbox" name="permiso[]" value="2" disabled="" >Ver<br/>
                                        <input type="checkbox" name="permiso[]" value="3" disabled="" checked="">Editar<br/>
                                        <input type="checkbox" name="permiso[]" value="3" disabled="" checked="">Eliminar</td>
                                <?php    
                                    }
                                elseif ($dato[13] == 4)
                                    {
                                ?>
                                    <td><input type="checkbox" name="permiso[]" value="1" disabled="" checked="">Registrar<br/>
                                        <input type="checkbox" name="permiso[]" value="2" disabled="" checked="">Ver<br/>
                                        <input type="checkbox" name="permiso[]" value="3" disabled="" >Editar<br/>
                                        <input type="checkbox" name="permiso[]" value="3" disabled="" >Eliminar</td>
                                <?php    
                                    }
                                elseif ($dato[13] == 14)
                                    {
                                ?>
                                    <td><input type="checkbox" name="permiso[]" value="1" disabled="" checked="">Registrar<br/>
                                        <input type="checkbox" name="permiso[]" value="2" disabled="" checked="">Ver<br/>
                                        <input type="checkbox" name="permiso[]" value="3" disabled="" >Editar<br/>
                                        <input type="checkbox" name="permiso[]" value="3" disabled="" checked="">Eliminar</td>
                                <?php    
                                    }
                                elseif ($dato[13] == 9)
                                    {
                                ?>
                                    <td><input type="checkbox" name="permiso[]" value="1" disabled="" checked="">Registrar<br/>
                                        <input type="checkbox" name="permiso[]" value="2" disabled="" checked="">Ver<br/>
                                        <input type="checkbox" name="permiso[]" value="3" disabled="" checked="">Editar<br/>
                                        <input type="checkbox" name="permiso[]" value="3" disabled="" >Eliminar</td>
                                <?php    
                                    }
                                elseif ($dato[13] == 19)
                                    {
                                ?>
                                    <td><input type="checkbox" name="permiso[]" value="1" disabled="" checked="">Registrar<br/>
                                        <input type="checkbox" name="permiso[]" value="2" disabled="" checked="">Ver<br/>
                                        <input type="checkbox" name="permiso[]" value="3" disabled="" checked="">Editar<br/>
                                        <input type="checkbox" name="permiso[]" value="3" disabled="" checked="">Eliminar</td>
                                <?php    
                                    }
                                ?>                         
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
                        </tbody>
                    </table>
                    </br> 
                <?php } ?>    
                </form>
                        <button class="btn" onclick="location.href='I_Usuarios_Buscar.php'">Regresar</button>  
                    <br/><br/> 
            </div>
            </center>
        </div>
	</section> 	
 <!--Concatenador con la parte Footer. -->
<?php
    require('ASSETS/PLANTILLAS/Plantilla-Footer.html');
    error_reporting(E_ERROR |  E_PARSE);
?>		


