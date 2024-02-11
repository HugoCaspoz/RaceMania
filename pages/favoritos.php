<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda de Carreras</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
        }
        form {
            margin-bottom: 20px;
        }
        #resultados {
            display: flex;
            flex-wrap: wrap;
        }
        .carrera {
            width: 24%;
            margin: 1%;
            border: 1px solid #ddd;
            padding: 10px;
            box-sizing: border-box;
            text-align: center;
            margin-bottom: 20px;
        }
        .pagination {
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
    include('header.php');
    ?>

    <h1>Carreras Favoritas</h1>

    <div id="resultados">
        <!-- Carreras se mostrarán aquí -->
        <!-- <div class="carrera">Carrera 1</div>
        <div class="carrera">Carrera 2</div>
        <div class="carrera">Carrera 3</div>
        <div class="carrera">Carrera 4</div>
        <div class="carrera">Carrera 5</div> -->
        <!-- Más carreras según la búsqueda -->
    </div>
    <script src="../assets/js/mostrarFavoritos.js"></script>
</body>
</html>