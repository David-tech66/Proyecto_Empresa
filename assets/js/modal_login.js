document.addEventListener("DOMContentLoaded", function () {
    // Obtener elementos solo si existen
    const modal = document.getElementById("modalLogin");
    const btn = document.getElementById("btnLogin");
    const span = document.querySelector(".close");

    // Si el botón existe (usuario no logueado)
    if (btn && modal) {
        btn.onclick = function () {
            modal.style.display = "block";
        };
    }

    // Si el botón de cerrar existe
    if (span) {
        span.onclick = function () {
            modal.style.display = "none";
        };
    }

    // Cerrar modal al hacer clic fuera
    window.onclick = function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    };
});
