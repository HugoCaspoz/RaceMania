
let resultados = document.getElementById('resultados');
let currentPage = 0;
let itemsPerPage = 6;
let pagsTotales

let map = L.map('map').setView([44, -9,85416],6)
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);
function verCarreras() {
    let url = 'http://localhost/RaceMania/pages/Api/todasCarreras.php';
    const options = {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        },
    };
    fetch(url, options)
        .then(res => {
            if (res.status == 200) {
                return res.json()
                    
            }
            if (res.status == 400) {
                alert('Credenciales no válidas');
            }
        }).then(data => {
        
        const categoriaInput = document.getElementById("categoriaInput").value;
        const nombreInput = document.getElementById("nombreInput").value;
        const comunidadInput = document.getElementById('comunidadInput').value
        // Filtra los elementos según la categoría y el nombre ingresados atraves de un filter conbinado
        let resultadosFiltrados = [];
        data.forEach(elemento => {
            if ((categoriaInput === "" || elemento.categoria === categoriaInput) &&
                (nombreInput === "" || elemento.nombre.includes(nombreInput)) && (comunidadInput === "" || elemento.comunidad === comunidadInput)) {
                resultadosFiltrados.push(elemento);
            }
        });
        mapaCarreras(resultadosFiltrados)
        imprimirResultados(resultadosFiltrados)
        })
        .catch (error=>{
            alert('Error en la carga de datos')

        })  
}
let filtrar = document.getElementById('filtrar')
                        .addEventListener( "click", verCarreras);
verCarreras()
function imprimirResultados(data){
    resultados.innerHTML= "";
    pagsTotales = Math.trunc(data.length / 6)
                        data.filter((_,index)=> Math.trunc(index/6)==currentPage)
                            .forEach(carrera => {
                            resultados.innerHTML += `
                        <div class="carrera">
                            <h2 class="titulo_carrera"><a href="detalleCarrera.php?id=${carrera.id}">${carrera.nombre}</a></h2>
                            <div class="footer_carrera">
                                <a id="fecha-carrera">${carrera.distancia} Km</a>
                                <i class="bi bi-geo-alt"></i>
                                <a id="lugar-carrera">${carrera.comunidad}</a>
                            </div>
                        </div>`
                        });
                        if (resultados.innerHTML==''){
                            alert ('No hay ninguna carrera con los filtros establecidos')
                            resultados.innerHTML='No hay ninguna carrera con los datos que nos ha proporcionado, Prueba a buscar de nuevo :)'
                        }

                        let numPag = document.getElementById("numPag")

                        numPag.innerHTML = `${currentPage} de ${pagsTotales}`
}

function mapaCarreras(carreras){
    map.eachLayer(function(layer){
        if(layer instanceof L.Marker){
            map.removeLayer(layer);
        }
    })

    carreras.forEach(carrera=>{
        let jsonCoors = JSON.parse(carrera.coors)
        L.marker(jsonCoors[0]).addTo(map);
        
    })
}
//Paginacion
let next = document.getElementById("next")
next.addEventListener("click", () => {
    if (currentPage < pagsTotales) {
        currentPage++;
        resultados.innerHTML = ``;
        verCarreras();
        numPag.textContent = `Pagina ${currentPage + 1}`;
    }
});

let prev = document.getElementById("prev")
prev.addEventListener("click", () => {
    if (currentPage >= 1) {
        currentPage--;
        resultados.innerHTML = ``;
        verCarreras();
        numPag.textContent = `Pagina ${currentPage + 1} de 6`;
    }
});


