// Obtener elementos
const btnLogin = document.getElementById('btnLogin');
const modalLogin = document.getElementById('modalLogin');
const closeLogin = modalLogin.querySelector('.close');

// Abrir modal al hacer clic en "Iniciar Sesión"
btnLogin.addEventListener('click', function (e) {
    e.preventDefault(); // Prevenir comportamiento por defecto del enlace
    modalLogin.style.display = 'block';
});

// Cerrar modal al hacer clic en la 'x'
closeLogin.addEventListener('click', function () {
    modalLogin.style.display = 'none';
});

// Cerrar modal al hacer clic fuera del contenido del modal
window.addEventListener('click', function (e) {
    if (e.target == modalLogin) {
        modalLogin.style.display = 'none';
    }
});
