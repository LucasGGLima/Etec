<?php
include 'script.php';
include 'conexao.php';
session_start();
$nome = $_SESSION['nome'];
if(isset($_POST['id_vaca'])){

    $_SESSION['id_vaca'] = $id_vaca = $_POST['id_vaca'];
    // echo "sim";

} else {

    // echo "nao";

    $id_vaca = $_SESSION['id_vaca'];

}
    



$dadosAnimal = select_ciclo_animal($id_vaca);

// print_r($dadosAnimal);


$arrayVaca01 =  $dadosAnimal[0];

$arrayVaca = $arrayVaca01[0];

$arrayCiclo = $dadosAnimal[1];

$cicloAtual = $arrayCiclo[0];

// print_r($arrayCiclo);

$status_animal = $cicloAtual['status_animal'];

$method = 2;
$data01 = Date('Y-m-d');
$unidade = $quant = 0;

switch($status_animal){
    case 1:
        $data02 = $cicloAtual['parto_previsto'];
    break;

    case 2:
        $data02 = $cicloAtual['fim_da_lactacao'];
    break;
    case 3:
        $data02 = $cicloAtual['fim_da_transicao'];
    break;
    case 4:
        $data02 = $cicloAtual['data_cio'];
    break;
}

$infoStatus = selectStatus($status_animal);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animal.css">
    <link rel="stylesheet" href="css/estilo-pag-inicial.css">
    <title>Document</title>
    <style>
        
    </style>
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
                <li class="item-menu-lateral  pg-ativa">
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
        <article class="article-pag" id="box-animal">

            <div class="boxs infos-animal">
                <img src="img/img-animal.jpg" class="img-infos-animal">
                <div class="text-infos-animal">
                    <!-- <?php print_r($arrayVaca);?> -->
                    <p class="dados-animal">Nome: <?php echo $arrayVaca['nome_animal'];    ?> </p>
                    <p class="dados-animal b-l">Código: <?php echo $arrayVaca['cod_animal'];    ?> </p>
                    <p class="dados-animal">Idade: <?php echo $arrayVaca['idade'];  ?> </p>
                    <p class="dados-animal b-l">Espécie: <?php echo $arrayVaca['especie'];  ?> </p>
                    <p class="dados-animal">Data de nascimento: <?php echo $arrayVaca['data_nasc'];     ?> </p>
                    <p class="dados-animal b-l">Data de Cadastro: <?php echo $arrayVaca['data_cad'];    ?> </p>
                   
                </div>
            </div>

            <div class="boxs box-info-status">

                <div>
                    <div class="info-status">
                        <h2>Estágio atual: <?php echo $infoStatus[0]; ?></h2>
                        <p> <?php echo $infoStatus[1]; ?> </p>
                    </div>
                    <form action="atualizar.php" method="post" >
                        <input type="radio" name="sd" checked class="oculto" value="<?php echo $status_animal ?>">
                        <p> Confirme aqui o avanço de estágio do animal!</p>
                        <p> Clicando no botão abaixo você estará cofirmando que o animal avançou de 
                            estágio.
                        </p>
                        <button type="submit">Avançar estágio</button>
                    </form>

                    <form action="imprimir.php" method="post">
                            <p>Deseja imprimir um relatório do animal?
                            </p>
                            <p>Clicando no botão abaixo você vai gerar um PDF com os detalhes do clico 
                                produtivo do animal desde seu registro.</p>                  
                        <button id="">Gerar Relatório</button>
                        <input type="checkbox" name="tA" checked class="oculto" value="1">
                        <input type="checkbox" name="0"  checked class="oculto" value="<?php echo $id_vaca; ?>">
                    </form>
                    
                </div>

</div>        

            
           
            
            
            <div class="boxs box-calendario">

                <button class="center botao-calendario esquerdo" onclick="moverMeses('esquerda')">
                    <img src="img/seta-esquerda.png">
                </button>
                <div id="calendario">

                <div id="ano">

                <?php
                
                
                calc_data($method, $data01, $data02, $unidade, $quant, $status_animal);
                
                ?>
                
                </div>

                </div>
                <button class="center botao-calendario direito" onclick="moverMeses('direita')">
                    <img src="img/seta-direita.png" alt="">
                </button>
            
            </div>
            <ul id="box-legenda">
                <li>
                    <div class="color-leg gestacao"></div>
                    <p>Em gestacso</p>
                </li>
                <li>
                    <div class="color-leg lactacao"></div>
                    <p>Em lactação</p>
                </li>

                <li>
                    <div class="color-leg periodo-seco"></div>
                    <p>Em periodo seco</p>
                </li>

                <li>
                    <div class="color-leg cio"></div>
                    <p>Em período fertíl</p>
                </li>


            </ul>

        </article>
    </main>
    <script src="script.js"></script>
    <script> posicaoDosDias();</script>
</body>

</html>