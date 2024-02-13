if (!(localStorage.getItem('user'))){
let fullname = document.getElementById('fullname');
let username = document.getElementById('username');
let email = document.getElementById('email');
let pass = document.getElementById('pass');
let pass2 = document.getElementById('pass2');
let phone = document.getElementById('phone');
let city = document.getElementById('city');
let club = document.getElementById('club');
let rol;
let usuario = document.getElementById('usuario');
let organizador = document.getElementById('organizador');
let validar=false

email.onchange = function () {
    let errorMail = document.getElementById('errorMail');
    if (!/^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/.test(email.value.toLowerCase())) {
        errorMail.innerHTML = '<p style="color: red; background-color: white; border-radius: 5px;">Introduce un email válido</p>'
        validar=false
    } else {
        errorMail.innerHTML = '';
        validar=true;
    }
}
pass.onchange = function () {
    let errorPass = document.getElementById('errorPass');
    if (!/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,15}/.test(pass.value)) {
        errorPass.innerHTML = `<p style="color: red; background-color: white; border-radius: 5px;;">
        La contraseña tiene que tener:<br>
        Minimo 8 caracteres,
        Maximo 15,
        una letra mayúscula,
        una letra minucula,
        un dígito
        0 espacios en blanco y
        al menos 1 caracter especial</p>`;
        validar=false
    } else {
        errorPass.innerHTML = '';
        validar=true
    }
}
document.getElementById('verContra')
.addEventListener('click', function (e) {
    e.preventDefault();
    pass.type = pass.type === "password" ? "text" : "password";
 })

pass2.onchange = function () {
    let errorconfPass = document.getElementById('errorconfPass');
    if ((pass.value == pass2.value) && (pass.value.trim().length >= 8)) {
        errorconfPass.innerHTML = '';
        // document.getElementById('prueba')
        // .addEventListener('click', registrarse)
        validar=true
    } else {
        errorconfPass.innerHTML = '<p style="color: red; background-color: white; border-radius: 5px;">Las contraseñas tienen que coincidir y no pueden estar vacias</p>';
        validar=false
    }
}

document.getElementById('prueba')
    .addEventListener('click', registrarse)

function registrarse() {
    if (usuario.checked) {
        rol = 'user';
    } else if (organizador.checked) {
        rol = 'organizer';
    } else {
        rol = 'user';
    }
    let nuevoUser = {
        'fullname': fullname.value.trim(),
        'user': username.value.trim(),
        'email': email.value.trim(),
        'pass': pass.value.trim(),
        'phone': phone.value.trim(),
        'city': city.value.trim() || 'Desconocida',
        'club': club.value.trim() || 'Desconocido',
        'rol': rol || 'user'
    }
    console.log(validar);
    if( validar && pass.value==pass2.value && pass.value.trim()!='') {
        let url = 'http://localhost/RaceMania/pages/Api/existeUser.php';
    const options = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(nuevoUser)
    };
    
    fetch(url, options)
        .then(res => {
            if (res.status == 200) {
                let url = 'http://localhost/RaceMania/pages/Api/registroApi.php';
                const options = {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(nuevoUser)
                };
                fetch(url, options)
                    .then(res => {
                        if (res.status == 200) {
                            return res.json();
                            
                        }
                    })
                    .then(data => {
                        alert ('Usuario registrado correctamente');
                        location.href='./login.php';
                    }).catch (error=>{
                        alert('Error en la carga de datos')
            
                    })  
            }else{
                alert ("Usuario ya existente");
            }
        })
        
}else{
    alert('Campos no válidos');
}}

}else{
    alert('Usuario ya esta registrado')
    location.href='http://localhost/RaceMania/index.php';
}


