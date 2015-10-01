


<?php

include_once 'includes/conexao.php';

function cadastrarUsuario() {
    global $conexao;

    $sql = "INSERT INTO USUARIO (NOME,USERNAME,EMAIL,CPF,IDADE,LOGIN,SENHA,TIPO_USUARIO) "
            . "VALUES (:nome, :username, :email, :cpf, :idade, :login, :senha, :tipo_usuario)";

    if ($_POST['username'] == "") {
        $cpf = '';
    } else {
        $cpf = $_POST['username'];
    }

    $query = $conexao->prepare($sql);
    $query->bindValue(':nome', $_POST['nome']);
    $query->bindValue(':username', $username);
    $query->bindValue(':email', $_POST['email']);
    $query->bindValue(':cpf', $_POST['cpf']);
    $query->bindValue(':idade', $_POST['idade']);
    $query->bindValue(':login', $_POST['login']);
    $query->bindValue(':senha', $_POST['senha']);
    $query->bindValue(':tipo_usuario', $_POST['tipo_usuario']);
    
    return $query->execute();
}

function atualizarUsuario() {
    global $conexao;

    $sql = "UPDATE USUARIO SET NOME = :nome,"
            . " CPF = :cpf,"
            . " WHERE IDADE= :idade";
            

    $query = $conexao->prepare($sql);
    $query->bindValue(':nome', $_POST['nome']);
    $query->bindValue(':username', $username);
    $query->bindValue(':email', $_POST['email']);
    $query->bindValue(':cpf', $_POST['cpf']);
    $query->bindValue(':idade', $_POST['idade']);
    $query->bindValue(':login', $_POST['login']);
    $query->bindValue(':senha', $_POST['senha']);
    $query->bindValue(':tipo_usuario', $_POST['tipo_usuario']);
    return $query->execute();
}
    

function listarUsuario() {
    global $conexao;

    $query = $conexao->query("SELECT * FROM USUARIOS ");
    $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
}

function deletarUsuario($idade) {
    global $conexao;

    $query = $conexao->prepare('DELETE FROM USUARIO WHERE IDADE = :idade');
    $query->bindValue(':idade', $idade);

    return $query->execute();
}

function selecionaUsuario($idade) {
    global $conexao;

    $query = $conexao->prepare('SELECT * FROM USUARIO WHERE IDADE = :idade');
    $query->bindValue(':idade', $idade);
    $query->execute();

    return $query->fetch(PDO::FETCH_ASSOC);
}

function login() {
    global $conexao;

    $query = $conexao->prepare("SELECT * FROM USUARIO"
            . " WHERE USERNAME= :username AND SENHA = :senha ");
    $query->bindValue(':username', $_POST['username']);
    $query->bindValue(':senha', $_POST['senha']);
    $query->execute();
    $resultado = $query->fetch(PDO::FETCH_ASSOC);
    return $resultado;
}
