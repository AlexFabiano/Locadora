
                     <?php          
                            include_once 'includes/usuario.php';

                            if (isset($_POST['nome']) && $_POST['nome'] != "" 
                            && isset($_POST['username']) && $_POST['username'] != "" 
                            && isset($_POST['email']) && $_POST['email'] != ""  
                            && isset($_POST['cpf']) && $_POST['cpf'] != ""  
                            && isset($_POST['idade']) && $_POST['idade'] != "" 
                            && isset($_POST['login']) && $_POST['login'] != ""
                            && isset($_POST['senha']) && $_POST['senha'] != "" 
                            && isset($_POST['tipo_usuario']) && $_POST['tipo_usuario'] != "") { 
                           
                              
                                
                                 
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
   username<input type="text" name="username">  
    <?php if (isset($_POST['username']) && $_POST['username'] == "") {
        echo "<span style=\"color:red;\">Campo email eh obrigatorio!!</span>";
    }
    ?><br>
   
    email<input type="text" name="email">  
    <?php if (isset($_POST['email']) && $_POST['email'] == "") {
        echo "<span style=\"color:red;\">Campo email eh obrigatorio!!</span>";
    }
    ?><br>
    
    cpf<input type="text" name="cpf">  
    <?php if (isset($_POST['cpf']) && $_POST['cpf'] == "") {
        echo "<span style=\"color:red;\">Campo email eh obrigatorio!!</span>";
    }
    ?><br>
    
    idade<input type="text" name="idade">  
    <?php if (isset($_POST['idade']) && $_POST['idade'] == "") {
        echo "<span style=\"color:red;\">Campo email eh obrigatorio!!</span>";
    }
    
    ?><br>
    
    login<input type="text" name="login">  
    <?php if (isset($_POST['login']) && $_POST['login'] == "") {
        echo "<span style=\"color:red;\">Campo email eh obrigatorio!!</span>";
    }
    
    ?><br>
    
    senha<input type="text" name="senha">  
    <?php if (isset($_POST['senha']) && $_POST['senha'] == "") {
        echo "<span style=\"color:red;\">Campo email eh obrigatorio!!</span>";
    }
    
    ?><br>
   
    tipo<input type="text" name="tipo_usuario">  
    <?php if (isset($_POST['tipo_usuario']) && $_POST['tipo_usuario'] == "") {
        echo "<span style=\"color:red;\">Campo email eh obrigatorio!!</span>";
    }
    
    ?><br>
    <input type="submit" value="SALVAR"> 
</form>
<br>

                

     <!-- exemplo do banco
                                  $query->bindValue(':nome', $_POST['nome']);
                                  $query->bindValue(':username', $username);
                                  $query->bindValue(':email', $_POST['email']);
                                  $query->bindValue(':cpf', $_POST['cpf']);
                                  $query->bindValue(':idade', $_POST['idade']);
                                  $query->bindValue(':login', $_POST['login']);
                                  $query->bindValue(':senha', $_POST['senha']);
                                  $query->bindValue(':tipo_usuario', $_POST['tipo_usuario']);    
                                -->
  
   
          
     
