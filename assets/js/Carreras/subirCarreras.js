let inputGpx = document.getElementById("gpx");
let form = document.getElementById('gpxForm');
console.log(form);
inputGpx.addEventListener("change", calcularSlope);

function calcularSlope(){
    let file = inputGpx.files[0];
    if (file){
        let fileReader = new FileReader();
        let r = fileReader.readAsText(file);
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
        }
    }
}
let comunidades = document.getElementById("comunidades");
 arr.forEach(item => {
    comunidades.innerHTML+=`<option id="${item.comunidad} "value="${item.comunidad}">${item.comunidad}</option>`;
    
});