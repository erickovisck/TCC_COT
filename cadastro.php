<?php
session_start();
require_once "conexao/conexao.php";
$logerro="";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = isset($_POST["cadnome"]) ? $_POST["cadnome"] : "";
    $email = isset($_POST["cademail"]) ? $_POST["cademail"] : "";
    $preferencia = isset($_POST["cadpreferencia"]) ? $_POST["cadpreferencia"] : "";
    $recuperacao = isset($_POST["cadrecuperacao"]) ? $_POST["cadrecuperacao"] : "";
 

  
 $usuario = array(
    "nome" => $_POST["cadnome"],
    "senha" => $_POST["cadsenha"],
    "email" => $_POST["cademail"],
    "chat_privado" => "",
    "carrinho" => "2",
    "preferencia" => $_POST["cadpreferencia"],
    "recuperacao"=>$_POST["cadrecuperacao"]
);
$_SESSION['usuario']=$usuario;

$verif = null;
$email = $usuario["email"];
function verificarExistencia($email, $conexao) {
    $email = $conexao->real_escape_string($email);

    $sql = "SELECT * FROM usuario WHERE email = '$email'";
    $resultado = $conexao->query($sql);

    return $resultado->num_rows > 0;
}
function cadastrarUsuario($usuario, $conexao) {
    $nome = $conexao->real_escape_string($usuario["nome"]);
    $senha = $conexao->real_escape_string($usuario["senha"]);
    $email = $conexao->real_escape_string($usuario["email"]);
    $preferencia = $conexao->real_escape_string($usuario["preferencia"]);
    $recuperacao = $conexao->real_escape_string($usuario["recuperacao"]);

    $sql = "INSERT INTO usuario (nome_usuario, Senha, email, id_chat_privado, id_carrinho, preferencias, recuperacao) 
            VALUES ('$nome', '$senha', '$email', '" . $usuario["chat_privado"] . "', '" . $usuario["carrinho"] . "', '$preferencia',
            '$recuperacao')";
            if($nome==null || $email==null|| $senha==null|| $preferencia==null || $recuperacao==null) {
          
                return null;
            }
    if ($conexao->query($sql) === TRUE) {
       $logerro="funcionando";
        return true;
     
    } else {
        echo "<br>erro 2";
        return false;
    }
}
if (verificarExistencia($email, $conexao)) {
    $logerro="E-mail já cadastrado.";
    $verif = 1;

}else{
    if (cadastrarUsuario($usuario, $conexao)) {
        $logerro="Cadastro realizado com sucesso!";
        echo "<meta http-equiv='refresh' content='3;url=index.php'>";
        $verif = 0;
    }elseif(cadastrarUsuario($usuario,$conexao)==null){
        echo"preencha todos os campos";
    
        } else {
        echo "<meta http-equiv='' content='2;url=cadastro.php'>";
        $logerro="Erro ao cadastrar.";
    }
}





if ($verif == 1) {


} elseif ($verif == 0) {
   

}

    }
$conexao->close();
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="assets\css/cadastro.css">
</head>

<body>
<header class="cabecalho2">
        <h1>Seja bem vindo</h1>
    </header>
<main class="principal2">
    <div class="conteudo2">
        <div class="form2">
    <h2>CADASTRO</h2>
    <div class="modulo2">
    <form action="" method="POST">
</div>
    <div class="modulo2">
    <label for="lognome">Nome 
    <input type="text" name="cadnome" id="cadnome">
</div> 
</label>
    <div class="modulo2">
    <label for="logemail2">E-mail
    <input type="text" name="cademail" id="cademail"> <br>
</div>
</label>

<div class="modulo2">
    <label for="logsenha2">Senha
    <input type="text" name="cadsenha" id="cadsenha"> <br>
</label> 
</div>
<div class="modulo2">
<label for="logprelivro">Preferências de livros
    <input type="text" name="cadpreferencia" id="cadpreferencia">
</label>
</div>
<div class="modulo2">
<label for="loginserirdado">
    Insira um dado pessoal para recuperar a senha posteriormente 
    <input type="text" name="cadrecuperacao" id="cadrecuperacao">
</label>
</div>
<div class="botaocadastrar">
    <input type="submit" name="cadastrar" value="Cadastrar">
</div>
</form>
<div class="jatemconta">
    <a href="index.php">Já tem uma conta? </a>
</div>
</main>
<?php if (!empty($logerro)) { 
            echo "<div>" . $logerro . "</div>";
        }
        echo $mens;
         ?>
        <footer class="rodape2">
    </footer>

</body>


</html>
