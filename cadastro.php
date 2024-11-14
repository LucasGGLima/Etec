<?php
include 'conexao.php';
include 'script.php';

if(isset($_POST['email'])){

    $sqlSelect = "SELECT email FROM tb_usuario";

    $stm = $con ->prepare($sqlSelect);     
            
    $stm->execute();
    
    $arrayEmail = $stm->fetchAll();

    foreach($arrayEmail as $rows){

        if($rows['email'] == $_POST['email']){
                $emailExistente  = "Esse e-mail já existe!";
               echo "<script> window.history.back(); </script>";
        } else {

            try{

                $s = $con ->prepare($sqlInsertUsuario);
                
                $s ->bindParam(1,$_POST['nome']);
                $s ->bindParam(2,$_POST['sobrenome']);
                $s ->bindParam(3,$_POST['data_nasc']);
                $s ->bindParam(4,$_POST['tel']);
                $senha_cripto = password_hash($_POST['senha'], PASSWORD_DEFAULT); 
                $s ->bindParam(5, $senha_cripto);
                $s ->bindParam(6, $_POST['email']);
                
                $s->execute();
            
                // echo "Dados cadastrados com sucesso";
                echo "<script> alert('Conta cadastrada com sucesso!');
                         window.location.replace('login.php')</script>";

                
                session_destroy();
            
            
            }catch(PDOException$erro){
            
                echo"Erro: ". $erro ->getMessage();
            
            }
            
        }

    }    

}

// print_r($arrayEmail);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta required name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/cadastro.css">
    <link rel="stylesheet" href="css/estilo-pag-inicial.css">
    
</head>

<body>

    <header>
        <img src="img/logo.png" class="logo-menu">
    </header>
    <form action="cadastro.php" method="POST" id="form-cad">
        <div id="container-inputs">
            <div class="block-form" id="block-form-01">

                <h2>Criar conta</h2>

                <div class="box-inputs" >
                    <label for="nome">Nome</label>
                    <input class="input-cad" type="text" required name="nome" id="nome" oninput="validarTextos(0)">
                    <span class="alertas">o nome deve ter pelo menos três caractéres</span>
                </div>

                <div class="box-inputs">
                    <label for="sobrenome">sobrenome</label>
                    <input class="input-cad" type="text" required name="sobrenome" oninput="validarTextos(1)">
                    <span class="alertas">O sobrenome deve ter pelo menos três caractéres</span>
                </div>

                <div class="box-inputs">
                    <label for="sexo">Sexo</label>
                    <select name="sexo" class="input-cad" id="sexo">
                        <option value="selecionar" disabled selected>selecionar</option>
                        <option value="masculino">masculino</option>
                        <option value="feminino">feminino</option>
                        <option value="outro">outro</option>
                    </select>
                    <span class="alertas"></span>
                </div>

                <div class="box-inputs">
                    <label for="data_nasc">Data de Nascimento</label>
                    <input class="input-cad" onchange="validarData()" type="date" required name="data_nasc">
                    <span class="alertas">Voce deve ter no mínimo 15 anos</span>
                </div>

                <div class="box-inputs box-bnts-forms-01">
                <p class="bnt-cad-forms" onclick="formCad(1)">&gt;</p>
            </div>
            </div>

            <div class="block-form" id="block-form-02">
                 <div class="box-inputs">
                    <label for="tel">telefone</label>
                    <input class="input-cad" type="text" id="cad-tel" onchange="mackTel()" required name="tel" placeholder="Sem dígitos a penas númesros">
                </div>

                <div class="box-inputs">
                    <?php 
                        if(isset($emailExistente)){
                            echo "<script> document.getElementById('block-form-02').style.zIndex = 2; </script>";
                        }
                    ?>
                    <label for="tel">email</label>
                    <input class="input-cad" type="email" required name="email">
                    <P>
                        <?php 
                            if(isset($emailExistente)){
                                echo $emailExistente;
                            }
                        ?>
                    </P>
                </div>

                <div class="box-inputs">
                    <label for="tel">senha</label>
                    <input class="input-cad" type="password" required name="senha">
                </div>

                <div class="box-inputs box-bnts-forms-02">
                    <p class="bnt-cad-forms" onclick="formCad(0)">&lt;</p>
                    <button type="submit" class="btn-ava">Avançar</button>
                </div>
                </div> 
            </div>
        </div>

    </form>
</body>
<script src="script.js"></script>
<script src="cadastro.js"></script>


</html>