function checkTokenExpiration() {
    const tokenStartTime = localStorage.getItem('tokenStartTime');
    const currentTime = new Date().getTime();
    const tokenExpirationTime = 60*60*1000;

    if (currentTime - tokenStartTime > tokenExpirationTime) {
        const renewToken = confirm('Su sesión ha expirado. ¿Desea renovar su sesión?');

        if (renewToken) {
            localStorage.setItem('tokenStartTime', currentTime);
            alert('Token renovado correctamente');
        } else {
            logoutUser();
        }
    }
}

function logoutUser() {
    alert('Sesión cerrada automáticamente debido a la expiración del token');
    localStorage.clear();
    location.href = 'http://localhost/RaceMania/index.php';
}
if (localStorage.getItem('token')){
document.addEventListener("DOMContentLoaded", function() {
    checkTokenExpiration();
});
}