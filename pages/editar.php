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
        <div id="inicio">
            <div id='divRegistro'>
                <h3 class="card-title">Editar Perfil</h3>
                </br>
                <form  action="../index.php" method="post" id='formulario'>
                    <label for="fullname" class="form-label">Nombre y Apellidos: </label>
                    <input type="text" class="form-control" id="nuevofullname" name="fullname" placeholder="Nombre y Apellidos" />
                    </br>
                    <label for="user" class="form-label">Nombre de Usuario: </label>
                    <input type="text" class="form-control" id="nuevouser" name="user" placeholder="Nombre de usuario" />
                    </br>
                    <label for="email" class="form-label">Correo Electrónico: </label>
                    <input type="text" class="form-control" id="nuevoemail" name="email" placeholder="Correo electrónico" />
                    <div id='errorMail'></div>
                    </br>
                    <label for="pass" class="form-label">Contraseña: </label>
                    <input type="password" class="form-control" id="nuevapass" name="pass" placeholder="Contraseña" />
                    <div id='errorPass'></div>
                    </br>
                    <label for="pass2" class="form-label">Repite la Contraseña: </label>
                    <input type="password" class="form-control" id="pass2" name="pass2" placeholder="Repite la Contraseña" />
                    <div id='errorconfPass'></div>
                    </br>
                    <label for="phone" class="form-label">Teléfono: </label>
                    <input type="number" class="form-control" id="nuevophone" name="weight" placeholder="Teléfono" min="30" max="200" />
                    </br>
                    <label for="city" class="form-label">Ciudad: </label>
                    <input type="text" class="form-control" id="nuevocity" name="city" placeholder="Ciudad" />
                    </br>
                    <label for="club" class="form-label">Club: </label>
                    <input type="text" class="form-control" id="nuevoclub" name="club" placeholder="Ciudad" />
                    </br>
                    <label for="rol" class="form-label">Rol del Usuario: </label></br>
                    <label for="rol" class="form-label" id=nuevorol>
                        <input type="radio" name="opciones" id="usuario">
                        Usuario
                        <input type="radio" name="opciones" id="organizador">
                        Organizador
                    </label> </br></br>
                    <input type="submit" class="btn btn-success" value="Guardar" id="guardar" name="guardar" />
                    <input type="reset" class="btn btn-danger" value="Cancelar" id="cancelar" name="cancelar" />
                    </br></br>
                </form>
                <button id='pruebaEditar'>PruebaEditar</button>
                <button id='pruebaEliminar'>PruebaEliminar</button>


            </div>
        </div>
    </center>
    <script src='../assets/js/editarUser.js'></script>
</body>

</html>