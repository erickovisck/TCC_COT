<?php
session_start();
require_once "conexao/conexao.php";
$logerro="";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = isset($_POST["cadnome"]) ? $_POST["cadnome"] : "";
    $senha = isset($_POST["cadsenha"]) ? $_POST["cadsenha"] : "";
    $email = isset($_POST["cademail"]) ? $_POST["cademail"] : "";
    $recuperacao = isset($_POST["cadrecuperacao"]) ? $_POST["cadrecuperacao"] : "";
    if (isset($_POST['autor'])) {
        $autor = $_POST['autor'];
    } else {
        $autor="leitor";
    }
 $usuario = array(
    "nome" => $_POST["cadnome"],
    "senha" => $_POST["cadsenha"],
    "email" => $_POST["cademail"],
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
function cadastrarUsuario($usuario, $conexao,$autor) {
    $nome = $conexao->real_escape_string($usuario["nome"]);
    $senha = $conexao->real_escape_string($usuario["senha"]);
    $email = $conexao->real_escape_string($usuario["email"]);
    $recuperacao = $conexao->real_escape_string($usuario["recuperacao"]);

    $sql = "INSERT INTO usuario (nome_usuario, senha, email, recuperacao, autor) 
            VALUES ('$nome', '$senha', '$email',
            '$recuperacao', '$autor')"; 
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
    if (cadastrarUsuario($usuario, $conexao, $autor)) {
      
       echo"<script language='javascript' type='text/javascript'>alert('Cadastro realizado com sucesso!')
        ;window.location.href='Login.php'</script>"; 
        echo $autor;
       
    
    
        } else {
        echo "erro".mysqli_error($conexao);
      
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
    <link rel="shortcut icon" href="imagens/logo_projeto2.png">
    <link rel="stylesheet" href="assets\css/cadastro.css">
</head>

<body>
    <div class="cad_box">
    <form action="" method="POST">
            <fieldset>
                <legend>CADASTRO</legend> 
</br>
    <div class="cad_input">
    <label for="lognome">Nome 
    <input required  type="text" name="cadnome" id="cadnome"  class="cad_inputuser" placeholder="Digite seu nome">
</div> 
</label>
<br> <br>
    <div class="cad_input">
    <label for="logemail2">E-mail/usuario
    <input required  type="text" name="cademail" id="cademail"  class="cad_inputuser" placeholder="Digite seu e-mail"> <br>
</div>
</label>
<br> <br>
<div class="cad_input">
    <label for="logsenha2">Senha
    <input  required type="password" name="cadsenha" id="cadsenha" class="cad_inputuser" placeholder="Crie uma senha"> <br>
</label> 
</div>

<br> <br>
<div class="cad_input">
<label for="loginserirdado">
    Insira um dado pessoal para recuperar a senha posteriormente 
    <input required  type="text" name="cadrecuperacao" id="cadrecuperacao"  class="cad_inputuser" placeholder="Digite uma palavra-chave">
</label>
</div>
<label>
    Autor?
    <input type="checkbox" name="autor" value="autor">
</label>
<br> <br>
<div class="botaocadastrar">
    <input  type="submit" name="cadastrar" value="Cadastrar" id="submit">
</div>
<br> <br>
<div class="jatemconta">
    <a href="Login.php">Já tem uma conta? </a>
</div>
</form>
</fieldset>
<?php if (!empty($logerro)) { 
            echo " <div>" . $logerro . "</div>";
        }
        echo "<br> <br> <center> $mens </center>";
         ?>

</body>




</html>

</body>


</html>
