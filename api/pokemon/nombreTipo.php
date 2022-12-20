<?php
   
    if(isset($_GET['tipo'])){

        $statement = $conexion->prepare('
        SELECT t.nombre as "tipo", p.nombre as "nombre" FROM pokemon p, pokemon_tipo pt, tipo t WHERE p.numero_pokedex = pt.numero_pokedex AND pt.id_tipo = t.id_tipo AND t.nombre = "'.$_GET['tipo'].'";
        ');
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
                        'Datos' => 'Error. No existe el  tipo.'
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