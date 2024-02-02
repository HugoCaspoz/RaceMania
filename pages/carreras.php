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

    <form action="#" method="get">
        <label for="barraBusqueda">Barra de Búsqueda:</label>
        <input type="text" id="barraBusqueda" name="barraBusqueda"> </br>

        <label for="comunidades">Comunidades:</label>
        <select id="comunidades" name="comunidades">
            <!-- Opciones de comunidades aquí -->
        </select>

        <label for="distancia">Distancia:</label>
        <input type="text" id="distancia" name="distancia">

        <label for="desnivel">Desnivel:</label>
        <input type="text" id="desnivel" name="desnivel">

        <label for="genero">Género:</label>
        <select id="genero" name="genero">
            <option value="hombre">Hombre</option>
            <option value="mujer">Mujer</option>
            <option value="mixto">Mixto</option>
        </select>

        <input type="submit" value="Buscar">
    </form>

    <div id="resultados">
        <!-- Carreras se mostrarán aquí -->
        <div class="carrera">Carrera 1</div>
        <div class="carrera">Carrera 2</div>
        <div class="carrera">Carrera 3</div>
        <div class="carrera">Carrera 4</div>
        <div class="carrera">Carrera 5</div>
        <!-- Más carreras según la búsqueda -->
    </div>

    <div class="pagination">
        <!-- Botones de paginación aquí -->
        <button>1</button>
        <button>2</button>
        <button>3</button>
        <!-- Y así sucesivamente -->
    </div>

</body>
</html>
