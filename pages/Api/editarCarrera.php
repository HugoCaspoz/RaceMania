<?php
require_once('./conexion.php');
$con = new Conexion();
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {


        $id = $_GET['id'];
        $sql = "SELECT * FROM carreras WHERE id='$id'";
        try {
            $resultado = $con->query($sql);
            if ($resultado->num_rows>0){
            $carrera = $resultado->fetch_assoc();
            $carreraJSON=json_encode($carrera);
            echo $carreraJSON;
            }else{
                header('HTTP/1.1 401 Usuario no encontrado');
            }
        } catch (mysqli_sql_exception $e) {
            header('HTTP/1.1 401 Not Found');
        }
        exit;
}
if($_SERVER["REQUEST_METHOD"]==="PUT"){
    $json =  json_decode(file_get_contents("php://input"), true);

    $id = $_GET['id'];

    $nombre = $json['nombre'];
    $distancia = $json['distancia'];
    $genero = $json['genero'];
    $categoria = $json['categoria'];
    $comunidad = $json['comunidad'];
    $desNeg = $json['desNeg'];
    $desPos = $json['desPos'];
    $desTotal = $json['desTotal'];
    $coors = $json['coors'];
    $updateSql = "UPDATE `carreras` SET ";

    if (!empty($nombre)) {
        $updateSql .= "nombre = '$nombre', ";
    }
    
    if (!empty($distancia)) {
        $updateSql .= "distancia = '$distancia', ";
    }
    
    if (!empty($genero)) {
        $updateSql .= "genero = '$genero', ";
    }
    if (!empty($comunidad)) {
        $updateSql .= "comunidad = '$comunidad', ";
    }
    
    if (!empty($desNeg)) {
        $updateSql .= "desNeg = '$desNeg', ";
    }
    
    if (!empty($desPos)) {
        $updateSql .= "desPos = '$desPos', ";
    }
    
    if (!empty($desTotal)) {
        $updateSql .= "desTotal = '$desTotal', ";
    }
    
    if (!empty($coors)) {
        $updateSql .= "coors = '$coors', ";
    }

    $updateSql = rtrim($updateSql, ', ');
    $updateSql .= " WHERE id='$id'";
    echo $updateSql;
    try{
        $resultado=$con->query($updateSql);
        if ($resultado) {
            header("HTTP/1.1 200 Update carrera succesfully");
        } else {
            header('HTTP/1.1 400 Update Error: ' .$con->error);
            echo $updateSql;
        }
    }catch (mysqli_sql_exception $e){
        header('HTTP/1.1 400 Update Error');
    }

}