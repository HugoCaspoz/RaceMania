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

    <h1>Búsqueda de Carreras</h1>
    <a href="/RaceMania/pages/subirCarrera.php">
        <button>Subir Carrera</button>
    </a>

    <input type="text" id="categoriaInput" placeholder="Ingrese la categoría">
    <input type="text" id="nombreInput" placeholder="Ingrese el nombre">
    <button id="filtrar" >Filtrar</button>

    <form action="#" method="get">
        <label for="barraBusqueda">Barra de Búsqueda:</label>
        <input type="text" id="barraBusqueda" name="barraBusqueda"> 

        <label for="genero">Género:</label>
        

        <label for="distancia">Distancia:</label>
        <select id="distancia" name="distancia">
            <option value="5">menos de 10 km</option>
            <option value="10">menos de 10 km</option>
            <option value="15">menos de 15 km</option>
            <option value="20">menos de 20 km</option>
            <option value="25">más de 25 km</option>
        </select>

        <label for="desnivel">Desnivel:</label>
        <input type="text" id="desnivel" name="desnivel">

        

        <input type="submit" value="Buscar">
    </form>

    <div id="resultados">
        <!-- Carreras se mostrarán aquí -->
        <!-- <div class="carrera">Carrera 1</div>
        <div class="carrera">Carrera 2</div>
        <div class="carrera">Carrera 3</div>
        <div class="carrera">Carrera 4</div>
        <div class="carrera">Carrera 5</div> -->
        <!-- Más carreras según la búsqueda -->
    </div>

    <div id="pages">
        <span id="prev">🢀</span>
        <span id="numPag"></span>
        <span id="next">🢂</span>
    </div>
    <script src="../assets/js/Carreras/carreras.js"></script>
</body>
</html>
