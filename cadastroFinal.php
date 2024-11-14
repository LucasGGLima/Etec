<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="body-center">
<div class="box-principal-cadastro">

    <?php

    include 'conexao.php';
    include 'script.php';

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

    echo "'Dados cadastrados com sucesso'";
    
    session_destroy();


}catch(PDOException$erro){

    echo"Erro: ". $erro ->getMessage();

}

?>
    <a href="login.php">logar</a>

</div>

</body>
</html>