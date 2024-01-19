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
    include("header.php");
    ?>
    <main>
        <div id="inicio">
            <div id='divLogin'>
                
                <form action="../index.php" method="post" id='formulario'>
                    <h3 class="card-title">Iniciar Sesión</h3>
                    </br>
                    <label for="username" class="username">Usuario: </label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario" required/>
                    <div id='errorUser'></div>
                    </br>
                    <label for="pass" class="">Contraseña: </label>
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña" />
                    <div id='errorPass'></div>
                    </br>
                    <div id="botones">
                        <input type="submit" class="btn btn-success" value="Iniciar Sesión" id="iniciar-sesion" name="iniciar-sesion" required/>
                        <input type="reset" class="btn btn-danger" value="Cancelar" id="cancelar" name="cancelar" />
                    </div>
                </form>
                <button id='prueba'>Prueba</button>
            </div>
        </div>
    </main>
    <script src='../assets/js/login.js'></script>
</body>

</html>