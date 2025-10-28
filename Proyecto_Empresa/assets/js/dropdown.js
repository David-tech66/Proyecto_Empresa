function toggleDropdown(event) {
    event.preventDefault();
    const dropdown = event.target.closest('.dropdown');
    dropdown.classlist.toggle('active');
}

document.addEventListener('click', function(event) {
    if (!event.target.closest('.dropdown')) {
        document.querySelectorAll('.dropdown').forEach(dropdown => {
            dropdown.classList.remove('active');
        })
    }
})

document.getElementById('btnLogin').addEventListener('click', toggleDropdown);
document.getElementById('btnRegistrarse').addEventListener('click', toggleDropdown);