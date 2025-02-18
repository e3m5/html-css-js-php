
const od = document.getElementById("od");
const dod = document.querySelector("#dod");
const wybor = document.getElementById("wybor"); 
const wynik = document.getElementById("wynik")

dod.addEventListener("change",los);
wybor.addEventListener("change",porownanie);

//document.getElementById("wybor").onchange = function() {porownanie()};
let wybkom;
let wybpla;
let proba;

 
function los(){
    let x = parseInt(od.value) ;
    let y = parseInt(dod.value);  
    wybkom =  Math.floor(Math.random() * (y-x) + x);
    console.log(wybkom)
}
function porownanie(){
    wybpla = parseInt(wybor.value);
    let wynik1;
    if (wybpla > wybkom){
        wynik1 = "twoja liczba jest większa",proba + 1;
    } else if (wybpla < wybkom) {
        wynik1 = "twoja liczba jest mniejsza"
    } else if (wybpla = wybkom){
        wynik1 = "ZGADŁEŚ MOJA LICZBA TO" + "" + wybkom;
    }
    document.getElementById("wynik").innerHTML = wynik1;
}


