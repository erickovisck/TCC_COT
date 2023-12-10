<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Alterar senha</title>
    <link rel="shortcut icon" href="imagens/logo_projeto2.png">
    <link rel="stylesheet" href="assets/css/cadastro.css">

</head>

<body>

    <div class="cad_box">
<form action="" method="POST">
    <fieldset>
    <legend>Digite sua nova senha</legend>
    <div class="cad_input">
    <label for="logsenha2"> Senha
    <input type="text" name="novasenha" class="cad_inputuser" placeholder="Digite sua nova senha">
</label>
<br> <br>

    <label for="logsenha2"> Confirmar senha
    <input type="text" name="novasenha2" class="cad_inputuser" placeholder="Confirme sua senha">
</label>
</div>
<br> <br>
            <label for="botaoenviar">
                    <div class="moduloBotao">
        <input type="submit" name="enviar" action="" id="submit">
</div>
</fieldset>
    </form>
</div>


</div>

<?php
session_start();
require_once "conexao/conexao.php";
$mens2="";
if($_SERVER["REQUEST_METHOD"]==="POST"){
$novsenha = $_POST['novasenha'];
$novsenha2 = $_POST['novasenha2'];
$esqemail = $_SESSION['esqemail'];
if($novsenha!=$novsenha2){
    echo"<script language='javascript' type='text/javascript'>alert('Senhas diferem')
;window.location.href='alterar_senha.php'</script>"; 
}else{
$sql = "UPDATE `usuario`
        SET `senha` = '$novsenha'
        WHERE `email` = '$esqemail'";
       
if ($conexao->query($sql)) {

    
    echo"<script language='javascript' type='text/javascript'>alert('Senha alterada com sucesso')
    ;window.location.href='login.php'</script>"; 
} else {
    echo"<script language='javascript' type='text/javascript'>alert('Erro ao alterar')
    ;window.location.href='alterar_senha.php'</script>". $conexao->error;
}
}
}
$conexao->close();
?> 

</body>

</html>
