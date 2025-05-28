<?php
    define("SERVIDOR","localhost");
    define("USUARIO","root"); 
    define("PASSWORD","");
    define("BASE_DATOS", "topicos"); 
    define("CARACTER","utf8"); 
    define("PUERTO","3306"); 
    try{
        $conexion = new PDO("mysql:host=".SERVIDOR.";dbname=".BASE_DATOS.";port=".PUERTO.";",USUARIO,PASSWORD); //Que es pdo cuando hablamos de php y sql
    }catch(PDOException $error){ // PDO TRABAJA CON SQL 
        echo"Error al intentar conectarse al la base de datos: $error"; 

    }


?>