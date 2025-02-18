const kamien = document.getElementById('kamien');
const papier = document.getElementById('papier');
const nozyce = document.getElementById('nozyce');
const resultDisplay = document.getElementById('wynik');
kamien.addEventListener('click', () => gra('kamien'));
papier.addEventListener('click', () => gra('papier'));
nozyce.addEventListener('click', () => gra('nozyce'));
function gra(wybor) {
    const opcje = ['kamien', 'papier', 'nozyce'];
    const komputer = opcje[Math.floor(Math.random() * opcje.length)];

}