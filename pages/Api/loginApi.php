<?php
require ("../../vendor/autoload.php");
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
require_once('./conexion.php');

$con = new Conexion();
$json =  json_decode(file_get_contents("php://input"), true);

function generarJWT($id, $user, $pass, $rol){
    $key = 'Racemania';

    $payload = [
        'id' => $id,
        'user' => $user,
        'pass' => $pass,
        'rol' => $rol,
        'exp' => time()+3600,
    ];
    $jwt = JWT::encode($payload, $key, 'HS256');
    return $jwt;
    //$decoded = JWT::decode($jwt, new Key($key, 'HS256'));
    
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $sql = "SELECT * FROM usuarios WHERE ";

    $user = $json['user'];
    $pass = $json['pass'];
    
    $sql .= "user='$user'";
    try {
        $resultado = $con->query($sql);
        if ($resultado->num_rows>0){
        $usuario = $resultado->fetch_assoc();    

        $stored_password = $usuario['pass'];
        $rol = $usuario['rol'];

        $verifyContra=password_verify($pass,$stored_password);

        if ($verifyContra==true){            
            $jwt = generarJWT($usuario["id"], $user,$pass, $rol);
            echo json_encode(['message'=>' Login correcto', 'token'=>$jwt, 'user'=>$user, 'rol'=>$rol]);
            header("HTTP/1.1 200 OK");
            header("application/json");
        }else{
            header('HTTP/1.1 401 Contraseña erronea');
        }
        

        }else{
            header('HTTP/1.1 401 Credenciales no válidas');
        }
    } catch (mysqli_sql_exception $e) {
        header('HTTP/1.1 401 Not Found');
    }
    exit;
    

}