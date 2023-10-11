<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/cadastro.css">
    <title>Login</title>
</head>

<body>
    <div class="cad_box">
                <form method="post" action="">
                    <fieldset>
                        <legend>LOGIN</legend>
                        <br>
                    <div class="cad_input">
                        <label for="logemail2">
                            E-mail
                            <input type="text" name="logemail" id="logemail" class="cad_inputuser" placeholder="Digite seu e-mail">
                        </label>
                        <br> <br>
                    </div>
                    <div class="cad_input">
                        <label for="logsenha2">
                            Senha
                            <input type="password" name="logsenha" id="logsenha" class="cad_inputuser" placeholder="Digite sua senha">
                        </label>
                    </div>
                    <br><br>
                    <div class="botaocadastrar">
                        <input type="submit" name="bentrar" value="Entrar" id="submit">
                    </div>
                <br> <br>
                <div class="esqueciSenha">
                    <a href="esqueci_senha.php"> Esqueci minha senha </a>
                </div>
            <br> <br>
            <div class="botaoCadastro">
                <h3>Ainda não possui cadastro? </h3>
                <a href="cadastro.php"> CADASTRAR </a>
        </div>
</fieldset>
</form>
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


        $usuario = [
            "email" => $_POST["logemail"],
            "senha" => $_POST["logsenha"],
        ];
        $resultado = verificaLogin($usuario["email"], $usuario["senha"], $conexao);

        if ($resultado && $resultado->num_rows > 0) {
            echo "login efetuado com sucesso";
            
            $dados = mysqli_fetch_array($resultado);
            $usuario = [
                'id_usuario' => $dados['id_usuario'],
                'nome_usuario' => $dados['nome_usuario'],
                'email' => $dados['email'],
                'senha' => $dados['senha'],
                'recuperacao' => $dados['recuperacao'],
                'numero_cartao' => $dados['numero_cartao'],
                'bio' => $dados['biograsia'],
            ];
            $_SESSION["usuario"] = $usuario;
           
        
           $_SESSION["usuario"]=$usuario;
           echo"<script language='javascript' type='text/javascript'>alert('Login realizado com sucesso')
           ;window.location.href='inicial.php'</script>";



        } else {
            echo"<script language='javascript' type='text/javascript'>alert('Falha no login')
            ;window.location.href='Login.php'</script>";


        }

    }

    ?>

   <!--  <footer class="rodape">
        <h4>Siga @creatorsofthought no Instagram</h4>
        <?= date('Y') ?>
    </footer> -->

</body>

</html>
