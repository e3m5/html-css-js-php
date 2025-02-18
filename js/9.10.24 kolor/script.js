const suwakR = document.querySelector('#suwakR');

const czerwony = document.querySelector('#suwakC');
const niebieski = document.querySelector('#suwakN');
const zielony = document.querySelector('#suwakZ');

const kwadrat = document.querySelector('#kwadrat');
//const rozmiar = document.querySelector('#rozmiar');


suwakR.addEventListener("input",funkcja)

czerwony.addEventListener("input",funkcja)
niebieski.addEventListener("input",funkcja)
zielony.addEventListener("input",funkcja)

function funkcja(){
    let r = suwakR.value;
    let b = niebieski.value;
    let c = czerwony.value;
    let z = zielony.value;
    

    kwadrat.style = ` height: ${r}px; width:  ${r}px; background-color:rgb(${c}, ${z}, ${b});`;
    //rozmiar.innerHTML = r;    
    czerwony.innerHTML = c;    
    niebieski.innerHTML = b;   
    zielony.innerHTML = z;
}
