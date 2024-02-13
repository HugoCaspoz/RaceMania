<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include('header.php');
    ?>


    <h1>GPX Analyzer</h1>

    <form id="gpxForm">
        <label for="gpx">Selecciona un archivo GPX:</label>
        <input type="file" id="gpx" accept=".gpx" />
    <h2>Resultados:</h2>

    <label for="desnivelNeg">Desnivel Negativo:</label>
    <input type="text" id="desnivelNeg" readonly />

    <label for="desnivelPos">Desnivel Positivo:</label>
    <input type="text" id="desnivelPos" readonly />
    </br></br>
    <label for="desnivel">Desnivel Total:</label>
    <input type="text" id="desnivel" readonly />


    <label for="distancia">Distancia Total de la Carrera :</label>
    <input type="number" id="distancia" placeholder="Km"/>

    <label for="nombre">Nombre de la Carrera:</label>
    <input type="text" id="nombre"/>

    <h3>Género:</h3>
        <input type="radio" id="hombre" name="genero" value="hombre">
        <label for="hombre">Hombre</label>

        <input type="radio" id="mujer" name="genero" value="mujer">
        <label for="mujer">Mujer</label>

        <input type="radio" id="mixto" name="genero" value="mixto">
        <label for="mixto">Mixto</label>

        <h3>Categoría de Participación:</h3>
        <input type="radio" id="infantil" name="categoria" value="infantil">
        <label for="infantil">Infantil (0-12 años)</label>

        <input type="radio" id="juvenil" name="categoria" value="juvenil">
        <label for="juvenil">Juvenil (13-17 años)</label>

        <input type="radio" id="adulto" name="categoria" value="adulto">
        <label for="adulto">Adulto (18 años en adelante)</label>

        <h3>Tipo de Carrera:</h3>
        <input type="radio" id="cross" name="tipo" value="cross">
        <label for="cross">Cross Country</label>

        <input type="radio" id="urbano" name="tipo" value="urbano">
        <label for="urbano">Carrera urbana</label>

        <input type="radio" id="montaña" name="tipo" value="montaña">
        <label for="montaña">Carrera de montaña</label>

        <h3>Comunidad Autónoma:</h3>
        <select id="comunidades"></select>
        </br></br>
    </form>
    <button id='prueba' class="btn btn-success">Subir Carrera</button>

    <script src="../assets/js/Carreras/toGeoJSON.js"></script>
    <script src="../assets/js/comunidades.data.js"></script>
    <script src="../assets/js/Carreras/subirCarreras.js"></script>
    <script src="../assets/js/session.js"></script>

</body>

</html>