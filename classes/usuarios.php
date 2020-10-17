<?php

Class Usuario {

    private $pdo; //variável que será enxergada somente pelas funções internas
    public $msgErro = "";
    public function conectar($nome, $host, $usuario, $senha) {

        global $pdo;
        try {
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
        } catch (PDOException $e) {
           $msgErro = $e->getMessage(); //verificar se terá esse global
        }

    }

    public function cadastrar($nome, $telefone, $endereco, $data_nascimento, $email, $senha) {

        global $pdo;
        //verificar se já existe o e-mail cadastrado
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
        $sql->bindValue(":e",$email);
        $sql->execute();

        if($sql->rowCount() > 0) {
            return false; //já está cadastrado
        } else {

        //caso não, Cadastrar
            $sql = $pdo->prepare("INSERT INTO usuarios (nome, telefone, endereco, data_nascimento, email, senha) VALUES (:n, :t, :en, :dtn, :e, :s)");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":t",$telefone);
            $sql->bindValue(":en",$endereco);
            $sql->bindValue(":dtn",$data_nascimento);
            $sql->bindValue(":e",$email);
            $sql->bindValue(":s",md5($senha));
            $sql->execute();
            return true; //tudo ok
        }
        
    }

    public function logar($email, $senha) {

        global $pdo;
        //verificar se o email e senha estão cadastrados, se sim
        $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",md5($senha));
        $sql->execute();

        if($sql->rowCount() > 0) {
            //entrar no sistema (sessão)
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id_usuario'] = $dado['id_usuario'];
            return true; //cadastrado com sucesso

        } else {
            
            return false; //não foi possível logar

        }

    }

}

?>