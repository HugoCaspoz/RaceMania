<?php
require_once('./conexion.php');
$json =  json_decode(file_get_contents("php://input"), true);
$con = new Conexion();
    if ($_SERVER['REQUEST_METHOD'] == 'PUT') {


        $id = $_GET['id'];
        $sql = "SELECT * FROM carreras WHERE id='$id'";
        try {
            $resultado = $con->query($sql);
            if ($resultado->num_rows>0){
            $carrera = $resultado->fetch_assoc();
            $carreraJSON=json_encode($carrera);
            echo $carreraJSON;
            $editUser = $alumno['user'];
                
            $nuevofullname = $json['nuevofullname'];
            $nuevouser = $json['nuevouser'];
            $nuevoemail = $json['nuevoemail'];
            $nuevapass = password_hash($json['nuevapass'], PASSWORD_BCRYPT);
            $nuevophone = $json['nuevophone'];
            $nuevocity = $json['nuevocity'];
            $nuevoclub = $json['nuevoclub'];
            $nuevorol = $json['nuevorol'];

            $updateSql = "UPDATE usuarios SET fullname = '$nuevofullname' , user = '$nuevouser'  ,  email= '$nuevoemail'  ,  pass= '$nuevapass'  , phone = '$nuevophone'  ,  city = '$nuevocity'  ,  club= '$nuevoclub' , rol='$nuevorol' WHERE user = '$editUser'";
                if ($con->query($updateSql) === TRUE) {
                    header("HTTP/1.1 200 Update user succesfully");
                } else {
                    header('HTTP/1.1 400 Update Error');
                }
            }else{
                header('HTTP/1.1 401 Usuario no encontrado');
            }
        } catch (mysqli_sql_exception $e) {
            header('HTTP/1.1 401 Not Found');
        }
        exit;
}