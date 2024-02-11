let resultados = document.getElementById('resultados');
let currentPage = 0;
let itemsPerPage = 6;
let pagsTotales
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
                    .then(data => {
                        function filtrarCarreras() {
                            // Obtener el valor seleccionado en el elemento select
                            let distanciaSeleccionada = parseInt(document.getElementById("distancia").value);
                        
                            // Filtrar las carreras según la distancia seleccionada
                            const carrerasFiltradas = carreras.filter(carrera => carrera.distancia === distanciaSeleccionada);
                        
                            // Mostrar los resultados en el div "resultados"
                            mostrarResultados(carrerasFiltradas);
                        } 
                        
                    imprimirResultados(data)
                    })
            }
            if (res.status == 400) {
                alert('Credenciales no válidas');
            }
        })
}
verCarreras()
function imprimirResultados(data){
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


                        let numPag = document.getElementById("numPag")

                        numPag.innerHTML = `${currentPage} de ${pagsTotales}`
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


