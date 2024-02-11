<?php
require_once('./conexion.php');
$json =  json_decode(file_get_contents("php://input"), true);
$con = new Conexion();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $sql = "SELECT * FROM carreras";
    try {
        $resultado = $con->query($sql);
        if ($resultado->num_rows>0){
            $carreras=array();
        while ($fila = $resultado->fetch_assoc()) {
            $carreras[] = $fila;
        }
        $carrerasJSON=json_encode($carreras);
        header ('HTTP/1.1 200 OKey');
        echo $carrerasJSON;
        }else{
        header('HTTP/1.1 400 Carreras no encontradas');
        }
    } catch (mysqli_sql_exception $e) {
        header(`HTTP/1.1 400 $e`);
    }
    exit;
}