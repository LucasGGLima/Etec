 <?php
    include 'conexao.php';



    // o ISSET  verifica se a varialvel existe e se não é nula 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
       
        
        try{
            $sqlSelect = "SELECT email, senha, nome, id_usuario FROM tb_usuario";

            $stm = $con ->prepare($sqlSelect);     
            
            $stm->execute();
        
            $res = $stm->fetchAll();

            // echo print_r($res);

            foreach($res as $rows){

                if(isset($_POST['email'])){

                    if($_POST['email'] == $rows['email'] && password_verify($_POST['senha'], $rows['senha'])){

                        session_start();
                        $_SESSION['nome'] = $rows['nome'];
                        $_SESSION['email'] = $rows['email'];
                        $_SESSION['id_usuario'] = $rows['id_usuario'];
                        echo "<script> window.location.replace('home.php')</script>"; 
                        
                    } else {

                        $senhaErrada = true;

                    }

                } else {
                    $senhaErrada = true;
                }
            }

            
            

        }catch(PDOException$erro){
            
            echo "Erro: ". $erro ->getMessage();
        
        }

    
       
    } 
    
?> 
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login | Boi Lab</title>
</head>
<body class="body-login body-center">

    <main class="box-principal-login box-2-x">

        <section id="erro-login">
            <img src="img/alerta.png">
            <p>Usuário ou senhas inválidos</p>
        </section>


        <div class="box-boilab">
            <img class="img-login" src="img/BOILAB.png" alt="logo da Boi Lab">
            <p>Acesse ou cadastre um conta para ter a Boilab em suas mãos </p>
        </div>


        <form action="login.php " method="POST" class="sub-box-login" id="forms" >
      
            
            
            <h2>Faça seu login</h2>
           

            <div class="box-inputs">
                <label for="email">Digite seu e-mail</label>
                <input type="email" name="email" class="input-login"  
                value=" <?php if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($senhaErrada)){echo $_POST['email'];}?>">
            </div>


            <div class="box-inputs">
                <label for="senha">Digite sua senha</label>
                <input type="password" name="senha" class="input-login">
            </div>

            <div class="box-botoes">
                <a href="cadastro.php">Cadastrar-se</a>
                <button  type="submit" class="botoes">Entrar</button>
            </div>

        </form>

    </main>
    <script>
        function errologin(){

let idBoxErro = document.getElementById('erro-login');
  

    idBoxErro.style.width = '100%';
    

    setTimeout(function(){

      idBoxErro.style.width = '0%';
    

    }, 2000);
}

    </script>
    
     <?php
    
        if(isset($senhaErrada)){
            echo "<script> errologin(); </script>";
        }
    
    ?> 
    <script src="script.js"></script>
</body>


</html>