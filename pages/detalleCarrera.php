<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Carrera</title>
    <!-- Agrega enlaces a tus archivos CSS o cualquier otra configuración que necesites -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
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
        <h2>Añadir a favoritos:</h2>
        <div class="heart-container" title="Like">
            <input type="checkbox" class="checkbox" id="añadirFavorito">
            <div class="svg-container">
                <svg viewBox="0 0 24 24" class="svg-outline" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Zm-3.585,18.4a2.973,2.973,0,0,1-3.83,0C4.947,16.006,2,11.87,2,8.967a4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,11,8.967a1,1,0,0,0,2,0,4.8,4.8,0,0,1,4.5-5.05A4.8,4.8,0,0,1,22,8.967C22,11.87,19.053,16.006,13.915,20.313Z">
                    </path>
                </svg>
                <svg viewBox="0 0 24 24" class="svg-filled" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.5,1.917a6.4,6.4,0,0,0-5.5,3.3,6.4,6.4,0,0,0-5.5-3.3A6.8,6.8,0,0,0,0,8.967c0,4.547,4.786,9.513,8.8,12.88a4.974,4.974,0,0,0,6.4,0C19.214,18.48,24,13.514,24,8.967A6.8,6.8,0,0,0,17.5,1.917Z">
                    </path>
                </svg>
                <svg class="svg-celebrate" width="100" height="100" xmlns="http://www.w3.org/2000/svg">
                    <polygon points="10,10 20,20"></polygon>
                    <polygon points="10,50 20,50"></polygon>
                    <polygon points="20,80 30,70"></polygon>
                    <polygon points="90,10 80,20"></polygon>
                    <polygon points="90,50 80,50"></polygon>
                    <polygon points="80,80 70,70"></polygon>
                </svg>
            </div>
        </div>
    </header>

    <center>
        <section id="mapa">
            <!-- Aquí puedes integrar tu mapa, ya sea con una API de mapas como Google Maps u otra solución -->
            <div id="map"></div>
        </section>
    </center>

    <div id="informacion-carrera">
        <!-- <h2>Información de la Carrera</h2>
        <ul>
            <li><strong>Distancia:</strong> 10 km</li>
            <li><strong>Desnivel:</strong> 200 metros</li>
            <li><strong>Categoría:</strong> Trail</li>
           
        </ul> -->
    </div>

    <footer>
        <!-- Puedes agregar contenido adicional en el pie de página si es necesario -->
    </footer>

    <!-- Agrega enlaces a tus archivos JavaScript o cualquier otra configuración que necesites -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script src="../assets/js/Carreras/detalleCarrera.js"></script>
    <script src="../assets/js/Carreras/favoritos.js"></script>
    <script src="../assets/js/session.js"></script>


</body>

</html>