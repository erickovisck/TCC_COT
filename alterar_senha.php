<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar senha</title>
    <link rel="stylesheet" href="assets/css/estilo.css">

</head>

<body>

<main class="principal">
    <div class="formulario">
<form action="" method="POST">
    <div class="modulo">

    <h2>Digite sua nova senha</h2>
    <label for="novasenha"> Senha
    <input type="text" name="novasenha">

</label>
        <input type="submit" name="enviar" action="">
</div>

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
    echo "<meta http-equiv='refresh' content=1;url=index.php>";

} else {
    echo"Erro ao alterar a senha: " . $conexao->error;
}
}
$conexao->close();
?> 

</body>

</html>
