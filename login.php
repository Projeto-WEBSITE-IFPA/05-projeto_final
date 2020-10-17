<!DOCTYPE html>

<?php 

    require_once 'classes/usuarios.php';
    $u = new Usuario;
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagens/favicon.ico">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="login.css">
    <title>IFPA Tech</title>
</head>
<body>
    <div class="topo">
        <h1>IFPA TECH</h1>
    </div>  
    <ul class="menu">
        <a href="index.php" class="buscar">BUSCAR</a>      
        <a href="carrinho.php" class="img_1"><img src="imagens/carrinho.png" height="50px" width="50px"></a>
        <a href="login.php" class="img_2"><img src="imagens/login.png" height="50px" width="50px"></a>
    </ul>
    <div id="login-container">
        <h1>Entrar</h1>
        <form method="post">
            <input type="email" name="email" id="email" placeholder="Usuário E-mail" autocomplete="off">
            <input type="password" name="senha" id="password" placeholder="Senha">
            <a href="recuperar_senha.php" id="forgot-pass">Esqueceu a senha?</a>
            <input type="submit" value="Login">
        </form>

        <div id="register-container">
            <p>Ainda não tem acesso? <a href="cadastro_funci.php">Cadastre-se!</a></p>
        </div>

    </div>
    <div class="rodape">

        <h4> &copy; IFPA TECH - 2020</h4>
    </div>       


<!-- Aqui vai o backend da página de login-->

    <?php

    if(isset($_POST['email'])) {
        
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        
        //verifica se está preenchido
        if(!empty($email) && !empty($senha)) {
    
            $u->conectar("loginbd","localhost","root","");
            if($u->msgErro == "") {
                
                if($u->logar($email,$senha)) {
    
                    header("location: areaPrivada.php");
    
                } else {
    
                    ?>
    
                    <div class="msg-erro">
                        E-mail e/ou senha estão incorretos!
                    </div>
    
                    <?php
                }
    
            } else {
    
                ?>
    
                    <div class="msg-erro">
    
                    <?php echo "Erro: ".$u->msgErro; ?>
    
                    </div>
    
                <?php
            }
    
        } else {
    
                    ?>
    
                    <div class="msg-erro">
                        Preencha todos os campos!
                    </div>
                    
                    <?php
            }
    }
    ?>



</body>
</html>