<?php
require_once('./conexion.php');
$con = new Conexion();

$json =  json_decode(file_get_contents("php://input"), true);
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        $sql = "DELETE FROM usuarios ";
        $user = $_GET['user'];
        $sql .="WHERE user = '$user'";  
        try {
            $con->query($sql);
            header('HTTP/1.1 201 Delete');
        } catch (mysqli_sql_exception $e) {
            header('HTTP/1.1 400 Bad Request');
        }
}
//coger todos los datos del json y hacer por cada input un document.getelementbyid 
// y hacer un variable.value=json[variable]