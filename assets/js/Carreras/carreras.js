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
                    
            }
            if (res.status == 400) {
                alert('Credenciales no válidas');
            }
        }).then(data => {
        
        const categoriaInput = document.getElementById("categoriaInput").value;
        const nombreInput = document.getElementById("nombreInput").value;
        // Filtra los elementos según la categoría y el nombre ingresados atraves de un filter conbinado
        let resultadosFiltrados = [];
        data.forEach(elemento => {
            if ((categoriaInput === "" || elemento.categoria === categoriaInput) &&
                (nombreInput === "" || elemento.nombre.includes(nombreInput))) {
                resultadosFiltrados.push(elemento);
            }
        });
        imprimirResultados(resultadosFiltrados)
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


                        let numPag = document.getElementById("numPag")

                        numPag.innerHTML = `${currentPage} de ${pagsTotales}`
}
// function filtrar(data) {
//     // Obtiene los valores de los inputs
//     const categoriaInput = document.getElementById("categoriaInput").value;
//     const nombreInput = document.getElementById("nombreInput").value;
//     // Filtra los elementos según la categoría y el nombre ingresados atraves de un filter conbinado
//     const resultadosFiltrados = [];
//     data.forEach(elemento => {
//         if ((categoriaInput === "" || elemento.categoria === categoriaInput) &&
//             (nombreInput === "" || elemento.nombre.includes(nombreInput))) {
//             resultadosFiltrados.push(elemento);
//         }
//     });

//     // Resultado
//     console.log(resultadosFiltrados);
//     return resultadosFiltrados;

// }

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


