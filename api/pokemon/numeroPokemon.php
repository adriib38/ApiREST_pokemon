<?php
   
    if(isset($_GET['numero_pokedex'])){
        $statement = $conexion->prepare('SELECT * FROM `pokemon` WHERE numero_pokedex = '.$_GET['numero_pokedex'].';');
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        unset($conexion);

        $nRows = $statement->rowCount(); 
      
        if($nRows == 0){ 
            $json = json_encode(
                array(
                    0 => array(
                        'Nombre' => 'Adrián Benítez'
                    ),
                    1 => array(
                        'Datos' => 'Error. No existe el id del pokemon.'
                    ),
                )
            );
        }else{
            $json = json_encode(
                array(
                    0 => array(
                        'Nombre' => 'Adrián Benítez'
                    ),
                    1 => array(
                        'Datos' => $results
                    ),
                )
            );
    
        }
       
        header('Content-Type: application/json; charset=utf-8');
        echo $json;
        
    }

    
?>