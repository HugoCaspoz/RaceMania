<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda de Carreras</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
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
        #map { 
            height: 180px; 
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

    <label for="categoriaInput">Seleccione la categoría:</label>
    <select id="categoriaInput">
        <option value="">-- Todas las categorías --</option>
        <option value="infantil">Infantil (0-12 años)</option>
        <option value="juvenil">Juvenil (13-17 años)</option>
        <option value="adulto">Adulto (18 años en adelante)</option>
    </select>

    <label for="comunidadInput">Seleccione la comunidad:</label>
    <select id="comunidadInput">
        <option value="">-- Todas las comunidades --</option>
        <option value="Andalucía">Andalucía</option>
        <option value="Aragón">Aragón</option>
        <option value="Asturias">Asturias</option>
        <option value="Islas Baleares">Islas Baleares</option>
        <option value="Canarias">Canarias</option>
        <option value="Cantabria">Cantabria</option>
        <option value="Castilla y León">Castilla y León</option>
        <option value="Castilla-La Mancha">Castilla-La Mancha</option>
        <option value="Cataluña">Cataluña</option>
        <option value="Extremadura">Extremadura</option>
        <option value="Galicia">Galicia</option>
        <option value="Madrid">Madrid</option>
        <option value="Murcia">Murcia</option>
        <option value="Navarra">Navarra</option>
        <option value="La Rioja">La Rioja</option>
        <option value="País Vasco">País Vasco</option>
        <option value="Comunidad Valenciana">Comunidad Valenciana</option>
    </select>

    <input type="text" id="nombreInput" placeholder="Ingrese el nombre">
    <button id="filtrar" >Filtrar</button>
    <div id="map"></div>
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
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
    <script src="../assets/js/Carreras/carreras.js"></script>
    <script src="../assets/js/session.js"></script>

</body>
</html>
