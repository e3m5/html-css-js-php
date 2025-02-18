const suwak = document.querySelector('#suwak');
const kwadrat = document.querySelector('#kwadrat');
const rozmiar = document.querySelector('#rozmiar');

suwak.addEventListener("input",funkcja)

function funkcja(){
    let r = suwak.value;
    kwadrat.style = ` height: ${r}px; width:  ${r}px;`;
    rozmiar.innerHTML = r;
}