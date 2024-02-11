<?php
require_once('./conexion.php');
$json =  json_decode(file_get_contents("php://input"), true);
$con = new Conexion();
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {


        $id = $_GET['id'];
        $sql = "SELECT * FROM carreras WHERE id='$id'";
        try {
            $resultado = $con->query($sql);
            if ($resultado->num_rows==1){
            header ('HTTP/1.1 200 OKey');
            $carrera = $resultado->fetch_assoc();
            $carreraJSON=json_encode($carrera);
            echo $carreraJSON;
        }else{
                header('HTTP/1.1 400 Usuario no encontrado');
            }
        } catch (mysqli_sql_exception $e) {
            header('HTTP/1.1 400 Not Found');
        }
        exit;
}