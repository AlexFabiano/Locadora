<?php

include_once 'includes/conexao.php';

function cadastrarUsuario() {
    global $conexao;

    
    
    
    $sql = "INSERT INTO USUARIO (NOME, CPF, IDADE) "
            . "VALUES (:nome, :cpf, :idade)";

    $query = $conexao->prepare($sql);
    $query->bindValue(':nome', $_POST['nome']);
    $query->bindValue(':cpf', $_POST['cpf']);
    $query->bindValue(':idade', $_POST['idade']);
    return $query->execute();
    
    
}

function atualizarCliente() {
    global $conexao;

    $sql = "UPDATE CLIENTE SET NOME = :nome,"
            . " ENDERECO = :endereco,"
            . " CIDADE = :cidade,"
            . " IDADE = :idade,"
            . " NRCARTAO = :nrcartao,"
            . " PREFERENCIAS = :preferencias "
            . " WHERE ID = :id";

    $query = $conexao->prepare($sql);
    $query->bindValue(':nome', $_POST['nome']);
    $query->bindValue(':endereco', $_POST['endereco']);
    $query->bindValue(':cidade', $_POST['cidade']);
    $query->bindValue(':idade', $_POST['idade']);
    $query->bindValue(':nrcartao', $_POST['nrcartao']);
    $query->bindValue(':preferencias', $_POST['preferencias']);
    $query->bindValue(':id', $_GET['id']);
    return $query->execute();
}

function listarCliente() {
    global $conexao;

    $query = $conexao->query("SELECT * FROM CLIENTE ");
    $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
}

function deletarCliente($id) {
    global $conexao;

    $query = $conexao->prepare('DELETE FROM CLIENTE WHERE ID = :id');
    $query->bindValue(':id', $id);

    return $query->execute();
}

function selecionaCliente($id) {
    global $conexao;

    $query = $conexao->prepare('SELECT * FROM CLIENTE WHERE ID = :id');
    $query->bindValue(':id', $id);
    $query->execute();

    return $query->fetch(PDO::FETCH_ASSOC);
}