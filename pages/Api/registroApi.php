<?php
require_once ('./conexion.php');

$con = new Conexion();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
        $json = file_get_contents('php://input');
        $usuario  = json_decode($json);

        $fullname = $usuario->fullname;
        $username = $usuario->user;
        $email = $usuario->email;
        $pass = password_hash($usuario->pass, PASSWORD_BCRYPT);
        $phone = $usuario->phone;
        $city = $usuario->city;
        $club = $usuario->club;
        $rol = $usuario->rol;

        $sql = "INSERT INTO `usuarios` (`fullname`, `user`, `email`, `pass`, `phone`, `city`, `club`, `rol`) VALUES ('$fullname', '$username', '$email', '$pass', '$phone', '$city', '$club', '$rol');";
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
?>