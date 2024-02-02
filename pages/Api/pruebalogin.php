<?php
require_once('./conexion.php');
$con = new Conexion();
$json =  json_decode(file_get_contents("php://input"), true);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $sql = "SELECT * FROM usuarios WHERE 1 ";

        $user = $json['user'];
        $pass = $json['pass'];

        $sql .= "AND user='$user' LIMIT 1";
        try {
            $resultado = $con->query($sql);
            if ($resultado->num_rows>0){
            $usuario = $resultado->fetch_assoc();    
            var_dump($usuario);
            $stored_password = $usuario[0]['pass'];
            echo $stored_password;

            $verifyContra=password_verify($pass,$stored_password);
            if ($verifyContra==true){
                echo "contraseña correcta";
            }else{
                echo "contraseña erronea";
            }
            header("HTTP/1.1 200 OK");
            header("application/json");
            }else{
                header('HTTP/1.1 401 Credenciales no válidas');
            }
        } catch (mysqli_sql_exception $e) {
            header('HTTP/1.1 401 Not Found');
        }
        exit;
        

}