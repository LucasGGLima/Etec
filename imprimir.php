 <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.2/html2pdf.bundle.min.js" integrity="sha512-MpDFIChbcXl2QgipQrt1VcPHMldRILetapBl5MPCA9Y8r7qvlwx1/Mc9hNTzY+kS5kX6PdoDq41ws1HiVNLdZA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="imprimir.js"></script>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Calibri', sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
            height: 100vh;
            width: 100%;
            overflow: hidden;
        }

        main {
            border: 1px solid #ddd;
            background-color: #fff;
            width: 100%;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            page-break-inside: avoid;
        }

        header {
            background: linear-gradient(to right, #b8e994, #fff);
            padding: 20px;
            text-align: center;
            border-radius: 10px 10px 0 0;
            margin-bottom: 20px;
        }

        .test{
            height: 100vh;
            width: 100%;
            display: flex;
            Justify-content: center;
            align-items: center;
        }

        #boll{
            display: flex;
            Justify-content: center;
            align-items: center;
            height: 20vh;
            width: 20vh;
            background: linear-gradient(90deg, black, white);
            border-radius: 50%;
            
        }

        .olsa{
            border-radius: 50%;
            display: flex;
            Justify-content: center;
            align-items: center;
            background-color: white;
            height: 80%;
            width: 80%;

        }



     
        header h2 {
            font-size: 1.8em;
            color: #333;
        }

        .infos-vaca, .ciclo-atual {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 10px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .infos-vaca h2, .ciclo-atual h2 {
            font-size: 1.5em;
            margin-bottom: 15px;
            color: #444;
        }

        .bloco-info h4 {
            font-size: 1.1em;
            color: #666;
            margin-bottom: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table, th, td {
            border: 1px solid #ddd;
            padding: 4px;
        }

        th{
            background-color: #f2f2f2;
            font-weight: bold;
            text-align: left;
        }

        td{
            font-size: 12px;
            text-align: left;
            color: #555;
        }

        /* Estilo para os ciclos anteriores */
        .ciclos-anteriores {
            margin-top: 20px;
        }

        /* Evita que as tabelas sejam quebradas entre páginas na impressão */
        @media print {
            main {
                width: 100%;
                border: none;
                box-shadow: none;
            }

            table {
                page-break-inside: avoid;
            }
        }
    </style>

</head>
<body>

<?php

include 'conexao.php';
include 'script.php';

    $i = 0;
    $arrayIds = [];

    echo "<div class='test'><div id='boll'><div class='olsa'>Imprimindo...</div></div></div>";

    for($i; $i <= $_POST['tA'] - 1; $i++){

        $dadosAnimal = select_ciclo_animal($_POST[$i]);

        $arrayVaca = $dadosAnimal[0];
        $arrayVaca = $arrayVaca[0];
        $arrayCiclo = $dadosAnimal[1];

        // print_r($dadosAnimal[0]);
        // print_r($dadosAnimal[1]);

        echo $_POST['tA'];



        echo " 

        <main class='conteudo'>

        <header>
            <h2>BoiLab - Relatório de Animal</h2>
        </header>

        <div class='infos-vaca'>

            <h2>Informações do animal</h2>
            
            <div class='bloco-info'>
                <h4>Nome: <span class='text-nomal'>".$arrayVaca['nome_animal']."</span></h4>
                <h4>Códico: <span class='text-nomal'>".$arrayVaca['cod_animal']."</span></h4>
                <h4>Tipo: Vaca</h4>
                <h4>Espécie: <span class='text-nomal'>".$arrayVaca['especie']."</span></h4>
                <h4>Idade: <span class='text-nomal'>".$arrayVaca['idade']."</span></h4>
                <h4>Data de registro: <span class='text-nomal'>".$arrayVaca['data_cad']."</span></h4>
            </div>
        </div>

        ";

       $arrayCicloAtual = $arrayCiclo[0];

       $infoStatus = selectStatus($arrayCicloAtual['status_animal']);
       

        echo "
       
        <div class='infos-vaca ciclo-atual'>
            <h2>Ciclo Produtivo Atual</h2>
            <table>
                <tr>
                    <th>Informação</th>
                    <th>Dados</th>
                </tr>
                <tr>
                    <td>Número de Gestações</td>
                    <td>".$arrayCicloAtual['num_gestacoes']."</td>
                </tr>
                <tr>
                    <td>Status do Animal</td>
                    <td>". $infoStatus[0] ."</td>
                </tr>
                <tr>
                    <td>Último Parto</td>
                    <td>".$arrayCicloAtual['ultimo_parto']."</td>
                </tr>
                <tr>
                    <td>Parto Previsto</td>
                    <td>".$arrayCicloAtual['parto_previsto']."</td>
                </tr>
                <tr>
                    <td>Fim da Lactação</td>
                    <td>".$arrayCicloAtual['fim_da_lactacao']."</td>
                </tr>
                <tr>
                    <td>Fim da Transição</td>
                    <td>".$arrayCicloAtual['fim_da_transicao']."</td>
                </tr>
                <tr>
                    <td>Data do Cio</td>
                    <td>".$arrayCicloAtual['data_cio']."</td>
                </tr>
                <tr>
                    <td>Dia da Fecundação</td>
                    <td>".$arrayCicloAtual['dia_da_fecundacao']."</td>
                </tr>
            </table>
        </div>
        ";
        

        echo "



        <div class='infos-vaca ciclo'>
        
            <h2>Ciclo Produtivo</h2>
            <table>
                <tr>
                <th> num gestacoes</th>
                <th> status</th>
                <th> ultimo parto</th>
                <th> parto previsto</th>
                <th> fim da lactacao</th>
                <th> fim da transicao</th>
                <th> data cio</th>
                <th> dia da fecundacao</th>
                <tr>
                </tr>

        ";

        foreach($arrayCiclo as $fase){

            $infoStatus = selectStatus($fase['status_animal']);

            echo "

            <tr>
                <td>". $fase['num_gestacoes']."</td>
                <td>". $infoStatus[0] ."</td>
                <td>". $fase['ultimo_parto']."</td>
                <td>". $fase['parto_previsto']."</td>
                <td>". $fase['fim_da_lactacao']."</td>
                <td>". $fase['fim_da_transicao']."</td>
                <td>". $fase['data_cio']."</td>
                <td>". $fase['dia_da_fecundacao']."</td>
            </tr>
            
            
            ";

        
        }

        echo "
            </table>
        </div>

</main>"
    ;

    echo "<script>gerarPDF();</script>";
    echo "<script> setInterval(()=> {window.location.replace('animais-cadastrados.php')}, 3000);</script>";

    


    }
?>


    
</body>
</html>


    