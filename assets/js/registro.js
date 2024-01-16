let fullname = document.getElementById('fullname');
let username = document.getElementById('username');
let email = document.getElementById('email');
let pass = document.getElementById('pass');
let pass2 = document.getElementById('pass2');
let weight = document.getElementById('weight');
let birthday = document.getElementById('birthday');
let rol;
let usuario = document.getElementById('usuario');
let organizador = document.getElementById('organizador');

let registro = document.getElementById('registro')
                        .addEventListener('click', registrarse)

function registrarse(){
    if (usuario.checked){
        rol='Usuario';
    }else if(organizador.checked){
        rol='Organizador';
    }
    let nuevoUser={
        'name':fullname.value,
        'username':username.value,
        'email':mail.value,
        'pass':pass.value,
        'weight':city.value,
        'birthday':phone.value,
        'club':"alterne",
        'name':rol,
    }
    let url='localhost:39500/api/register/';
    const options = {
        method: 'POST',
        body: JSON.stringify(nuevoUser)
      };
      fetch(url, options)
        .then(res => res.json())
        .then(response => {
          data = response;
          console.log(data);  
    })
}

