<?php

include 'conexao.php';
include 'script.php';
 
// session_start();
// $nome = $_SESSION['nome'];
// $email = $_SESSION['email'];
session_start();
$id_usuario = $_SESSION['id_usuario'];
// $nome = $_SESSION['nome'];
// $email = $_SESSION['email'];

// if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nome_animal'])){
//     // if( $_POST['nome_animal'] != null){

//         echo  $_POST['nome_animal'];

    $data = Date("Y-m-d");

        try{

            $stmTbAnimal = $con ->prepare($sqlInsertAnimal);
    
            $stmTbAnimal ->bindParam(1, $id_usuario);
            $stmTbAnimal ->bindParam(2, $_POST['nome_animal']);
            $stmTbAnimal ->bindParam(3, $_POST['data-nasc-animal']);
            $stmTbAnimal ->bindParam(4, $_POST['idade-animal']);
            $stmTbAnimal ->bindParam(5, $_POST['peso']);
            $stmTbAnimal ->bindParam(6, $_POST['cod-animal']);
            $stmTbAnimal ->bindParam(7, $_POST['especie']);
            $stmTbAnimal ->bindParam(8, $data);
            // $stmTbAnimal ->bindParam(8, $_POST['status-animal']);

            $stmTbAnimal->execute();

        //    echo $id_usuario . "<br>";
        //    echo $_POST['nome_animal'] . "<br>";
        //    echo $_POST['data-nasc-animal'] . "<br>";
        //    echo $_POST['idade-animal'] . "<br>";
        //    echo $_POST['peso'] . "<br>";
        //    echo $_POST['cod-animal'] . "<br>";
        //    echo $_POST['especie'] . "<br>";
            


            
            $sqlSelect = "SELECT id_vaca FROM tb_vaca ORDER BY id_vaca DESC";
            
            $stmTbCiclo = $con ->prepare($sqlSelect);

            $stmTbCiclo->execute();
        
            $idVaca =  $stmTbCiclo->fetchColumn();

            $stmTbCiclo = null;          


            switch($_POST['status-animal']){

                case "3":
                $sqlInsertCiclo = "INSERT INTO tb_ciclo_animal (id_animal, status_animal, fim_da_lactacao) VALUES (?, ?, ?)";
                break;

                case "1":
                $sqlInsertCiclo = "INSERT INTO tb_ciclo_animal (id_animal, status_animal, parto_previsto) VALUES (?, ?, ?)";
                break;

                case "2":
                $sqlInsertCiclo = "INSERT INTO tb_ciclo_animal (id_animal, status_animal, ultimo_parto) VALUES (?, ?, ?)";
                break;	

                default: 
                echo "erro";
                break;
            
            }

            $stmTbCiclo = $con ->prepare($sqlInsertCiclo);

            $stmTbCiclo ->bindParam(1, $idVaca);
            $stmTbCiclo ->bindParam(2, $_POST['status-animal']);


            switch($_POST['status-animal']){

                case "3":
                $stmTbCiclo ->bindParam(3, $_POST['fim-da-lactacao']);       
                break;

                case "1":  
                $mes = 10 - $_POST['mes-de-gestacao'];
                $parmData = strtotime("+$mes months");
                $partoPrevisto = date('Y-m-d', $parmData);
                $stmTbCiclo ->bindParam(3, $partoPrevisto);
                break;

                case "2":
                $stmTbCiclo ->bindParam(3, $_POST['ultimo-parto']);
                break;

                default: echo "erro";
                break;
                    
            }

            
            // $stmTbCiclo ->bindParam(3, $idCiclo);
            // $stmTbCiclo = $con ->prepare($sqlSelect);

            

            $stmTbCiclo->execute();

            


            
            
        }catch(PDOException$erro){

            echo"Erro: ". $erro ->getMessage();

        }
        
        
        
        ?>

        <!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>
  
    </style>
</head>

<body>
<?php

echo "<script> window.location.replace('animais-cadastrados.php')</script>";
        
?>

</body>
</html>