<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/estilo.css">
    <title>index</title>
</head>

<body>

    <header class="cabecalho">
        <h1>Seja bem vindo, leitor</h1>
    </header>

    <main class="principal">
        <div class="conteudo">

            <div class="formulario">

                <h2>
                    Logar
                </h2>
                <form method="post" action="">
                    <div class="modulo">
                        <label for="logemail">E-mail
                            <input type="text" name="logemail" id="logemail">
                        </label>
                    </div>
                    <div class="modulo">
                        <label for="logsenha">
                            Senha
                            <input type="text" name="logsenha" id="logsenha">
                        </label>
                    </div>
                    <div class="moduloBotao">
                        <input type="submit" name="bentrar" value="Entrar">
                    </div>
                </form>
                <div class="esqueciSenha">
                    <a href="esqueci_senha.php"> Esqueci minha senha </a>
                </div>
            </div>
            <div class="botaoCadastro">
                <h3>Ainda não possui cadastro? </h3>
                <a href="cadastro.php"> CADASTRAR </a>
            </div>
        </div>
    </main>
    <?php
    session_start();
    require_once "conexao/conexao.php";

    function verificaLogin($email, $senha, $conexao)
    {
        $email = $conexao->real_escape_string($email);
        $senha = $conexao->real_escape_string($senha);


        $sql = "SELECT * FROM usuario WHERE email ='$email' AND senha='$senha'";

        $resultado = $conexao->query($sql);
        return $resultado;

    }
    if ($_SERVER["REQUEST_METHOD"] === "POST") {


        $usuario = array(
            "email" => $_POST["logemail"],
            "senha" => $_POST["logsenha"],
        );
        $_SESSION['usuario'] = $usuario;
        $resultado = verificaLogin($usuario["email"], $usuario["senha"], $conexao);


        if ($resultado && $resultado->num_rows > 0) {

            echo "login efetuado com sucesso";
            echo "<meta http-equiv='refresh' content=1;url=inicial.php>";



        } else {
            echo "Falha no login";


        }

    }
    ?>

    <footer class="rodape">
    </footer>

</body>

</html>
