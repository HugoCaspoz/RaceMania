<?php
require_once('./conexion.php');
$json =  json_decode(file_get_contents("php://input"), true);
$con = new Conexion();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {


    $user = $_GET['user'];
    $sql = "SELECT * FROM usuarios WHERE user='$user'";
    try {
        $resultado = $con->query($sql);
        if ($resultado->num_rows>0){
        $alumno = $resultado->fetch_assoc();
        $alumnoJSON=json_encode($alumno);
        header ('HTTP/1.1 200 OKey');
        echo $alumnoJSON;
        }else{
        header('HTTP/1.1 401 Usuario no encontrado');
        }
    } catch (mysqli_sql_exception $e) {
        header(`HTTP/1.1 401 $e`);
    }
    exit;
}