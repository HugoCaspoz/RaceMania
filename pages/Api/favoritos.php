<?php
    require_once ('./conexion.php');

    $con = new Conexion();
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
            $favorito = file_get_contents('php://input');
            $JSONfav  = json_decode($favorito);
            var_dump($JSONfav) ;
            $idCarrera = $JSONfav->idCarrera;
            $nombreUser = $JSONfav->nombreUser;
            $sql = "INSERT INTO `favoritos` (`idCarrera`, `nombreUser`) VALUES ('$idCarrera', '$nombreUser')";        
            try {
            $con->query($sql);
            // $result = $con->query($sql);
            echo json_encode($con->insert_id);
            header("HTTP/1.1 201 Created"); 
        } catch (mysqli_sql_exception $e) {
            header("HTTP/1.1 400 Bad Request");
        }
        exit;
    }else{
        header("HTTP/1.1 400 Bad mal");
    }
    if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        $sql = "DELETE FROM favoritos ";
        $idCarrera = $_GET['idCarrera'];
        $nombreUser = $_GET['nombreUser'];
        $sql .="WHERE idCarrera = '$idCarrera' AND nombreUser = '$nombreUser'";  
        try {
            $con->query($sql);
            header('HTTP/1.1 201 Delete');
        } catch (mysqli_sql_exception $e) {
            header('HTTP/1.1 400 Bad Request');
        }
    }else{
        header("HTTP/1.1 400 Bad mal");
    }
