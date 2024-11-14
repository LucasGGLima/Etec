const botao = document.querySelector('#generate-pdf');


botao.addEventListener('click', function () {
  
 const content = document.getElementsByClassName('tests');
 
 let i = 0;
 
 for(i; i <= 2; i++){
    const options = {
   
        //    margin : [5, 5, 5, 5],
           filename : 'relatorio'+i+'.pdf',
           html2canvas : { scale : 2},
           jsPDF : {unit: 'mm', format:'a4', orientation: 'portrait',},
         }
 html2pdf().set(options).from(content[i]).save();
 }
  
});