if (localStorage.getItem('user')){
let resultados =  document.getElementById('resultados');
let url = `http://localhost/RaceMania/pages/Api/mostrarFavoritos.php?user=${localStorage.getItem('user')}`;

const options = {
    method: 'GET',
    headers: {
        'Content-Type': 'application/json'
    }
};
let carrerasMostradas = new Set();

fetch(url, options)
    .then(res => {
        if (res.status == 200) {
            return res.json()
            
        }if (res.status == 400) {
            alert('Credenciales no válidas');
        }
    })
    .then(data => {
        console.log(data);
        resultados.innerHTML=''
        data.forEach(carrera => {
            if (!carrerasMostradas.has(carrera.id)) {
                resultados.innerHTML += `
                    <div class="carrera">
                        <h2 class="titulo_carrera"><a href="detalleCarrera.php?id=${carrera.id}">${carrera.nombre}</a></h2>
                        <div class="footer_carrera">
                            <a id="fecha-carrera">${carrera.distancia} Km</a>
                            <i class="bi bi-geo-alt"></i>
                            <a id="lugar-carrera">${carrera.comunidad}</a>
                        </div>
                    </div>`;

                // Agregar la carrera al conjunto
                carrerasMostradas.add(carrera.id);
            }
        })
    }).catch (error=>{
        alert('Error en la carga de datos')

    })  

}else{
    alert ('Debe iniciar sesión para ver sus favoritos')
    localtion.href='http://localhost/RaceMania/pages/login.php'
}