<?php
session_start();

if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] != true){
   header("Location: login.php");
} else {
    echo "Boa noite, " . $_SESSION['USUARIO_LOGADO']['USERNAME'] . '!';
}


