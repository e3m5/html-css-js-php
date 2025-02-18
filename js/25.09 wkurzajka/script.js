const kula = document.querySelector('#kula');
const licznik = document.querySelector('#licznik');
const pozX = document.querySelector('#pozX');
const pozY = document.querySelector('#pozY');


console.log(kula);

kula.addEventListener('mouseover',cynamon);
pozX.addEventListener('input',ciapaty);
pozY.addEventListener('input',ciapaty);

let pkt = 0;
//licznik.addEventListener('mouseover', kula)



function cynamon(){
    pkt = pkt + 1;
    let x = Math.floor(Math.random()*900+1);
    let y = Math.floor(Math.random()*700+1);
    kula.style = `margin-top: ${y}px; margin-left: ${x}px;`;
    licznik.innerHTML = pkt;
}

function ciapaty(){
    let ileX = pozX.value;
    let ileY = pozY.value;
    kula.style = `margin-top: ${ileY}px; margin-left: ${ileX}px;`;

}