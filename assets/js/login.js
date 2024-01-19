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
document.getElementById('prueba')
        .addEventListener('click', login)
function login(){
    let logUser={
        username : username.value.trim(),
        pass : pass.value.trim(),
    }
    console.log(logUser);
    let url='http://localhost:3500/api/auth/login';
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
                
                return res.json();             
            }
            
        })
        .then(data => {
            console.log(data);
            localStorage.setItem('token', data.token);        
    })
}