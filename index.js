const slide01 = document.getElementById('slide01');
const btns = document.getElementsByClassName('btns');
let j = 1;


function slider(){

    let i = 0;

    for(i; i < btns.length; i++){

        if(btns[i].checked == true){
            slide01.style.marginLeft = i * -25 + "%";  
            j = i;          
        }
    }
}


 
setInterval(() => {

    btns[j].checked = true;
    slider();
    j++;
    if(j == 4){
        j = 0;
    }

}, 3000);

const navs = document.querySelectorAll('nav');

let contFuncMenu = 1;

function moverMenu(){

    let valor;

    if(contFuncMenu == 1){

        valor = "0%";
        contFuncMenu = 0;

    } else {

        valor = "-80%";
        contFuncMenu = 1;

    }

    navs[0].style.marginLeft = valor;
}

let anoAtual = new Date().getFullYear();
document.getElementById("ano").innerHTML += " - " + anoAtual;
// alert(anoAtual);