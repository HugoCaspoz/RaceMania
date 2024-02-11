<?php
require_once('./conexion.php');
$json =  json_decode(file_get_contents("php://input"), true);
$con = new Conexion();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $user = $_GET["user"];
    $sql = "SELECT * FROM favoritos WHERE nombreUser='$user' ";
    try {
        $resultado = $con->query($sql);
        if ($resultado->num_rows>0){
            $carrerasFavoritas = array();
            $favoritos=array();
        while ($fila = $resultado->fetch_assoc()) {
            $favoritos[] = $fila;
            $idCarrera = $fila['idCarrera'];
            $sqlCarrera = "SELECT * FROM carreras WHERE id='$idCarrera'";
                $resultadoCarrera = $con->query($sqlCarrera);
            if ($resultadoCarrera !== false && $resultadoCarrera->num_rows > 0) {
                $carrera = $resultadoCarrera->fetch_assoc();
                $carrerasFavoritas[] = $carrera;
            }
            
        }
        $carrerasFavoritasJSON = json_encode($carrerasFavoritas);
            header('HTTP/1.1 200 OK');
            echo $carrerasFavoritasJSON;
        }else{
        header('HTTP/1.1 404 Not Found');
        echo "este user no tiene carreras favoritas";
        }
    } catch (mysqli_sql_exception $e) {
        header(`HTTP/1.1 500 $e`);
    }
    exit;
}