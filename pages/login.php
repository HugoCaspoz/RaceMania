<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/login.css" rel="stylesheet">

</head>
<body>
    <?php
        include ("header.php");
    ?>
    <div class="logo me-auto">
      <a href="../index.php"><img src="../assets/img/greenlife.png" alt="" class="img-fluid"></a>
    </div>
    <center>
    </br></br></br></br></br>
    <h3 class="card-title">Iniciar Sesión</h3> 
    </br>                  
    <form action="../index.php" method="post" id='formulario'>                  
        <label for="user" class="user">Usuario: </label>
        <input type="text" class="form-control" id="user" name="user" placeholder="Nombre de usuario"/>
        </br>
        <label for="pass" class="">Contraseña: </label>
        <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña"/>
        </br>        
        <input type="submit" class="btn btn-success" value="Iniciar Sesión" id="iniciar-sesion" name="iniciar-sesion" />
        <input type="reset" class="btn btn-danger"  value="Cancelar" id="cancelar" name="cancelar" />
    </form>
    </center>
    <script src="assets/js/index.js"></script>
</body>
</html>