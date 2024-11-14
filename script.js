

const selects = document.getElementsByTagName('select');
const btnMenu = document.getElementById('botao-menu-area-trabalho');

const mesesAno = [
  "Janeiro", "Fefereiro", "Março",
  "Abril", "Maio", "Junho",
  "Julho", "Agosto", "Setembro",
  "Outubro", "Novembro", "Dezembro" 
];

const menu = document.querySelector('header');
    const aside = document.querySelector('aside');
    const article = document.querySelector('article');


    function sair(){
      article.style.flexGrow= "0";
      aside.style.marginLeft = "-20%";
      setTimeout(() => {

        article.style.marginRight = "-80%";        

        setTimeout(() => {

          menu.style.marginTop = "-15vh";

          setTimeout(() => { window.location.replace('index.html'); }, 2000);

        }, 1000);
      }, 500);
    }




let larguraTelaTotal = null;
 setInterval(TamanhoTela, 1);

 function TamanhoTela(){
     larguraTelaTotal = screen.width;
 
 }


let idMenu = document.getElementById('menu-lateral');

if(larguraTelaTotal >= 480){
    idMenu.style.width = "0vw";
} else {
    idMenu.style.width = "15vw";
}


function moverMenu(){
    let largura = idMenu.style.width;
    var maxMenu = "";
var minMenu = "";
    if(larguraTelaTotal <= 480){
        
        maxMenu = "80vw";
        minMenu = "0vw";
        if(largura == maxMenu){
          btnMenu.innerHTML= '<img src="img/seta-direita.png">';
            idMenu.style.width = minMenu;
        } else {
          btnMenu.innerHTML= '<img src="img/seta-esquerda.png">';
            idMenu.style.width = maxMenu;
        }
    } else {
        
        maxMenu = "15vw";
        minMenu = "5vw";
        if(largura == maxMenu){
          btnMenu.innerHTML= '<img src="img/seta-direita.png">';
            idMenu.style.width = minMenu;
        } else {
          btnMenu.innerHTML= '<img src="img/seta-esquerda.png">';
            idMenu.style.width = maxMenu;
        }
    }
}

    

    function infoLabel(indice){
      let classLabel = document.getElementsByClassName('label-info');
      let alturaLabel = classLabel[indice].style.height;
      if(alturaLabel == "40%" ){
        classLabel[indice].style.height = "0%";
        classLabel[indice].style.padding = "0%";
      } else {
        classLabel[indice].style.height = "40%";
        classLabel[indice].style.padding = "1%";
      }
    }
  

   
    



  function diasMes(numeroMes, bissexto) {
    var qntDias = 0;
    switch (numeroMes) {
      case 1:
      case 3:
      case 5:
      case 7:
      case 8:
      case 10:
      case 12:
        qntDias = 31;
        break;
      case 4:
      case 6:
      case 9:
      case 11:
        qntDias = 30;
        break;
      case 2:
        if (bissexto == true) {
          qntDias = 29;
        } else {
          qntDias = 28;
        }
        break;
      default:
        qntDias = "";
    }
    return qntDias;
  }



  function eBissexto(ano) {
    let resto = ano % 4;
    if(resto == 0){
      return true;
    } else {
      return false;
    }
  }

  let parmMargin = 0;
  let contFunction = 0;
  function moverMeses(direcao) {
    parmData = new Date();
    parmData01 = parmData.getMonth() + 1;
    let idMes = document.getElementById('mes-' + parmData01);
    // console.log(parmData01);
    let parm = (-200/12)*11 + "%";
    let marginMes = idMes.style.marginLeft;
    if(direcao == 'direita'){
      if(contFunction != 11){
        parmMargin -= 200/12;
        idMes.style.marginLeft = parmMargin + '%';
        contFunction++;
        // alert(parmMargin);
       
        
      }
    } else {
      if(contFunction != 0){
        parmMargin += 200/12;
        idMes.style.marginLeft = parmMargin + '%';
        contFunction--;

       
      }
      
    }
    
  }
  
  function inserirCampo(){
    let status = document.getElementById(selectStatus);
    // if(status != null && status != ""){
      
    // }
    alert(status.value);
    
  }''

    function posicaoDosDias(){
      let dataAtual = new Date();
      let dia = 1;
      let mes = 1;
      for(mes; mes <= 12; mes++){
        

          var test = new Date(dataAtual.getFullYear(), mes-1, 1);
          console.log(test);
          
          document.getElementById("dia-"+mes+"-1").style.gridColumnStart = test.getDay() + 1;

        
        dia = 1;
      }
    }

    function inserInput(){

      let valueSelect = document.querySelector('#select-status').value;
      let classDiv = document.getElementsByClassName('input-final');
      let labelInput = "";
      let nameInput = "";
      let tipoInput = "";

      // alert(valueSelect);

      if(valueSelect != 4){

      switch(Number(valueSelect)){
        case 3: 
        
        labelInput = "Fim da última lactação ?";
        nameInput = "fim-da-lactacao";
        tipoInput = "date";

        break;
        case 1: 
        
        labelInput = "Meses de gestação";
        nameInput = "mes-de-gestacao";
        tipoInput = "number";
        break;
        case 2: 
        
        labelInput = "Data do último parto";
        nameInput = "ultimo-parto";
        tipoInput = "date";
        
        break;
        default: labelInput = "erro";
        break;
      }

      classDiv[0].innerHTML = ""+
      "<label class='label-cad' onclick='infoLabel(1)' >"+ labelInput +"</label>"+
      "<div class='label-info'></div>"+
      "<input type='" + tipoInput + "' class='inputs-cad-animal' name='"+ nameInput +"'></input>";
      
      }
      
    }

    let contErroLogin = 0;

    function errologin(){

    let idBoxErro = document.getElementById('erro-login');
      

        idBoxErro.style.width = '100%';
        

        setTimeout(function(){

          idBoxErro.style.width = '0%';
        

        }, 2000);
    }

   
    // function erroLogin(){
    //   let idBox = document.getElementById('erro-login');
      

    //     idBox.style.flexWrap
    //     idBox.style.height = "100%";

    //     setTimeout(function(){

    //       idBox.style.width = "0%";
    //     idBox.style.height = "0%";

    //     }, 3000);
     
    // }
