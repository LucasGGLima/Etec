

const form = document.getElementById('form-cad');
const inputs = document.getElementsByClassName('input-cad');
const alertas = document.getElementsByClassName('alertas');
const emailRegex = /^\w+([-+.']\w+)*@\w+([-.]\w+)*s/;
// const selects = document.getElementsByTagName('selects');

// console.log(selects);


function alertaErro(posicao){
    inputs[posicao].style.border = '2px solid red';
    alertas[posicao].style.display = "block";
}

function inputValidado(posicao){
    inputs[posicao].style.border = '';
    alertas[posicao].style.display = "none";
}

function validarTextos(posicao){ 
    if(inputs[posicao].value.length < 3){
        // alert('erro');
        alertaErro(posicao);
        valid = false;
    } else {
        inputValidado(posicao)
    }
}

    
    document.getElementById('form-cad').addEventListener('submit', function(event) {
let valid = true;

        
        let i = 0;

        function alertaErro(posicao){
            inputs[posicao].style.border = '2px solid red';
            alertas[posicao].style.display = "block";
        }
        
        function inputValidado(posicao){
            inputs[posicao].style.border = '';
            alertas[posicao].style.display = "none";
        }
        
        function validarTextos(posicao){ 
            if(inputs[posicao].value.length < 3){
                // alert('erro');
                alertaErro(posicao);
                valid = false;
            } else {
                inputValidado(posicao)
            }
        }
        
  
        for(i; i <=1; i++){
            validarTextos(i);
        }
    
        // Validação do email
        // const email = document.getElementById('email').value.trim();
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(inputs[5].value.trim())) {
            // document.getElementById('emailError').textContent = 'Por favor, insira um email válido.';
            valid = false;
        }
    

        // Se não for válido, previne o envio do formulário
        if (!valid) {
            event.preventDefault();
        }
    });


// function validarSelect(){

//     if(selects[0].value == "selecionar"){
//         alertaErro(2)
//     } else {
//         inputValidado(2)
//     }
    
// }

function validarData(){
    let anoAtual = new Date().getFullYear();
    if(Number(inputs[3].value.substring(0, 4)) > anoAtual - 15){
        alertaErro(3)
        valid = false;
    } else {
        inputValidado(3)
    }
}


// alert(data);

// if(Number(inputs[3].value.substring(0, 4)) == data + 15){
//     alert('asd');
// }
// alert(inputs[3].value);


function mackTel(){
    let input = document.querySelector('#cad-tel');
    let valor = input.value;
    let i = 0;
    let tel = [];
    for(i; i <= valor.length; i++){
        let parmString = valor.substring(i, i+1);
        switch(parmString){
            case ")":
            case "(":
            case "-":
            case " ":
            break; 
            default: 
            switch(parmString){
                case "0": case "1": case "2":
                case "3": case "4": case "5":
                case "6": case "7": case "8":
                case "9": break;
                default: 
                
            }
                tel.push(parmString);
            break;
        }
    }
    let telString = tel.join("");
    
    if(valor != null || valor != ""){
        input.value = "(" + telString.substring(0, 2) + ") " + telString.substring(2,7) + "-" +telString.substring(7,11);
    }
    // if(valor != "" || valor != null){
    //     let idInput = document.querySelector('#cad-tel');
    //     let valor = idInput.value;
    //     let valor01 = valor.substring(0,2);
    //     let valor02 = valor.substring(2,7);
    //     let valor03 = valor.substring(7,11);
    //     idInput.value = "(" +  valor01 + ")" + " " + valor02 + "-" + valor03;
    // }
// alert(subStrin01);
}


// document.getElementById('cad-tel').mask("(00) 00000-0000");
 function formCad(parm){
  let form01 = document.getElementById('block-form-01').style;
  let form02 = document.getElementById('block-form-02').style;

  let tamanhoTela = screen.width;

  form01.transition = "1s";
  form01.transition = "1s";
  
  if(tamanhoTela > 480){

  

  form01.marginLeft = "5%";
  form02.marginLeft = "5%";
 
  
  setTimeout(function(){
    
    if(parm == 1){
        form02.zIndex = 2;
    } else {
        form01.zIndex = 2;
        form02.zIndex = 1;

    }
    // form02.zIndex = 1;
    setTimeout(function(){

    form01.marginLeft = "25%";
    form02.marginLeft = "-38%";

    }, 250);

}, 1000);

} else {

// form01.zIndex = 1;
// form02.zIndex = 3;

if(parm == 1){
    form02.marginTop = "-135%";
} else {
  form02.marginTop = "20%";
}
}
}
