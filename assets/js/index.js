let comunidades = document.getElementById("comunidades");
comunidades.addEventListener("change", selectCom)
 arr.forEach(item => {
    comunidades.innerHTML+=`<option id="${item.comunidad} "value="${item.comunidad}">${item.comunidad}</option>`;
    
});

 function selectCom(e){
    e.preventDefault()
    let provincias = document.getElementById('provincias')
    let comunidad=e.target.value
    let comSeleccionada=arr.find(item=>item.comunidad==comunidad);
    provincias.innerHTML='';
    comSeleccionada.provincias.forEach(provincia => {
        provincias.innerHTML+=`<option id="${provincia} "value="${provincia}">${provincia}</option>`;
    });
 }