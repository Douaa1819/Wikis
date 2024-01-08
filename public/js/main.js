document.getElementById('iconMenu').addEventListener('click', openMenu);
document.getElementById('burgerMenu').querySelector('.fa-times').addEventListener('click', toggleMenu);

function openMenu() {
    document.getElementById('burgerMenu').classList.remove('hidden');
    document.getElementById('iconMenu').classList.add('hidden');
}

function toggleMenu() {
    document.getElementById('burgerMenu').classList.add('hidden');
    document.getElementById('iconMenu').classList.remove('hidden');
}