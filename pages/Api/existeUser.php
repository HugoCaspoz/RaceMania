<?php

require_once('./conexion.php');
$con = new Conexion();
$json =  json_decode(file_get_contents("php://input"), true);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $sql = "SELECT * FROM usuarios WHERE";

        $user = $json['username'];
        $email = $json['email'];
        $phone = $json['phone'];
        //$sql = "SELECT * FROM actores WHERE nombre LIKE '%$busqueda%' OR apellidos LIKE '%$busqueda%'";

        $sql .= "(user = '$user') OR (email = '$email') OR (phone = '$phone')";
        try {
            $resultado = $con->query($sql);
            if ($resultado->num_rows==0){
            header("HTTP/1.1 200 OK");
            }else{
                header('HTTP/1.1 400 Usuario ya existente');
            }
        } catch (mysqli_sql_exception $e) {
            header('HTTP/1.1 401 Credenciales erroneas');
        }
        exit;
        

}
