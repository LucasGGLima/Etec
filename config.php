<?php 

include 'script.php';
include 'conexao.php';
session_start();

$id_usuario = $_SESSION['id_usuario'];
$nome = $_SESSION['nome'];


$selectInfos = "SELECT * FROM tb_usuario WHERE id_usuario = ?";

$stmUser = $con ->prepare($selectInfos);

$stmUser -> bindParam(1, $id_usuario);

$stmUser -> execute();

$res = $stmUser->fetchAll();
$dadosUser = $res[0];

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> | Página de Configurações</title>
    <link rel="stylesheet" href="css/estilo-pag-inicial.css">
    <link rel="shortcut icon" href="img/alerta.png" type="image/x-icon">
    <style>
        #box-config {

            display: flex;

        }

        .item-config {
            /* border: solid 1px; */
            height: 100%;
            width: 50%;
            display: flex;
            flex-direction: column;
        }

        .dados-pessoais {

            border-right: 1px gray solid;
        }

        .dados-pessoais>form {
            /* border: solid 1px; */
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            padding: 1%;

        }

        .dados-pessoais .item-form {
            display: flex;
            flex-direction: column;
            /* border: 1px solid; */
            height: 15%;
        }

        .dados-pessoais .item-form>input {
            height: 40%;
            padding: 1%;
            border: solid 1px gray;
            border-radius: 10px;
            outline: none;
        }

        .dados-pessoais .item-form>input:not(:read-only) {
            background-color: rgb(242, 255, 251);
        }

        .item-config button {
            background-color: rgb(186, 240, 222);
            border-radius: 10px;
            border-width: 0px;
            padding: 0.7vw;
            width: 5vh;
            height: 5vh;
            transition: 0.5s;
        }

        .item-config button img {
            width: 100%;
        }

        .item-config button:hover {

            background-color: rgb(98, 196, 183);


        }

        h2 {
            background: linear-gradient(90deg, rgb(137, 202, 183), white);
            padding: 1%;
            border-radius: 5px;
        }

        .configs-geral {
            padding-left: 1%;
        }

        .configs-geral>div {
            /* border: solid 1px; */
            height: calc(100%/3);
        }

        .configs-geral>div {
            display: flex;
            flex-direction: column;
        }

        .configs-geral>div>section {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            flex-grow: 1;

            padding-left: 2%;
            /* border: solid 1px; */
        }

        #box-conta {
            /* flex-direction: row; */
        }

        #box-conta > div, #box-ajuda > div {
            padding: 2%;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-around;
        }

        #box-ajuda{
            justify-content: flex-start;
        }

        #box-ajuda p{
            padding: 2%;
        }

        #box-conta > div > div{
            display: flex;
            align-items: center;
            justify-content: flex-start;
            /* border: solid 1px; */
            width: calc(100%/3);
        }

        #box-conta p {
            margin-right: 2%;
        }

        #box-conta button {
            padding: 0.7vw;
        }
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
                <li id="box-usuario-menu-lateral">
                    <img src="img/conta.png">
                    <p>
                        <?php echo $nome; ?>
                    </p>

                </li>
                <li class="item-menu-lateral">
                    <img src="img/img-home.png" onclick="moverMenu()" class="img-item-lateral">
                    <a href="home.php">Home</a>
                </li>
                <li class="item-menu-lateral">
                    <img src="img/icon-vaca-lateral.png" onclick="moverMenu()" class="img-item-lateral">
                    <a href="animais-cadastrados.php">Animal</a>
                </li>
                <li class="item-menu-lateral">
                    <img src="img/img-cad.png" onclick="moverMenu()" class="img-item-lateral">
                    <a href="cadastrar-animal.php">Cadastrar</a>
                </li>
                <li class="item-menu-lateral pg-ativa">
                    <img src="img/img-config.png" class="img-item-lateral">
                    <a href="config.php">Configurações</a>
                </li>

            </ul>
            <button id="botao-menu-area-trabalho" onclick="moverMenu()">
                <img src="img/seta-esquerda.png">
            </button>

        </aside>

        <article class="article-pag" id="box-config">
            <div class="item-config dados-pessoais">
                <h2>Dados pessoais</h2>
                <form>
                    <div class="item-form">
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>" readonly>
                    </div>

                    <div class="item-form">
                        <label for="sobrenome">Sobrenome:</label>
                        <input type="text" id="sobrenome" name="sobrenome" value="<?php echo $dadosUser['sobrenome'];?>" readonly>
                    </div>

                    <div class="item-form">
                        <label for="data-nascimento">Data de Nascimento:</label>
                        <input type="date" id="data-nascimento" name="data-nascimento" value="<?php echo $dadosUser['data_nasc'];?>" readonly>
                    </div>

                    <div class="item-form">
                        <label for="telefone">Telefone:</label>
                        <input type="text" id="telefone" name="telefone" value="<?php echo $dadosUser['telefone'];?>">
                    </div>

                    <div class="item-form">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="<?php echo $dadosUser['email'];?>">
                    </div>

                    <button type="button" onclick="toggleEdit()" id="btn-alter-dados">
                        <img src="img/icon-editar.png">
                    </button>
                </form>
            </div>

            <div class="item-config configs-geral">

                <div id="box-nots">
                    <h2>Notificações</h2>
                    <section>
                        <div class="item-sect">
                            <label for="email-notificacoes">Receber notificações por email:</label>
                            <input type="checkbox" id="email-notificacoes" name="email-notificacoes">
                        </div>

                        <div class="item-sect">
                            <label for="sms-notificacoes">Receber notificações por SMS:</label>
                            <input type="checkbox" id="sms-notificacoes" name="sms-notificacoes">
                        </div>

                        <button>
                            <img src="img/icon-salvar.png">
                        </button>
                    </section>
                </div>

                <div id="box-ajuda">
                    <h2>Ajuda</h2>
                    <p>Para mais informações entre em contato com nossa equipe:</p>
                    <div>
                        
                            <button>
                                <img src="img/envelope.png">
                            </button>
                        
                            <button>
                                <img src="img/whatsapp.png">
                            </button>
                        
                            <button>
                                <img src="img/instagram.png">
                            </button>
                    </div>

                </div>

                <div id="box-conta">
                    <h2>Conta</h2>
                    <div>
                        <div>
                            <p>Trocar de conta</p>
                            <button>
                                <img src="img/users.png">
                            </button>
                        </div>
                        <div>
                            <p>Adicionar conta</p>
                            <button>
                                <img src="img/user-add.png">
                            </button>
                        </div>
                        <div>
                            <p>Sair </p>
                            <button onclick="sair()">
                                <img src="img/exit.png">
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </article>
    </main>
    <script src="script.js"></script>

    <script>

        const inputs = ['telefone', 'email'];
        for (i of inputs) {
            document.getElementById(i).readOnly = true;
        }

        function toggleEdit() {

            inputs.forEach(id => {
                const input = document.getElementById(id);
                input.readOnly = !input.readOnly;
                input.style.border = 'solid green 2px';
                const btn = document.getElementById('btn-alter-dados');
                btn.innerHTML = '<img src="img/icon-salvar.png">';
                if (!input.readOnly) {
                    input.focus();
                }

                if (input.readOnly == true) {
                    btn.innerHTML = '<img src="img/icon-editar.png">'
                    input.style.border = '';
                }
            });
        }

    </script>
    <script src="script.js"></script>
</body>

</html>