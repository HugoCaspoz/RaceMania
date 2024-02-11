<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/registro.css" rel="stylesheet">
</head>

<body>
    <?php
    include("header.php");
    ?>
    <center>
        <div id="usuario">
        <!-- <a href="./editar.php">
            <button>Editar Perfil</button>
        </a>
        <a href="./eliminar.php">
            <button id='eliminar'>Eliminar Perfil</button>
        </a>
        <a href="./favoritos.php" >
            <button>Carreras Favoritas</button>
        </a> -->

        </div>
    </center>
<script>
    let usuario = document.getElementById('usuario')
    usuario.innerHTML=`
    <a href="./editar.php">
            <button>Editar Perfil</button>
        </a>
        <a href="./eliminar.php">
            <button id='eliminar'>Eliminar Perfil</button>
        </a>
        <a href="./favoritos.php?user=${localStorage.getItem('user')}">
            <button>Carreras Favoritas</button>
        </a>
    `
</script>
</body>

</html>