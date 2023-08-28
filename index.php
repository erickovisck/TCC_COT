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
        <h1>Login</h1>
    </header>

    <main class="principal">
    <div class="conteudo">

    <nav class="modulos">


        <div class="formulario">
                    
<form method="post" action="">
        <div class="modulo">
            <h3> Email</h3>
                <input type="text" name="logemail" id="logemail"> 
        </div>
        <div class="modulo">
            <h3> Senha</h3>
                <input type="text" name="logsenha" id="logsenha"> <br> 
        </div>
        <div class="modulo">        
                <input type="submit" name="bentrar" value="entrar">
        </div>
        </form>

        <a href="esqueci_senha.php"> Esqueci minha senha </a>
        </div>
        <h3>Ainda não possui cadastro? </h3>
        <a href="cadastro.php">  CADASTRAR </a>
        </nav>

        
    </div>
    </main>
    <?php
    session_start();
    require_once "conexao/conexao.php";

    function verificaLogin($email, $senha, $conexao){
        $email = $conexao->real_escape_string($email);
        $senha = $conexao->real_escape_string($senha);


        $sql="SELECT * FROM usuario WHERE email ='$email' AND senha='$senha'";
   
        $resultado=$conexao->query($sql);
        return $resultado;

    }
    if ($_SERVER["REQUEST_METHOD"]==="POST"){
        
    
    $usuario= array(
        "email"=>$_POST["logemail"],
        "senha"=>$_POST["logsenha"],
    );
    $_SESSION['usuario']=$usuario;
   $resultado=verificaLogin($usuario["email"], $usuario["senha"], $conexao);

   
if($resultado && $resultado->num_rows > 0){
    
    echo"login efetuado com sucesso";  
    echo "<meta http-equiv='refresh' content=1;url=inicial.php>";

    
    
}else {
    echo "Falha no login";
    
  
}

    }
    ?>

    <footer class="rodape">
    </footer>
    
</body>
</html>