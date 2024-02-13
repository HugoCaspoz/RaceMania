<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/index.css" rel="stylesheet">
</head>

<body>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <?php
    include("pages/indexHeader.php");
    ?>
    <div id="sections">
        <section>
            <div class="seccion-one">
                    <h2>Busca una carrera </h2>
                    
                    <button id="btn-Buscar" type="button" onclick="window.location.href='./pages/carreras.php'">Buscar</button>
            </div>
        </section>

        <section>
            <div class="block">
                <p class="pBlock">
                    <span class="titulo-parrafo">¡Bienvenido a nuestra comunidad de <i>RaceMania</i>!</span>
                    Entra en el mundo de la pasión por correr y descubre un universo de emocionantes carreras. <br><br>
                    En nuestra plataforma, encontrarás el combustible perfecto para tu espíritu competitivo: <br>
                    desde maratones urbanos hasta desafiantes carreras de montaña, ¡todo a tu alcance! <br>
                    <br>
                    ¡Únete a nosotros y encuentra tu próxima aventura! Correr no solo es un deporte,<br>
                    es un estilo de vida, y aquí, estamos listos para guiarte en cada paso de tu viaje.
                    <br>
                    Bienvenido a un lugar donde cada zancada <br> cuenta y donde la búsqueda de nuevas metas es parte de
                    nuestra esencia. <br>¡Prepárate para explorar un mundo de carreras que te llevará más allá de tus
                    límites!
                </p>
            </div>
        </section>

        

        

    </div>
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h6>ABOUT US</h6>
                    <p class="text-justify">Racemania es una página web creada por Hugo Casado un estudiantes de DAW en el IES San Andrés, la página está creada con HTML, JS y PHP, junto con la implementación de Bootstrap.</p>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <p class="copyright-text">Copyright &copy; 2023 All Rights Reserved by Hugo Casado
                    </p>
                </div>
            </div>
        </div>
    </footer>
</body>
<script src="./assets/js/session.js"></script>

</html>