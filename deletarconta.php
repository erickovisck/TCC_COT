<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar conta</title>
    <link rel="stylesheet" href="assets/css/cadastro.css">

</head>
<body>

<main class="principal">
<div class="formulario">
        <div class="conteudo">

<h1>Deletar conta</h1>
                <form action="" method="POST">
                
                    <div class="modulo">
                        <label for="logsenha">
                            Email
                            <input type="text" name="email">
                        </label>
                    </div>
                   
                    <div class="modulo">
                        <label for="logsenha">
                            Senha
                            <input type="text" name="senha">
                        </label>
                    </div>
                    <div class="modulo">
                        <label for="logsenha">
                            Confirme a senha
                            <input type="text" name="csenha">
                        </label>

                    </div>
                    <div class="modulo">
       
     
            
                   </div>
                   <input type="submit" name="confirmar">
                </form>
    
           
    </div>
    </div>
    </main>
    <?php
require_once "conexao/conexao.php";
session_start();
$usuario = $_SESSION['usuario'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $demail = $_POST["email"];
    $dsenha = $_POST["senha"];
    $dcsenha = $_POST["csenha"];
    
    if ($dsenha == $dcsenha) {
        if ($demail == $usuario['email'] && $dsenha == $usuario['senha']) {
            $sql = "DELETE FROM usuario WHERE email = '$demail' AND senha = '$dsenha'";
            $resultado = $conexao->query($sql);
            
            if ($resultado) {
                echo "Conta deletada";
            } else {
                echo "Erro ao deletar a conta";
            }
        } else {
            echo "As senhas não coincidem com a conta atual";
        }
    } else {
        echo "As senhas não coincidem";
    }
}
?>

</body>
</html>
<?php
