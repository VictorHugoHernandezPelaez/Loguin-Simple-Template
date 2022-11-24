<?php  
/*-------------------------------------------------------------------------------*/
/*Funcion que valida la informacion ingresada por el usuario.*/
function filtrado($datos){
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes '\''
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}
/*-------------------------------------------------------------------------------*/
/*Función que realiza la conexión con la Base de Datos.*/
/*Sea Localhost PC o Localhost 000WEBhosting.*/
function Funcion_Conectar_Base_Datos()
{
    /*Conexión con Base de Datos local*/
        define('BD_USER','db_usuario');/*Nombre del usuario*/
        define('BD_CLAVE', 'db_clave');/*clave del usuario*/
    /*Conexión con Base de Datos WEB*/
        //define('BD_USER','POt0YvKiWV');
        //define('BD_CLAVE','uGWIDtSUqV');

    /*Conexion a la BD*/

    try 
    {
        /*Conexión con Bases de Datos Local*/
            return $conexion = new PDO('mysql:host=localhost:3306; port=3306; dbname=Base_Datos_Proyecto', BD_USER, BD_CLAVE);
        /*Conexión Bases de Datos WEB*/
            //return $conexion = new PDO('mysql:host=remotemysql.com;port=3306;dbname=POt0YvKiWV', BD_USER, BD_CLAVE);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    } 
    catch (PDOException $e)
    {
        echo "¡Error en la conexion: " . $e->getMessage() . "<br/>";
        
    }
}
/*Función que realiza consulta en la Base de Datos 'PYCLOUDME' la tabla 'PERSONAS'. (Enlista solo una persona)*/
function Funcion_Buscar_Usuario($id_usuario)
{
    /*Utiliza la función 'Conectar_Base_Datos', para realizar la coneción con la Base de Datos.*/
    //$id = $id;
    $conexion = Funcion_Conectar_Base_Datos();
    /*global $conexion;   //utiliza la conexion*/
    try 
    {       
        $sql = ("SELECT * FROM usuario WHERE id_pk_usuario =".$id_usuario);   
        $query = $conexion->prepare($sql);    
        $query->execute();
        return $query->fetchAll();      
    } 
    catch (PDOException $e) 
    {
     echo "¡Error en la consulta: " . $e->getMessage() . "<br/>";
 }
}
/*Función que realiza una eliminación en la Base de Datos 'PYCLOUDME' la tabla 'PERSONA'. (ELIMINA A UNA SOLA PERSONA)*/
function Funcion_Eliminar_Usuario($id_pk_usuario)
{

    /*Utiliza la función 'Conectar_Base_Datos', para realizar la coneción con la Base de Datos.*/
    $conexion = Funcion_Conectar_Base_Datos();
    /*global $conexion;   //utiliza la conexion*/
    try 
    {       
        //$sql = ("DELETE FROM persona WHERE id_pk_persona =:id_pk_persona");
        $sql = ("DELETE FROM usuario WHERE id_pk_usuario = :id_pk_usuario");   
        $query = $conexion->prepare($sql); 
        $query->bindparam(':id_pk_usuario', $id_pk_usuario);  
        $query->execute();
        //header('Location: ../I_Registro_Exitoso.php');     
    } 
    catch (PDOException $e) 
    {
     echo "¡Error en el Borrado: " . $e->getMessage() . "<br/>";
 }
}
/*-------------------------------------------------------*/
/*Función que realiza consulta la encriptacion de la contrasena cuando se registra un nuevo usuario)*/
function Funcion_Contrasena_encriptar($contrasena)
{
    $pass = $contrasena;
            $cad1 = $pass;
                $vector_palabra = str_split($cad1);
                    for ($i=0; $i < count($vector_palabra); $i++) {
                        switch(strtolower($vector_palabra[$i])) {
                            case "m": $vector_palabra[$i] = "6"; break;
                            case "u": $vector_palabra[$i] = "7"; break;
                            case "r": $vector_palabra[$i] = "8"; break;
                            case "c": $vector_palabra[$i] = "9"; break;
                            case "i": $vector_palabra[$i] = "0"; break;
                            case "e": $vector_palabra[$i] = "1"; break;
                            case "l": $vector_palabra[$i] = "2"; break;
                            case "a": $vector_palabra[$i] = "3"; break;
                            case "g": $vector_palabra[$i] = "4"; break;
                            case "o": $vector_palabra[$i] = "5"; break;
                            case " ": $vector_palabra[$i] = "*"; break;
                        }
                    }
                $word_crypted = implode($vector_palabra);
                
        //Segunda encriptación.
                //Configuración del algoritmo de encriptación
                //Debes cambiar esta cadena, debe ser larga y unica
                //nadie mas debe conocerla
                $clave  = 'Una cadena, muy, muy larga para mejorar la encriptacion';
                //Metodo de encriptación
                $method = 'aes-256-cbc';
                // Puedes generar una diferente usando la funcion $getIV()
                $iv = base64_decode("C9fBxl1EWtYTL1/M8jfstw==");
                 /*
                 Encripta el contenido de la variable, enviada como parametro.
                  */
                 $encriptar = function ($valor) use ($method, $clave, $iv) {
                     return openssl_encrypt ($valor, $method, $clave, false, $iv);
                 };
                $word_crypted = $encriptar($word_crypted);
    return $word_crypted;
}
/*-------------------------------------------------------*/

/*Función que realiza consulta la encriptacion de la contrasena cuando se registra un nuevo usuario)*/
function Funcion_Contrasena_desencriptar($contrasena)
{
     //Segunda desencriptación.
            //Configuración del algoritmo de encriptación
            //Debes cambiar esta cadena, debe ser larga y unica
            //nadie mas debe conocerla
            $clave  = 'Una cadena, muy, muy larga para mejorar la encriptacion';
            //Metodo de encriptación
            $method = 'aes-256-cbc';
            // Puedes generar una diferente usando la funcion $getIV()
            $iv = base64_decode("C9fBxl1EWtYTL1/M8jfstw==");
             /*
             Desencripta el texto recibido
             */
             $desencriptar = function ($valor) use ($method, $clave, $iv) {
                 $encrypted_data = base64_decode($valor);
                 return openssl_decrypt($valor, $method, $clave, false, $iv);
             };

            $contrasena = $desencriptar($contrasena);

            //Desencriptacion "MURCIELAGO".
            $pass = $contrasena;
                $cad1 = $pass;
                    $vector_palabra = str_split($cad1);
                        for ($i=0; $i < count($vector_palabra); $i++) {
                            switch(strtolower($vector_palabra[$i])) {
                                case "6": $vector_palabra[$i] = "m"; break;
                                case "7": $vector_palabra[$i] = "u"; break;
                                case "8": $vector_palabra[$i] = "r"; break;
                                case "9": $vector_palabra[$i] = "c"; break;
                                case "0": $vector_palabra[$i] = "i"; break;
                                case "1": $vector_palabra[$i] = "e"; break;
                                case "2": $vector_palabra[$i] = "l"; break;
                                case "3": $vector_palabra[$i] = "a"; break;
                                case "4": $vector_palabra[$i] = "g"; break;
                                case "5": $vector_palabra[$i] = "o"; break;
                                case "*": $vector_palabra[$i] = " "; break;
                            }
                        }
                    $word_crypted = implode($vector_palabra);
    return $word_crypted;
}
/*-------------------------------------------------------*/


/*-------------------------------------------------------*/
?>