const checks =  document.querySelectorAll('.checks');
const botao = document.getElementById('btn-Imprimir');
const formImprimir = document.getElementById('form-imprimir');
let contFuncton = 0;
// console.log(checks);

// const botaoPDF = document.querySelector('#generate-pdf');


function gerarPDF() {
  
 const content = document.getElementsByClassName('conteudo');
 
 let i = 0;
 
 for(i; i <= 2; i++){
    const options = {
   
        //   margin : [5, 5, 5, 5],
        filename : 'relatorio'+i+'.pdf',
         html2canvas : { scale : 2},
           jsPDF : {unit: 'mm', format:'a4', orientation: 'portrait',},
         }
 html2pdf().set(options).from(content[i]).save();
 }
  
};

function seleceionarChecks(){ 

    let i = 0;

    if(contFuncton == 0){

        botao.innerHTML = "Imprimir";
        
        for(i; i <= checks.length-1; i++){
            checks[i].style.display = 'block';
        }

        contFuncton = 1;

    } else {

        let parm = 0;

        botao.innerHTML = "Selecionar para imprimir";


        for(i; i <= checks.length-1; i++){

            if(checks[i].checked == true){
                parm++;
            }


        }

        i = 0;

        if(parm > 0){

            alert('imprir?');

            // const arrayIds = [];

            let tamanhoArray = checks.length;
            formImprimir.innerHTML += 
                `<input type="checkbox" name="tA" checked value="${tamanhoArray}">`
            ;

            for(i; i <= checks.length-1; i++){

                if(checks[i].checked == true){

                    // arrayIds.push(checks[i].value);
                    formImprimir.innerHTML += 
                    `<input type="checkbox" name="${i}" checked value="${checks[i].value}">`
                    ;
                    
                }


                formImprimir.submit();

            }     
            

        } else {

            

            for(i; i <= checks.length-1; i++){
                checks[i].style.display = 'none';
            }

        }

        contFuncton = 0;

     } 
    
}

const inputs = document.getElementsByClassName('inputs');
        const boxs = document.getElementsByClassName('box-animal');
        const btn =  document.getElementById('btn');
        let contFunc = 0;
        let sta;
        let color;

        function selecionarTudo(){
            
            if(contFunc == 0){
                sta = true;
                contFunc = 1;
                // color = "rgb(173, 209, 209)";
            } else {
                sta = false;
                contFunc = 0;
                // color = "rgb(223, 243, 243)";
            }

            let i = 0;
            for(i; i < boxs.length; i++){
                inputs[i].checked = sta;
                selecionar(i);
                // boxs[i].style.background = color;
            }


        }

        function selecionar(posicao){

            if(inputs[posicao].checked == true){
                btn.style.display = "block";
                boxs[posicao].style.backgroundColor = "rgb(180, 210, 200)";
            } else {
                boxs[posicao].style.backgroundColor = "rgb(198, 230, 210)";
            }

            let checkeds = 0;

            for(i of inputs){
                if(i.checked == true){
                    checkeds++;
                }
            }

            // if(checkeds == 0){

            //     btn.style.opacity = "none";

            // }

        }

 

        const caminhoDoc = window.location.pathname;
        const nomeDoc = caminhoDoc.substring(8, caminhoDoc.length);

        if(nomeDoc == "imprimir.php"){

    

        let ang = 0;

        setInterval(() => {
            
            document.getElementById('boll').style.background = "linear-gradient("+ang+"deg, rgb(66, 177, 134), white)";
            ang += 36;

            if(ang > 360){
                ang = 0;
            }

        }, 100);

        }
