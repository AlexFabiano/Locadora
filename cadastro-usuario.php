
                     <?php          
                            include_once 'includes/usuario.php';

                            if (isset($_POST['nome']) && $_POST['nome'] != "" 
                            && isset($_POST['cpf']) && $_POST['cpf'] != "" 
                             && isset($_POST['idade']) && $_POST['idade'] != "") { 
                           

                                  $retorno = cadastrarUsuario();

                                if ($retorno) {
                                header('Location: cadastro-usuarios-ok.php');
                                 } else {
                                echo "Erro ao salvar!";
                                 }
                                 } else {
                                 echo "Preencha todos os campos!";
                                }
               ?>
    <form action="" method="POST">
                 <br>
    Nome<input type="text" name="nome">
    <?php if (isset($_POST['nome']) && $_POST['nome'] == "") {
        echo "<span style=\"color:red;\">Campo senha eh obrigatorio!!</span>";
    }
    ?>
    <br>
   Cpf<input type="text" name="cpf">  
    <?php if (isset($_POST['cpf']) && $_POST['idade'] == "") {
        echo "<span style=\"color:red;\">Campo email eh obrigatorio!!</span>";
    }
    ?><br>
   
    Idade<input type="text" name="idade">  
    <?php if (isset($_POST['idade']) && $_POST['idade'] == "") {
        echo "<span style=\"color:red;\">Campo email eh obrigatorio!!</span>";
    }
    ?><br>
    <input type="submit" value="SALVAR"> 
</form>
<br>

                

   
  
   
          
     
