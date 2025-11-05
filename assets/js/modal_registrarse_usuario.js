document.addEventListener("DOMContentLoaded", function () {
    // Obtener elementos solo si existen
    const modalRegistro = document.getElementById("modalRegistrarUser");
    const btnRegistro = document.getElementById("btnRegistrarse");
    const spanCerrar = document.querySelector(".closeRUser");

    // Abrir modal (solo si el botón existe)
    if (btnRegistro && modalRegistro) {
        btnRegistro.onclick = function () {
            modalRegistro.style.display = "block";
        };
    }

    // Cerrar modal con la X (solo si existe)
    if (spanCerrar) {
        spanCerrar.onclick = function () {
            modalRegistro.style.display = "none";
        };
    }

    // Cerrar modal al hacer clic fuera
    window.onclick = function (event) {
        if (event.target === modalRegistro) {
            modalRegistro.style.display = "none";
        }
    };
});
