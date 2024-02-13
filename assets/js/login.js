if (!(localStorage.getItem('user'))){


let username = document.getElementById('username');
let pass = document.getElementById('pass');
// let login = document.getElementById('iniciar-sesion')
//                         .addEventListener('click', login)

username.onblur = function(){
    let errorUser = document.getElementById('errorUser');
    if (username.value.trim()<=0){
        errorUser.innerHTML='<p style="color: red; background-color: white; border-radius: 5px;">El usuario no puede estar vacio</p>'
    }else{
        errorUser.innerHTML='';
    }
}

pass.onblur = function(){
    let errorPass = document.getElementById('errorPass');
    if (pass.value.trim()<=0){
        errorPass.innerHTML='<p style="color: red; background-color: white; border-radius: 5px;">La contraseña no puede estar vacía</p>'
    }else{
        errorPass.innerHTML='';
    }
}
document.getElementById('verContra')
.addEventListener('click', function (e) {
    e.preventDefault();
    pass.type = pass.type === "password" ? "text" : "password";
 })
document.getElementById('prueba')
        .addEventListener('click', login)
function login(){
    let logUser={
        'user' : username.value.trim(),
        'pass' : pass.value.trim()
    }
    console.log(logUser);
    let url='http://localhost/RaceMania/pages/Api/loginApi.php';
    const options = {
        method: 'POST',
        headers:{
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(logUser)
      };
      fetch(url, options)
        .then(res => {
            if (res.status==200){
                console.log(res);
                return res.json()    
                      
            }
            if(res.status==401){
                alert('Credenciales no válidas');
            }
            
        })
        .then(data => {
            console.log(data);
            localStorage.setItem('token', data.token);        
            localStorage.setItem('user', data.user);        
            localStorage.setItem('rol', data.rol);
            const currentDate = new Date();
            localStorage.setItem('tokenStartTime', currentDate.getTime());
            alert ('Login correcto');    
            location.href="./../index.php";
        })
        .catch (error=>{
            alert('Error en la carga de datos')

        })   
               
    }
}else{
    alert ('Usuario ya logueado')
    location.href='http://localhost/RaceMania/index.php';
}