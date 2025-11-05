// --- FUNCIÓN GLOBAL ---
// (Debe estar en el ámbito global para que el onclick del HTML la reconozca)
function toggleDropdown(event) {
    event.preventDefault(); // evita la acción por defecto
    const dropdown = event.target.closest('.dropdown');
    if (dropdown) {
        dropdown.classList.toggle('active');
    }
}

// --- CERRAR DROPDOWN AL HACER CLIC FUERA ---
document.addEventListener('click', function (event) {
    if (!event.target.closest('.dropdown')) {
        document.querySelectorAll('.dropdown').forEach(dropdown => {
            dropdown.classList.remove('active');
        });
    }
});
