<?php

require_once "Database.php";

class Usuario {

    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function registrarUsuario($data){
        $nome = $data['nome'];
        $telefone = $data['telefone'];
        // --
        $data_de_nascimento = $data['data_de_nascimento'];
        // --
        $cpf = $data['cpf'];
        // --
        $email = $data['email'];
        $email = strtolower($email);
        // --
        $senha = $data['senha'];
        $senha = password_hash($senha, PASSWORD_DEFAULT);


        if ($nome == '' or $telefone == '' or $data_de_nascimento == '' or $cpf == '' or $email == '' or $senha == ''){
            require "registro/alertGenerico.php";
        }

        $sql = "INSERT INTO user (nome, telefone, data_de_nascimento, cpf, email, senha) VALUES (:nome, :telefone, :data_de_nascimento, :cpf, :email, :senha)";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':nome', $nome, PDO::PARAM_STR);
        $query->bindValue(':telefone', $telefone, PDO::PARAM_STR);
        $query->bindValue(':data_de_nascimento', $data_de_nascimento, PDO::PARAM_STR);
        $query->bindValue(':cpf', $cpf, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':senha', $senha, PDO::PARAM_STR);

        $result = $query->execute();


    }



}

?>