<?php
    require_once ('./conexion.php');

    $con = new Conexion();
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
            $carrera = file_get_contents('php://input');
            $varcarrera  = json_decode($carrera);
    
            $nombre = $varcarrera->nombre;
            $distancia = $varcarrera->distancia;
            $genero = $varcarrera->genero;
            $categoria = $varcarrera->categoria;
            $comunidad = $varcarrera->comunidad;
            $desNeg = $varcarrera->desNeg;
            $desPos = $varcarrera->desPos;
            $desTotal = $varcarrera->desTotal;
            $coors = $varcarrera->coors;
            $sql = "INSERT INTO `carreras` (`nombre`, `distancia`, `genero`, `categoria`, `comunidad`, `desNeg`, `desPos`, `desTotal`, `coors`) VALUES ('$nombre', '$distancia', '$genero', '$categoria', '$comunidad', '$desNeg', '$desPos', '$desTotal', '$coors');";
        try {
            $con->query($sql);
            // $result = $con->query($sql);
            echo json_encode($con->insert_id);
            header("HTTP/1.1 201 Created"); 
        } catch (mysqli_sql_exception $e) {
            header("HTTP/1.1 400 Bad Request");
        }
        exit;
    }
    header("HTTP/1.1 400 Bad mal");