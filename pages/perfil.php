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
        usuario.innerHTML = `
    <a href="./editar.php">
            <button>Editar Perfil</button>
        </a>
            <button id='eliminar'>Eliminar Perfil</button>
        <a href="./favoritos.php?user=${localStorage.getItem('user')}">
            <button>Carreras Favoritas</button>
        </a>
    `
        let btneliminar = document.getElementById('eliminar')

        btneliminar.addEventListener('click', eliminar)
        if (!(localStorage.getItem('user'))) {
            localStorage.removeItem('token');
            localStorage.removeItem('user');
            localStorage.removeItem('rol');
            alert('Necesita iniciar sesion');
            location.href = "../pages/login.php";
        }
        function eliminar(e) {
                console.log('hola');
                e.preventDefault();

                let url = `http://localhost/RaceMania/pages/Api/eliminarUsuario.php?user=${localStorage.getItem('user')}`;
                const options = {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                };
                fetch(url, options)
                    .then(res => {
                        if (res.status == 201) {
                            localStorage.removeItem('token');
                            localStorage.removeItem('user');
                            localStorage.removeItem('rol');
                            localStorage.clear();
                            alert('Usuario eliminado')
                            location.href = "../index.php";
                        }
                        if (res.status == 401) {
                            alert('Credenciales no válidas');
                        }
                    })

            }
    </script>
        <script src="../assets/js/session.js"></script>

</body>

</html>