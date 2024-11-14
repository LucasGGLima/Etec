<?php

include 'conexao.php';
include 'script.php';
 
session_start();
$nome = $_SESSION['nome'];
$email = $_SESSION['email'];
$id_usuario = $_SESSION['id_usuario'];

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animais-cads.css">
    <link rel="stylesheet" href="css/estilo-pag-inicial.css">
    <title>Document</title>

</head>

<body>
<header>
        <img src="img/logo.png" class="logo-menu">
            <button id="botao-menu-mobile" onclick="moverMenu()">X</button>

</header>
<main id="box-principal">
        <aside id="box-menu-lateral">
            <ul id="menu-lateral">
                <li  id="box-usuario-menu-lateral">
                    <img src="img/conta.png">
                     <p><?php echo $nome; ?></p> 
                    
                </li>
                <li class="item-menu-lateral">
                    <img src="img/img-home.png" onclick="moverMenu()"  class="img-item-lateral">
                    <a href="home.php">Home</a>
                </li>
                <li class="item-menu-lateral pg-ativa">
                    <img src="img/icon-vaca-lateral.png" onclick="moverMenu()" class="img-item-lateral">
                    <a href="animais-cadastrados.php">Animal</a>
                </li>
                <li class="item-menu-lateral">
                    <img src="img/img-cad.png" onclick="moverMenu()" class="img-item-lateral">
                    <a href="cadastrar-animal.php">Cadastrar</a>
                </li>
                <li class="item-menu-lateral">
                    <img src="img/img-config.png" class="img-item-lateral">
                    <a href="config.php">Configuraçoes</a>
                </li>

            </ul>
            <button id="botao-menu-area-trabalho" onclick="moverMenu()">
                <img src="img/seta-esquerda.png">
            </button>

        </aside>
        <article class="article-pag" id="box-animais-cadastrados">

        <?php



try{
    $sqlSelect = "SELECT * FROM tb_vaca WHERE id_usuario = ? ORDER BY id_vaca DESC";

    $stm = $con ->prepare($sqlSelect); 
    $stm ->bindParam(1, $id_usuario);    
    
    $stm->execute();

    $res = $stm->fetchAll();


//    print_r($res);

    // echo print_r($res);

    if($res == null || $res == "Array()"){
        echo "
            <div>
                <img src='img/cercass.png' id='img-vazio'>
                <p id='text-vazio'>Você não tem animais registrados! <a href='cadastrar-animal.php'>Cadastrar animais</a>.</p>
            </div>"
        ;

        echo "<style>

            article{
                display: flex;
                justify-content: center;
               align-items: center;
            }
        
        </style>";
    } else {

        echo "
        
        <div id='menu-animais-cads'>
        
        <button class='btns-menu-cad btn-imprimir' id='btn-Imprimir' onclick='seleceionarChecks()'>Selecionar para imprimir</button>
        <button class='btns-menu-cad btn-filtrar'>filtrar</button>
        <!-- <div id='box-btn'> -->
        <button  id='btn' class='oculto' onclick='selecionarTudo()'>Selecionar tudo</button>
         
    <!-- </div> -->


        </div>
        
        ";

        echo "
        
            <form action='imprimir.php' method='post' id='form-imprimir'>
            
            <button id='botao-imprimir' class='oculto'></button>
            </form>

            <section id='box-geral'>
        ";

     
    $posição = 0;        


    foreach($res as $rows){

        
     

        // echo $rows['id_vaca'];
       echo " 
       
        
            <div class='box-animal'>
            <form>
               <input type='checkbox' class='oculto checks inputs' onchange='selecionar(".$posição.")' value='".$rows['id_vaca']."'>
                 </form>
                
                <img src='img/icon-animal-cad.png' class='img-animal-cad'>

                <div class='text-cad'>
                <p>Nome:  <span>" . $rows['nome_animal'] . " </span></p>
                <p>Especie: <span>" .  $rows['especie'] . " </span></p>
                <p>Data de Cadastro: <span>" . $rows['data_cad'] . " </span></p>
               </div>
                
                <form action='animal.php' method='post'>
                <input type='radio' checked class='oculto'  name='id_vaca' value='".$rows['id_vaca']."'>
               
                <button href='animal.html' class='link-animal center'  title='Detalhes do animal'>
                    <img src='img/setasss.png'>
                </button>  
                </form>  
            </div>
            
        ";

    $posição++;
        

    }

    echo " </section>";
}

}catch(PDOException$erro){
            
    echo "Erro: ". $erro ->getMessage();

}


                    ?>
        
                    
                    

    </article>
</main>
<script src="script.js"></script>
<script src="imprimir.js"></script>
</body>

</html>