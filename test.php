<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="animal.css">
    <link rel="stylesheet" href="estilo-pag-inicial.css">
    

    
</head>
<body>
    <form action="test.php" method="post">

<input type="password" name="senha" required>
<input type="submit" value="salvar">
</form>
<main>

        
    
    <?php


if(isset($_POST['senha'])){

    $senha = $_POST['senha'];


    $senha_cripto = password_hash($senha, PASSWORD_DEFAULT);
    

    echo $senha . "<br>";
        
    echo $senha_cripto . "<br>";

    if(password_verify($senha, $senha_cripto)){
        echo "senha certa";
    } else {
        echo "senha errada";
    }
}
    ?>

</main>
<script src="script.js"></script>
        <script>



    


        </script>
</body>

</html>