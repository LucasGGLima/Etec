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
    <link rel="stylesheet" href="css/cadastrar-animal.css">
    <link rel="stylesheet" href="css/estilo-pag-inicial.css">
    <title>Document</title>
</head>

<body>
<header>
        <img src="img/logo.png" class="logo-menu">
            <button id="botao-menu-mobile" onclick="moverMenu()">X</button>

</header>
<script>

    const inputData = document.getElementById('input-data');
    const inputIdade = document.getElementById('input-idade');
    const boxsInputs = document.getElementsByClassName('box-item-cad');
    const ouIdade = document.getElementsByClassName('p-idade');
    // const pData = document.getElementById

    function infoData(input){
        if(input == 0){
            boxsInputs[2].style.borderBottomWidth = "1px";
            boxsInputs[2].style.borderRadius = "10px";
            boxsInputs[3].style.display = "none";
            boxsInputs[2].style.backgroundColor = "rgb(238, 238, 238)";
            
        } else {
            boxsInputs[3].style.borderTopWidth = "1px";
            boxsInputs[3].style.borderRadius = "10px";
            boxsInputs[2].style.display = "none";
            boxsInputs[3].style.backgroundColor = "rgb(238, 238, 238)";
            ouIdade[0].style.display = "block";
        }
    }

    function selecionardata(pIdade){

        boxsInputs[3].style.display = "block";
        boxsInputs[2].style.display = "block";
        boxsInputs[3].style.borderBottomWidth = "";
        boxsInputs[3].style.borderRadius = "";
        boxsInputs[2].style.borderBottomWidth = "";
        boxsInputs[2].style.borderRadius = "";
        if(pIdade == 0){
            ouIdade[0].style.display = "none";
        }

    }



</script>
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
                <li class="item-menu-lateral">
                    <img src="img/icon-vaca-lateral.png" onclick="moverMenu()" class="img-item-lateral">
                    <a href="animais-cadastrados.php">Animal</a>
                </li>
                <li class="item-menu-lateral  pg-ativa">
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
        <article class="article-pag" id="pag-cad-animal">


            <h1>Cadastro de animal</h1>
            <form action="config-cad-animal.php" method="post" id="form-inserir-animal">
                
                <div class="form-cad-animal box01-form-cad">
                    


                    <div class="box-item-cad"> 
                        <label class="label-cad" for="nome_animal">nome</label>
                        <input type="text" name="nome_animal" class="inputs-cad-animal" required id="nome_animal">
                    </div>

                    <div class="box-item-cad"> 
                        <label class="label-cad" for="racas-de-vacas">especie</label>
                        <select id="racas-de-vacas" name="especie" class="inputs-cad-animal">
                            <option disabled selected>Selecionar espécie</option>
                            <option value="holandesa">Holandesa (Holstein-Friesian)</option>
                            <option value="jersey">Jersey</option>
                            <option value="ayrshire">Ayrshire</option>
                            <option value="guernsey">Guernsey</option>
                            <option value="pardo-suico">Pardo Suíço (Brown Swiss)</option>
                            <option value="gir-leiteira">Gir Leiteira</option>
                            <option value="simental">Simental (Simmental Fleckvieh)</option>
                            <option value="montbeliarde">Montbéliarde</option>
                            <option value="girolando">Girolando</option>
                            <option value="shorthorn-leiteiro">Shorthorn Leiteiro (Dairy Shorthorn)</option>
                            <option value="normando">Normando</option>
                            <option value="red-poll">Red Poll</option>
                            <option value="frisia-vermelha-e-branca">Frísia Vermelha e Branca</option>
                            <option value="milking-devon">Milking Devon</option>
                            <option value="dexter">Dexter</option>
                            <option value="kerry">Kerry</option>
                            <option value="canadienne">Canadienne</option>
                            <option value="illawarra">Illawarra</option>
                            <option value="murnau-werdenfels">Murnau-Werdenfels</option>
                            <option value="estoniana-vermelha">Estoniana Vermelha (Estonian Red)</option>
                        </select>
                    </div>
                    <div class="box-item-cad item-data-01"> 
                        <label class="label-cad">Data de Nascimento</label>
                        <input type="date" class="inputs-cad-animal" name="data-nasc-animal" onchange="infoData(0)" id="input-data">
                        <p onclick="selecionardata()" title="Você deve informar pelo menos um dos campos">OU</p>
                    </div>
                    <div class="box-item-cad item-data-02"> 
                        <p onclick="selecionardata(0)" class="p-idade" title="Você deve informar pelo menos um dos campos">OU</p>
                        <label class="label-cad">Idade</label>
                        <input type="number" class="inputs-cad-animal" name="idade-animal" onchange="infoData(1)" id="input-idade"> 
                    </div>
                    <div class="box-item-cad"> 
                        <label class="label-cad">Peso(@)   <span style="color:gray; background-color: rgb(223, 240, 255);">@ = 15Kg</span></label>
                        <input type="text" class="inputs-cad-animal" name="peso">
                    </div>





                </div>

                <div class="form-cad-animal box02-form-cad">

                    <div class="box-item-cad">
                        <label class="label-cad" onmouseout="infoLabel(0)">Código do animal ?</label>
                        <div class="label-info">Se você não sabe imagina eu...</div>
                        <input type="text" class="inputs-cad-animal"  name="cod-animal">
                    </div>

                    <div class="box-item-cad">
                        <label class="label-cad" onmouseout="infoLabel(1)" >Numero de lactações ?</label>
                        <div class="label-info">Se nem você sabe, imagina eu...</div>
                        <input type="text" class="inputs-cad-animal" name="num-lactacao">
                    </div>

                    <div class="box-item-cad">

                        <label class="label-cad" >Status do animal ?</label>
                        <div class="label-info">O animal não quer declarar</div>
                        <select class="inputs-cad-animal" id="select-status" onchange="inserInput()" name="status-animal">
                            <option disabled selected value="4">selecionar Status</option>
                            <option value="3">Em transição</option>
                            <option value="1">Em gestação</option>
                            <option value="2">Em lactação</option>
                        </select>

                    </div>

                    <div class="box-item-cad input-final">
                    </div>

                    <div class="box-botao botao-cad-animal box-item-cad">
                        <button id='botao-cad'>cadastrar</button>
                    </div>

                </div>

                <div class="testForm black"></div>
                <!-- <div class="testForm pink"></div>
                    <div class="testForm black"></div> -->
                <!-- <div class="testForm aqua"></div> -->
            </form>


            <!--<table>


                     
                
                    </table>-->

        </article>
    </main>
    <script src="script.js"></script>
    <!-- <script src="cadastrar-animal.js"></script> -->
</body>

</html>