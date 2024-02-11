if (localStorage.getItem('token')) {
    let derecha = document.getElementById('derecha');
    derecha.innerHTML = '';
    derecha.innerHTML=`
    <li>
    <a href="perfil.php"><i class="bi bi-person"></i></a>
    </li>
    
    <li>
    <button id='logout'>Cerrar Sesión</button>
    </li>`;
    let logout=document.getElementById('logout');
    logout.addEventListener("click",function(){
        localStorage.removeItem('token');        
        localStorage.removeItem('user');        
        localStorage.removeItem('rol');   
        alert('Sesión cerrada')     
        location.href="../index.php";
    })
} else {
    let derecha = document.getElementById('derecha');
    derecha.innerHTML = '';
    derecha.innerHTML = `<li>
    <a class="nav-link" href="login.php">Iniciar Sesión</a>
</li>
<li>
    <a class="nav-link" href="registro.php">Registro</a>
</li>`
}