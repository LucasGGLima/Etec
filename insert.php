<?php

start_session();
include 'conexao.php';

try{
    $comando = 
    "insert into usuarios
    (nome, sobrenome, sexo, telefone, data_nasc, email, senha)
     VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    $s = $con ->prepare($comando);
    $s ->bindParam(1,$_SESSION['nome']);
    $s ->bindParam(2,$_SESSION['sobrenome']);
    $s ->bindParam(3, $_SESSION['sexo']);
    $s ->bindParam(4,$_SESSION['data_nasc']);
    $s ->bindParam(5,$_SESSION['tel']);
    $s ->bindParam(6, $_SESSION['email']);
    $s ->bindParam(7,$_SESSION['senha']);
    

    $s->execute();

    echo "Dados cadastrados com sucesso!";

}catch(PDOException$erro){

    echo"Erro: ". $erro ->getMessage();

}

?>