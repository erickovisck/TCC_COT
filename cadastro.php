<?php
session_start();
require_once "conexao/conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = isset($_POST["cadnome"]) ? $_POST["cadnome"] : "";
    $senha = isset($_POST["cadsenha"]) ? $_POST["cadsenha"] : "";
    $senha2 = isset($_POST["cadsenha2"]) ? $_POST["cadsenha2"] : "";
    $email = isset($_POST["cademail"]) ? $_POST["cademail"] : "";
    $recuperacao = isset($_POST["cadrecuperacao"]) ? $_POST["cadrecuperacao"] : "";

    $usuario = array(
        "nome" => $nome,
        "senha" => $senha,
        "senha2" => $senha2,
        "email" => $email,
        "recuperacao" => $recuperacao
    );

    $_SESSION['usuario'] = $usuario;

    $verif = null;
    $email = $usuario["email"];

    function verificarExistencia($email, $conexao)
    {
        $email = $conexao->real_escape_string($email);

        $sql = "SELECT * FROM usuario WHERE email = '$email'";
        $resultado = $conexao->query($sql);

        return $resultado->num_rows > 0;
    }

    if ($usuario["senha"] != $usuario["senha2"]) {
        echo "<script language='javascript' type='text/javascript'>alert('Senhas diferem');window.location.href='cadastro.php'</script>";
    } else {
        function cadastrarUsuario($usuario, $conexao)
        {
            $nome = $conexao->real_escape_string($usuario["nome"]);
            $senha = $conexao->real_escape_string($usuario["senha"]);
            $email = $conexao->real_escape_string($usuario["email"]);
            $recuperacao = $conexao->real_escape_string($usuario["recuperacao"]);

            $sql = "INSERT INTO usuario (nome_usuario, senha, email, recuperacao) 
                    VALUES ('$nome', '$senha', '$email', '$recuperacao')";

            if ($conexao->query($sql) === TRUE) {
                $logerro = "Cadastro realizado com sucesso!";
                return true;
            } else {
                echo "<br>Erro ao cadastrar usuário: " . $conexao->error;
                return false;
            }
        }
    }

    if (verificarExistencia($email, $conexao)) {
        $logerro = "E-mail já cadastrado.";
        $verif = 1;
    } else {
        if (cadastrarUsuario($usuario, $conexao)) {
            echo "<script language='javascript' type='text/javascript'>alert('Cadastro realizado com sucesso!');window.location.href='Login.php'</script>";
        } else {
            $logerro = "Erro ao cadastrar usuário.";
        }
    }

    if ($verif == 1) {
        // Alguma ação para o caso em que o e-mail já está cadastrado.
    } elseif ($verif == 0) {
        // Alguma ação para o caso em que o cadastro foi realizado com sucesso.
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
                <br>
                <div class="cad_input">
                    <label for="lognome">Nome
                        <input required type="text" name="cadnome" id="cadnome" class="cad_inputuser" placeholder="Digite seu nome">
                    </label>
                </div>
                <br> <br>
                <div class="cad_input">
                    <label for="logemail2">E-mail/Usuário
                        <input required type="text" name="cademail" id="cademail" class="cad_inputuser" placeholder="Digite seu e-mail"> <br>
                    </label>
                </div>
                <br> <br>
                <div class="cad_input">
                    <label for="logsenha">Senha
                        <input required type="password" name="cadsenha" id="cadsenha" class="cad_inputuser" placeholder="Crie uma senha"> <br>
                    </label>
                    <br> <br>
                </div>
                <div class="cad_input">
                    <label for="logsenha2">Confirmar senha
                        <input required type="password" name="cadsenha2" id="cadsenha2" class="cad_inputuser" placeholder="Confirmar senha"> <br>
                    </label>
                </div>

                <br> <br>
                <div class="cad_input">
                    <label for="loginserirdado">
                        Insira um dado pessoal para recuperar a senha posteriormente
                        <input required type="text" name="cadrecuperacao" id="cadrecuperacao" class="cad_inputuser" placeholder="Digite uma palavra-chave">
                    </label>
                </div>

                <br> <br>
                <div class="botaocadastrar">
                    <input type="submit" name="cadastrar" value="Cadastrar" id="submit">
                </div>
                <br> <br>
                <div class="jatemconta">
                    <a href="Login.php">Já tem uma conta? </a>
                </div>
            </fieldset>
        </form>
    </div>

    <?php
    if (!empty($logerro)) {
        echo "<div>" . $logerro . "</div>";
    }
    ?>
</body>

</html>
