if (localStorage.getItem('rol')==='organizer'){
let inputGpx = document.getElementById("gpx");
let form = document.getElementById('gpxForm');
inputGpx.addEventListener("change", calcularSlope);
let coordenadas = [];
function calcularSlope(){
    let file = inputGpx.files[0];
    if (file){
        const fileReader = new FileReader();
        fileReader.onload = event=>{
            let textContent = event.target.result;
            let parser = new DOMParser();
            let xmlDoc = parser.parseFromString(textContent, "application/xml");
            let json = toGeoJSON.gpx(xmlDoc);
            let coor = json.features[0].geometry.coordinates;
            
            let altitudes = coor.map(item => item[2]);
            let values = altitudes.reduce(({pos, neg, prev}, item)=>{
                if (item < prev) pos+=(prev - item)
                    else neg += (item-prev)
                return {pos: pos, neg: neg, prev:item}
            }, {pos:0, neg:0, prev: altitudes[0]});
    
            form.elements.desnivelNeg.value = values.neg.toFixed(2);
            form.elements.desnivelPos.value = values.pos.toFixed(2);
            form.elements.desnivel.value = (values.pos + values.neg).toFixed(2);

            

            // Obtener todas las coordenadas del archivo GPX
            let trkpts = xmlDoc.querySelectorAll('trkpt');
            let intervalo=trkpts.length/200;
            intervalo=parseInt(intervalo)
            
            for (let i=1;i<trkpts.length; i+=intervalo){
                var latitud = parseFloat(trkpts[i].getAttribute('lat'));
                var longitud = parseFloat(trkpts[i].getAttribute('lon'));
                coordenadas.push({ lat: latitud, lon: longitud });

            }
            
           
        }
        fileReader.readAsText(file);
        return(coordenadas);
    }

}




let comunidades = document.getElementById("comunidades")
 arr.forEach(item => {
    comunidades.innerHTML+=`<option id="${item.comunidad} "value="${item.comunidad}">${item.comunidad}</option>`;
    
});

// let subir = document.getElementById('subir');
// subir.addEventListener('click', subirCarrera);

let prueba = document.getElementById('prueba');
prueba.addEventListener('click', subirCarrera)
function subirCarrera(){
    let coordenadasTexto= (JSON.stringify(coordenadas, null, 2))
    let generos=document.getElementsByName('genero');
    let generoseleccionado
    for (let i=0; i<generos.length; i++){
        if (generos[i].checked){
            generoseleccionado = generos[i].value
        }
    }

    let categorias=document.getElementsByName('categoria');
    let categoriaseleccionada
    for (let i=0; i<categorias.length; i++){
        if (categorias[i].checked){
            categoriaseleccionada = categorias[i].value
        }
    }

    let tipos=document.getElementsByName('tipo');
    let tipoSeleccionado
    for (let i=0; i<tipos.length; i++){
        if (tipos[i].checked){
            tipoSeleccionado = tipos[i].value
        }
    }
    if (comunidades.value=='Seleccione una comunidad'){
        alert('Seleccione una comunidad')
    }else{
        let nuevaCarrera = {
            'nombre': document.getElementById('nombre').value.trim(),
            'distancia': document.getElementById('distancia').value.trim(),
            'coors': coordenadasTexto,
            'genero': generoseleccionado,
            'categoria': categoriaseleccionada,
            'comunidad': comunidades.value,
            'desNeg': document.getElementById('desnivelNeg').value,
            'desPos': document.getElementById('desnivelPos').value,
            'desTotal': document.getElementById('desnivel').value,
        }
        
    
                let url = 'http://localhost/RaceMania/pages/Api/subirCarrera.php';
                const options = {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(nuevaCarrera)
                };
                fetch(url, options)
                    .then(res => {
                        if (res.status == 200) {
                            return res.json();
                            
                        }
                    })
                    .then(data => {
                        alert ('Carrera subida correctamente');
                        location.href='./carreras.php';
                    }).catch (error=>{
                        alert('Error en la carga de datos')
            
                    })  
            
        }   
}
}else{
    alert('Solo pueden entrar organizadores')
    location.href='http://localhost/RaceMania/index.php'
}
    
    
