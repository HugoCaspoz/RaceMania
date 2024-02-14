<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/registro.css" rel="stylesheet">
</head>

<body>
    <?php
    include("header.php");
    ?>
    <center>
        <div id="inicio">
            <div id='divRegistro'>
                <h3 class="card-title">Registrarse</h3>
                </br>
                <form action="../index.php" method="post" id='formulario'>
                    <label for="fullname" class="form-label">Nombre y Apellidos: </label>
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nombre y Apellidos" />
                    </br>
                    <label for="user" class="form-label">Nombre de Usuario: </label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario" />
                    </br>
                    <label for="email" class="form-label">Correo Electrónico: </label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Correo electrónico" />
                    <div id='errorMail'></div>
                    </br>
                    <label for="pass" class="form-label">Contraseña: </label>
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña" />
                    <button id='verContra'>Ver Contraseña</button>
                    <div id='errorPass'></div>
                    </br>
                    <label for="pass2" class="form-label">Repite la Contraseña: </label>
                    <input type="password" class="form-control" id="pass2" name="pass2" placeholder="Repite la Contraseña" />
                    <div id='errorconfPass'></div>
                    </br>
                    <label for="city" class="form-label">Ciudad: </label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="Ciudad" />
                    </br>

                    <label for="rol" class="form-label">Rol del Usuario: </label></br>
                    <label for="rol" class="form-label" id=rol>
                        <input type="radio" name="opciones" id="usuario" onchange="toggleCamposUsuario()">
                        Usuario
                        <input type="radio" name="opciones" id="organizador" onchange="toggleCamposOrganizador()">
                        Organizador
                    </label> </br></br>

                    <!-- Campos de teléfono y club -->
                    <div id="camposTelefonoClub" style="display: none;">
                        <label for="phone" class="form-label">Teléfono: </label>
                        <input type="number" class="form-control" id="phone" name="weight" placeholder="Teléfono" />
                        <div id='errorTel'></div>
                        </br>
                        <label for="club" class="form-label">Club: </label>
                        <input type="text" class="form-control" id="club" name="club" placeholder="Ciudad" />
                        </br>
                    </div>

                    <input type="reset" class="btn btn-danger" value="Cancelar" id="cancelar" name="cancelar" />
                    </br></br>
                </form>
                <button class="btn btn-success" id='prueba'>Registro</button>

            </div>
        </div>
    </center>
    <script src='../assets/js/registro.js'></script>
    <script>
        function toggleCamposUsuario() {
            var camposTelefonoClub = document.getElementById('camposTelefonoClub');
            camposTelefonoClub.style.display = 'none';
        }

        function toggleCamposOrganizador() {
            var camposTelefonoClub = document.getElementById('camposTelefonoClub');
            camposTelefonoClub.style.display = 'block';

            // let phone = document.getElementById('phone')
            // phone.onblur = function() {
            //     let errorTel = document.getElementById('errorTel');
            //     if (!(/^\+(?:[0-9] ?){6,14}[0-9]$/.test(phone.value.trim()))) {
            //         errorTel.innerHTML = '<p style="color: red; background-color: white; border-radius: 5px;">El teléfono introducido no es válido</p>';
            //         validar = false
            //     } else {
            //         errorTel.innerHTML = '';
            //         validar = true
            //     }
            // }
        }
    </script>
    <script src="../assets/js/session.js"></script>

</body>

</html>