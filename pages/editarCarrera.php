<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Carrera</title>
    <!-- Agrega enlaces a tus archivos CSS o cualquier otra configuración que necesites -->
    <style>
        #map {
            height: 180px;
            width: 60%;
            border: solid 0.75em DarkRed;
            border-radius: 20px;
        }

        .heart-container {
            --heart-color: rgb(255, 91, 137);
            position: absolute;
            width: 50px;
            height: 50px;
            transition: .3s;
        }

        .heart-container .checkbox {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0;
            z-index: 20;
            cursor: pointer;
        }

        .heart-container .svg-container {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .heart-container .svg-outline,
        .heart-container .svg-filled {
            fill: var(--heart-color);
            position: absolute;
        }

        .heart-container .svg-filled {
            animation: keyframes-svg-filled 1s;
            display: none;
        }

        .heart-container .svg-celebrate {
            position: absolute;
            animation: keyframes-svg-celebrate .5s;
            animation-fill-mode: forwards;
            display: none;
            stroke: var(--heart-color);
            fill: var(--heart-color);
            stroke-width: 2px;
        }

        .heart-container .checkbox:checked~.svg-container .svg-filled {
            display: block
        }

        .heart-container .checkbox:checked~.svg-container .svg-celebrate {
            display: block
        }

        @keyframes keyframes-svg-filled {
            0% {
                transform: scale(0);
            }

            25% {
                transform: scale(1.2);
            }

            50% {
                transform: scale(1);
                filter: brightness(1.5);
            }
        }

        @keyframes keyframes-svg-celebrate {
            0% {
                transform: scale(0);
            }

            50% {
                opacity: 1;
                filter: brightness(1.5);
            }

            100% {
                transform: scale(1.4);
                opacity: 0;
                display: none;
            }
        }
    </style>
</head>

<body>
    <header>
        <h1 id="detalleCarrera"></h1>
        
    </header>
    <div id="informacion-carrera">
        <!-- <h2>Información de la Carrera</h2>
        <ul>
            <li><strong>Distancia:</strong> 10 km</li>
            <li><strong>Desnivel:</strong> 200 metros</li>
            <li><strong>Categoría:</strong> Trail</li>
           
        </ul> -->
    </div>
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
    <button id='prueba'>Editar</button>
    

    <!-- Agrega enlaces a tus archivos JavaScript o cualquier otra configuración que necesites -->
    <script src="../assets/js/Carreras/toGeoJSON.js"></script>
    <script src="../assets/js/comunidades.data.js"></script>
    <script src="../assets/js/Carreras/editarCarrera.js"></script>
    <script src="../assets/js/session.js"></script>


</body>

</html>