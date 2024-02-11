let btneliminar =  document.getElementById('eliminar')

btneliminar.addEventListener('click', eliminar)
if (localStorage.getItem('user')){
function eliminar(e){
    e.preventDefault();
    
    let url=`http://localhost/RaceMania/pages/Api/eliminarUsuario.php?user=${localStorage.getItem('user')}`;
    const options = {
        method: 'DELETE',
        headers:{
            'Content-Type': 'application/json'
        }
      };
      fetch(url, options)
        .then(res => {
            if (res.status==201){             
                    localStorage.removeItem('token');        
                    localStorage.removeItem('user');        
                    localStorage.removeItem('rol');   
                    alert('Usuario eliminado')     
                    location.href="../index.php";                       
            }
            if(res.status==401){
                alert('Credenciales no válidas');
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