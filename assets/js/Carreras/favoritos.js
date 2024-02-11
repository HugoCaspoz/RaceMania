let btnFavorito = document.getElementById('añadirFavorito');
btnFavorito.addEventListener('click', favorito)

let windowUrl = new URL(window.location.href);
let idCarrera = windowUrl.searchParams.get("id");

let nombreUser = localStorage.getItem('user');

let favoritoObj = {
    'idCarrera': idCarrera,
    'nombreUser': nombreUser
}


function favorito(){
    if (btnFavorito.checked){
        anadirFavorito()
    }else if (!btnFavorito.checked){
        quitarFavorito()
    }
}
function anadirFavorito() {
    console.log('object');
    let url = 'http://localhost/RaceMania/pages/Api/favoritos.php';
    const options = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(favoritoObj)
    };
    fetch(url, options)
        .then(res => {
            console.log(res)
            if (res.status == 200) {
                return res.json();

            }
        })

}

function quitarFavorito() {
    
    let url = `http://localhost/RaceMania/pages/Api/favoritos.php?nombreUser=${nombreUser}&idCarrera=${idCarrera}`;
    const options = {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json'
        }
    };
    fetch(url, options)
        .then(res => {
            console.log(res)
            if (res.status == 200) {
                return res.json();

            }
        })

}