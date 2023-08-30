<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/estilo.css">

    <title>Esqueci a Senha</title>
</head>

<body>
<!-- <div class="modulo">


        <label for="esqemail"> Insira seu email
           
         
         
            <input type="submit" name="enviar">
 -->
 <main class="principal">
        <div class="conteudo">

            <div class="formulario">

                <h2>
                    Esqueci a senha
                </h2>
                <form method="post" action="">
                    <div class="modulo">
                        <label for="esqemail">E-mail
                        <input type="text" name="esqemail">
                        </label>
                    </div>
                    <div class="modulo">
                        <label for="esqsenha">
                        Insira seu dado pessoal (inserida no cadastro)
                        <input type="text" name="esqpref">   
                        </label>
                    </div>
                    <div class="moduloBotao">
                        <input type="submit" name="bentrar" value="Entrar">
                    </div>
                </form>
             
            </div>
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
