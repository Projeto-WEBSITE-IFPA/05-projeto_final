<!DOCTYPE html>

<?php 

    require_once 'classes/usuarios.php';
    $user = new Usuario;

?>

<html>
<head>
	<meta charset="utf-8">
    <title>Cadastro Funcionario Ifpatech</title>
    <link rel="shortcut icon" href="imagens/favicon.ico">
	<link rel="stylesheet" type="text/css" href="cadastro_funci.css">
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
    <div class="corpo">
        <div class="esquerda">
            <img src="imagens/desktop.png" alt="" width="200px" height="200px">
        </div>
        <div class="centro">
            <h3>Cadastro Funcionários</h3>
            <form id="funcionarios" method="post">
                <table>
                    <tr> 
                        <td>Nome: </td><td><input type="text" name="campo_nome" id="cmpNm"></td>
                        </tr>
                        <tr>
                            <td>Telefone: </td><td><input type="text" name="campo_telefone" id="cmpTel"></td>
                        </tr>
                        <tr>
                            <td>Endereço: </td><td><input type="text" name="campo_endereco" id="cmpEnd"></td>
                        </tr>
                        <tr>
                            <td>Nascimento: </td><td><input type="text" name="campo_nascimento" id="cmpNasc"></td>
                        </tr>
                        <tr>
                            <td>E-mail: </td><td><input type="text" name="campo_email" id="cmpMail"></td>
                        </tr>
                        <tr>
                            <td>Senha: </td><td><input type="text" name="campo_senha" id="cmpSen"></td>
                        </tr>
                        <tr>
                            <td>Confirmar Senha: </td><td><input type="text" name="campo_conf_senha" id="cmpConfSen"></td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="SALVAR"></td><td></td>
                        </tr>
                </table>
            </form>
        </div>
    </div>
    <div class="rodape">
        <h4> &copy; IFPA TECH - 2020</h4>
    </div>
    
    <?php
    //verifcar se clicou no botão
    if(isset($_POST['campo_nome'])) {
        $nome = addslashes($_POST['campo_nome']);
        $telefone = addslashes($_POST['campo_telefone']);
        $endereco = addslashes($_POST['campo_endereco']);
        $data_nascimento = addslashes($_POST['campo_nascimento']);
        $email = addslashes($_POST['campo_email']);
        $senha = addslashes($_POST['campo_senha']);
        $confirmarSenha = addslashes($_POST['campo_conf_senha']);

        //verifica se está preenchido
        if(!empty($nome) && !empty($telefone) && !empty($endereco) && !empty($data_nascimento) && !empty($email) && !empty($senha) && !empty($confirmarSenha)) {

            $user->conectar("loginbd","localhost","root","");

            if($user->msgErro == "") { //se está tudo ok

                if($senha == $confirmarSenha) {

                    if($user->cadastrar($nome,$telefone,$endereco,$data_nascimento,$email,$senha)) {

                        ?>

                        <div id="msg-sucesso">

                            Cadastrado com sucesso. Acesse para entrar!

                        </div>

                        <?php

                    } else {

                        ?>

                        <div class="msg-erro"> 
                            
                            E-mail já cadastrado! 

                        </div>

                        <?php
                    }

                } else {

                        ?>

                        <div class="msg-erro"> 
                            
                            Senha e Confirmar Senha não correspondem!

                        </div>

                        <?php
                    
                }
                
            } else {

                    ?>

                        <div class="msg-erro">
                            <?php echo "Erro: ".$user->msgErro; ?>
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