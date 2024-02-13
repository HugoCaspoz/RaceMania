let nuevofullname= document.getElementById('nuevofullname')
let nuevouser= document.getElementById('nuevouser')
let nuevapass=document.getElementById('nuevapass')
let nuevophone=document.getElementById('nuevophone')
let nuevocity=document.getElementById('nuevocity')
let nuevoemail=document.getElementById('nuevoemail')
let nuevoclub=document.getElementById('nuevoclub')
let nuevorol=document.getElementById('nuevorol')
let usuario
if (localStorage.getItem('user')){

        function mostrardatos(){
            let url=`http://localhost/RaceMania/pages/Api/recogerDatosUser.php?user=${localStorage.getItem('user')}`;
            const options = {
                    method: 'GET',
                    headers:{
                        'Content-Type': 'application/json'
                    }
        
            };
            fetch(url, options)
                .then(res => {
                    console.log(res);
                    if (res.status==200){
                        return res.json()    
                    }
                    if(res.status==401){
                        alert('Credenciales no válidas');
                    }
                })
                .then(data => {
                    nuevofullname.value=data.fullname
                    nuevouser.value=data.user
                    nuevophone.value=data.phone
                    nuevocity.value=data.city
                    nuevoemail.value=data.email
                    nuevoclub.value=data.club
                    nuevorol.value=data.rol

                    document.getElementById('pruebaEditar')
                            .addEventListener('click', editar); 

                          
                }).catch (error=>{
                    alert('Error en la carga de datos')
        
                })           
            }
            mostrardatos();
            function editar(){
                usuario={
                    'nuevofullname': nuevofullname.value,
                    'nuevouser': nuevouser.value,
                    'nuevapass':nuevapass.value,
                    'nuevophone':nuevophone.value,
                    'nuevocity':nuevocity.value,
                    'nuevoemail':nuevoemail.value,
                    'nuevoclub':nuevoclub.value,
                    'nuevorol':nuevorol.value
                } 
                let url=`http://localhost/RaceMania/pages/Api/editarUser.php?user=${localStorage.getItem('user')}`;
            const options = {
                method: 'PUT',
                headers:{
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(usuario)
    
              };
              fetch(url, options)
                .then(res => {
                    if (res.status==200){                     
                            
                            localStorage.setItem('user', nuevouser.value) ;     
                            localStorage.setItem('rol', nuevorol.value);   
                            alert('Usuario editado correctamente')     
                            location.href="../index.php";                       
                    }
                    if(res.status==400){
                        alert('Update Error');
                    }
                    if (res.status==401){
                        alert("Usuario no encontrado");
                    }
                })
            }
            
            
        
}else{
    localStorage.removeItem('token');        
    localStorage.removeItem('user');        
    localStorage.removeItem('rol');   
    alert ('Necesita iniciar sesion');
    location.href="../pages/login.php";

}