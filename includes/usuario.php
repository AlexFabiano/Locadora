


<?php

include_once 'includes/conexao.php';

function cadastrarUsuario() {
    global $conexao;

    $sql = "INSERT INTO USUARIO (NOME,CPF,IDADE) "
            . "VALUES (:nome, :cpf, :idade)";

    if ($_POST['idade'] == "") {
        $cpf = '';
    } else {
        $cpf = $_POST['idade'];
    }

    $query = $conexao->prepare($sql);
    $query->bindValue(':nome', $_POST['nome']);
    $query->bindValue(':idade', $idade);
    $query->bindValue(':cpf', $_POST['cpf']);
    return $query->execute();
}

function atualizarUsuario() {
    global $conexao;

    $sql = "UPDATE USUARIO SET NOME = :nome,"
            . " CPF = :cpf,"
            . " WHERE IDADE= :idade";
            

    $query = $conexao->prepare($sql);
    $query->bindValue(':nome', $_POST['nome']);
    $query->bindValue(':cpf', $_POST['cpf']);
    $query->bindValue(':idade', $_GET['idade']);
    return $query->execute();
}
    

function listarUsuario() {
    global $conexao;

    $query = $conexao->query("SELECT * FROM USUARIO ");
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
