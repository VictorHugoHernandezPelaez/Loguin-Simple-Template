<?php  
session_start();  	
include('L_Funciones.php');
error_reporting(E_ERROR |  E_PARSE);
//  ----Validacion y Sanitizacion ---------------------------------------------------
if(isset($_POST['user'])&&!empty($_POST['user']))
{
	$user= filter_var(trim($_POST['user']), FILTER_SANITIZE_STRING);
}
else
{
	echo "El nombre de usuario enviado es invalido!"."<br>";
}
if(isset($_POST['pass'])&&!empty($_POST['pass'])){
	$pass= filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
}
else
{
	echo "La contraseña es invalida!"."<br>";
}
// Aquie se toma la contrasena sin encriptar, se llama a la funcion encriptar para que sea encriptada y comparada con la contrasena almacenada en la BD, donde aqui las contrasenas estan guardadas ya encriptadas.
	$pass2 = Funcion_Contrasena_encriptar($pass);
//------------------------------------------------------------------------------------
//*Utiliza la función 'Conectar_Base_Datos', para realizar la coneción con la Base de Datos.*/
    $conexion = Funcion_Conectar_Base_Datos();
    /*global $conexion;   //utiliza la conexion*/
try
{
    $sql = "select * from usuario where (user_usuario =:user) AND (pass_usuario =:pass)";  //
    $query = $conexion->prepare($sql);        
    $query->bindparam(':user', $user,PDO::PARAM_STR);
    $query->bindparam(':pass', $pass2,PDO::PARAM_STR);
    $query->execute();
    if ($query->rowCount() <= 0)
    {
    	echo 'Datos invalidos, restringido el ingreso!';
    }
    else
    {    
    	$datos = $query->fetch(PDO::FETCH_ASSOC);              
		//session_start(); //arranca la sesion 
		//$_SESSION['user_usuario'] = $datos['user_usuario'];
		//$_SESSION['nombre_rol'] = $datos['id_pk_rol'];

	// Se verifica que el "Usuario", se encuentre activo "estado_usuario = 1", para permitir su ingreso al sistema, de los contrario "estado_usuario = 0", significa que el "Usuario", a sido desactivado y debe comunicarse con el "Administrador".	
		if ($datos['estado_usuario'] == 1){
				// Se utiliza SESSION para enviar los valores otorgados en "permiso_usuario" para identificar que posibilidades tiene cada usuario.
				$value = $datos['id_pk_rol_fk'];
				// Inicio de la seesión para enviar el dato correspondiente a los permisos de los usuarios.
				//session_start();
				$_SESSION["variable"]=$value;

				header("Location: http://127.0.0.1:8000/I_Bienvenida.php");		
		}
		elseif ($datos['estado_usuario'] == 0){
			header("Location: http://127.0.0.1:8000/I_Usuarios_Inactivo.php");
		}
				
	}       
} 
catch (PDOException $e)
{
	echo "¡Error en la base de datos: " . $e->getMessage() . "<br/>";
}
?>