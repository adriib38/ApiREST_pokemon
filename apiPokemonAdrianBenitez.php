<?php
     //Información base de datos
     $dsn = 'mysql:host=localhost;port=3306;dbname=pokemon';
     $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
 
     //Se hace conexión a la bd
    try {  
        $conexion = new PDO($dsn, 'Ash', 'pikachu', $opciones);
    } catch(PDOException $e) {
        echo 'Error durante la conexión.';
    }
   
    if($_GET['accion'] = 'tipo'){
        include('nombreTipo.php');
    }

    if($_GET['accion'] = 'numeroPokemon'){
        include('numeroPokemon.php');
    }

?>