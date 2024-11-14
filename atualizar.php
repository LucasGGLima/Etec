<?php

include 'script.php';
include 'conexao.php';
// include 'conexao.php';
// include 'animal.php';
session_start();
$id_vaca = $_SESSION['id_vaca'];

$Animal = select_ciclo_animal($id_vaca);

$Animal01 = $Animal[1];

$dadosAnimal = $Animal01[0];

$nullData = "0000-00-00";

print_r($dadosAnimal);

switch($_POST['sd']){

    case 1:

        $atualNumLact = $dadosAnimal['num_gestacoes'] + 1;
        // echo $atualNumLact . "</br>";

        $atualStatus = $dadosAnimal['status_animal'] + 1;
        // echo $atualStatus . "</br>";

        $atualUltimoParto = date('Y-m-d');
        // echo $atualUltimoParto . "</br>";

        $atualPartoPrevisto = $nullData; 
        // echo $atualPartoPrevisto . "</br>";

        $parmData = strtotime("+10 months");
        // echo $parmData . "</br>";

        $atualFimlactacao = date("Y-m-d", $parmData);
        // echo $atualFimlactacao . "</br>";

        $insertAtualizar = "INSERT INTO tb_ciclo_animal
        (id_animal, num_gestacoes, status_animal, ultimo_parto, parto_previsto, fim_da_lactacao)
        VALUE (?, ?, ?, ?, ?, ?)
        ";        

        $stmCiclo = $con ->prepare($insertAtualizar);
        $stmCiclo -> bindParam(1, $id_vaca);
        $stmCiclo -> bindParam(2, $atualNumLact);
        $stmCiclo -> bindParam(3, $atualStatus);
        $stmCiclo -> bindParam(4, $atualUltimoParto);
        $stmCiclo -> bindParam(5, $atualPartoPrevisto);
        $stmCiclo -> bindParam(6, $atualFimlactacao);
    
        $stmCiclo -> execute();
        
    break;
    case 2:

        $atualStatus = $dadosAnimal['status_animal'] + 1;

        $atualFimlactacao = $nullData;

     

        $parmData = strtotime("+40 days");
       
        $atualUltimoParto = $dadosAnimal['ultimo_parto'];

        $parmData = strtotime("+62 days");
        $atualFimTransicao = Date("Y-m-d", $parmData);

        $insertAtualizar = "INSERT INTO tb_ciclo_animal 
            (id_animal, status_animal, ultimo_parto, fim_da_lactacao, fim_da_transicao)
            VALUE (?, ?, ?, ?, ?)
        ";

        $stmCiclo = $con ->prepare($insertAtualizar);
        $stmCiclo -> bindParam(1, $id_vaca);
        $stmCiclo -> bindParam(2, $atualStatus);
        $stmCiclo -> bindParam(3, $atualUltimoParto);
        $stmCiclo -> bindParam(4, $atualFimlactacao);
        $stmCiclo -> bindParam(5, $atualFimTransicao);
        

        $stmCiclo -> execute();
    break;
    case 3:

        $atualStatus = $dadosAnimal['status_animal'] + 1;

        $atualFimTransicao = $nullData;

        $atualUltimoParto = $dadosAnimal['ultimo_parto'];

        $parmData = strtotime("+14 days");
        $atualDataCio = Date("Y-m-d", $parmData);


        $insertAtualizar = "INSERT INTO tb_ciclo_animal 
            (id_animal, status_animal, ultimo_parto, fim_da_transicao, data_cio)
            VALUE (?, ?, ?, ?, ?)
        ";

        $stmCiclo = $con ->prepare($insertAtualizar);
        $stmCiclo -> bindParam(1, $id_vaca);
        $stmCiclo -> bindParam(2, $atualStatus);
        $stmCiclo -> bindParam(3, $atualUltimoParto);
        $stmCiclo -> bindParam(4, $atualFimTransicao);
        $stmCiclo -> bindParam(5, $atualDataCio);

        $stmCiclo -> execute();
        
    break;
    case 4:

        $atualStatus = "1";

        $atualDataCio = $nullData;

        $atualUltimoParto = $dadosAnimal['ultimo_parto'];

        
        $parmData = strtotime("+10 months");
        $atualPartoPrevisto = Date("Y-m-d", $parmData);
    

        

        $insertAtualizar = "INSERT INTO tb_ciclo_animal 
            (id_animal, status_animal, ultimo_parto, parto_previsto, data_cio)
            VALUE (?, ?, ?, ?, ?)
        ";

        $stmCiclo = $con ->prepare($insertAtualizar);
        $stmCiclo -> bindParam(1, $id_vaca);
        $stmCiclo -> bindParam(2, $atualStatus);
        $stmCiclo -> bindParam(3, $atualUltimoParto);
        $stmCiclo -> bindParam(4, $atualPartoPrevisto);
        $stmCiclo -> bindParam(5, $atualDataCio);

        $stmCiclo -> execute();


    break;
    default: 
    echo $_POST['sd'];
    // 
    break;
    

}

echo "<script>window.location.replace('animal.php')</script>";





