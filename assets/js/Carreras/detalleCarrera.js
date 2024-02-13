if (localStorage.getItem('user')){


let resultados = document.getElementById('resultados');
let id = window.location.search;
id = id.slice(4,);

let waypoints;
let infoCarrera = document.getElementById('informacion-carrera');
let url = `http://localhost/RaceMania/pages/Api/detalleCarrera.php?id=${id}`;
const options = {
    method: 'GET',
    headers: {
        'Content-Type': 'application/json'
    }
};
fetch(url, options)
    .then(res => {
        if (res.status == 200) {
            return res.json()
            
        } if (res.status == 400) {
            alert('Carrera no encontrada');
        }
    })
    .then(data => {
        
        let detalleCarrera=document.getElementById('detalleCarrera');
        detalleCarrera.innerHTML=`Detalle de Carrerra: ${data.nombre}`
        let coords = JSON.parse(data.coors)
            ;
        let map = L.map('map').setView(coords[0], 10);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
        L.polyline(
            coords,
            { color: "DarkRed" }
        ).addTo(map);
        infoCarrera.innerHTML = `
        <h2>Información de la Carrera</h2>
        <ul>
        <li><strong>Distanciaaaaa:</strong> ${data.distancia} km</li>
        <li><strong>Desnivel:</strong> ${data.desTotal} m</li>
        <li><strong>Categoría:</strong> ${data.genero} y ${data.categoria}</li>
        <li><strong>Comunidad:</strong> ${data.comunidad} </li>
        <li><strong>Desnivel Negativo:</strong> ${data.desNeg} m</li>
        <li><strong>Desnivel Positivo:</strong> ${data.desPos} m</li>
        <li><a href='/RaceMania/pages/editarCarrera.php?id=${id}'>Editar Carrera</a></li>
        </ul>`

    }).catch (error=>{
        alert('Error en la carga de datos')

    })  

}else{
    alert('Solo pueden entrar usuarios logueados')
    location.href='http://localhost/RaceMania/index.php'
}