// Obtener el Modal
let modal_registro_user = document.getElementById("modalRegistrarUser");

// Obtener el boton que abre el Modal 
let btn_registro_user = document.getElementById("btnRegistrarse");

// Obtén el elemento <span> que cierra el modal
let span_registro_user = document.getElementsByClassName("closeRUser")[0];

// Cuando el usuario haga clic en el botón, abra el modal 
btn_registro_user.onclick = function() {
    modal_registro_user.style.display = "block";
}

// Cuando el usuario haga clic en <span> (x), cierre el modal
span_registro_user.onclick = function() {
    modal_registro_user.style.display = "none";
}

// Cuando el usuario haga clic fuera del modal, ciérrelo.
window.onclick = function(event) {
    if (event.target == modal_registro_user) {
        modal_registro_user.style.display = "none";
    }
}