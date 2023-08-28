<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets\estilo.css">

    <title>Esqueci a Senha</title>
</head>
<body>
    <form method="POST" action="">
    Insira seu email 
<input type="text" name="esqemail"> 
    Insira seu dado pessoal (inserida no cadastro)
<input type="text" name="esqpref"> 
<input type="submit" name="enviar"> 

</body>
</html>

<?php 
session_start();

require_once "conexao/conexao.php";
if ($_SERVER["REQUEST_METHOD"]==="POST"){
$esqpref=$_POST["esqpref"];
$esqemail=$_POST["esqemail"];
$_SESSION['esqemail']=$esqemail;

function verificaSenha($esqpref, $esqemail, $conexao){
    $esqemail = $conexao->real_escape_string($esqemail);
    $esqpref = $conexao->real_escape_string($esqpref);
$sql="SELECT * FROM usuario WHERE recuperacao= '$esqpref' AND email='$esqemail'";
$resultado=$conexao->query($sql);
return $resultado;

}
$resultado=verificaSenha($esqpref, $esqemail, $conexao);
if($resultado && $resultado->num_rows > 0){
    echo"dados corretos";
    echo "<meta http-equiv='refresh' content=1;url=alterar_senha.php>";
    
}else{
echo"dados incorretos";
}
}
?>