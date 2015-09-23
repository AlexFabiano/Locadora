<?php
include_once 'includes/usuario.php';

if (isset($_GET['id']) && $_GET['id'] != "") {
    $retorno = deletarUsuario($_GET['id']);

    if ($retorno) {
       $msg = "Registro deletado com sucesso!!";
    } else {
        $msg = "Registro nao deletado !!";
    }
} 
?>

<h1><?php echo $msg ?></h1>
<a href="listar-usuarios.php">Voltar para listagem de usuario</a>