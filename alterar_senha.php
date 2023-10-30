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
$esqemail = $_SESSION['esqemail'];

$sql = "UPDATE `usuario`
        SET `senha` = '$novsenha'
        WHERE `email` = '$esqemail'";
       
if ($conexao->query($sql)) {

    echo "Senha alterada com sucesso.";
    echo "<meta http-equiv='refresh' content=1;url=Login.php>";

} else {
    echo"Erro ao alterar a senha: " . $conexao->error;
}
}
$conexao->close();
?> 

</body>

</html>
