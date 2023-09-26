 <?php 
require_once "conexao/conexao.php";
session_start();
$usuario=$_SESSION["usuario"];
if($_SERVER["REQUEST_METHOD"]==="POST"){
$usuario=$_SESSION["usuario"];
$altnome=$_POST["nome"];
$altsenha=$_POST["senha"];
$email=$usuario["email"];


$sql="UPDATE `usuario`
SET `nome_usuario`='$altnome' ,
`senha`='$altsenha'
WHERE `email`= '$email'";

if($conexao->query($sql)){
    echo "<script language='javascript' type='text/javascript'>alert('Dados alterados com sucesso!')
    ;</script>";
    function verificaLogin($email, $conexao)
    {
        $email = $conexao->real_escape_string($email);
        $sql = "SELECT * FROM usuario WHERE email ='$email'";
        $resultado = $conexao->query($sql);
        return $resultado;
    }
    $resultado = verificaLogin($email, $conexao);
    $dados = mysqli_fetch_array($resultado);
    $usuario = [
        'nome_usuario' => $dados['nome_usuario'],
        'email' => $dados['email'],
        'senha' => $dados['senha'],
        
        'recuperacao' => $dados['recuperacao']
    ];
    $mens= "Olá: " .  $usuario["nome_usuario"] ."<br>"."Email: ". $usuario["email"];
}else{
    echo "<script language='javascript' type='text/javascript'>alert('Não foi possível altera')
    ;</script>";

}
}

    ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="assets/css/estilo.css">
</head>
<body>
<div class="cabecalho">
        <div class="btnMenu">
            <button id="toggleButton"><img src="imagens/menu_FILL0_wght400_GRAD0_opsz24.png"></button>
        </div>
        <form action="" method="post" class="botpesquisa">
            <input type="text" name="pesquisa" id="pesquisa">
            <button type="submit" name="pesquisar" id="iconpesquisa">
                <img src="imagens/search_FILL0_wght400_GRAD0_opsz24.png">
            </button>
            <div class="carrinho">
                <a href="carrinho.php"> <img src="imagens/shopping_cart_FILL0_wght400_GRAD0_opsz24.png" id="carrinho"></a>
            </div>
        </form>

    </div>
    <!--     menu lateral -->
    <div class="cabecalhoMenu">
        <div class="headerMenu">
            <div class="closeMenu">
                <button id="toggleButton2"><img src="imagens/close_FILL0_wght400_GRAD0_opsz24">
                </button>
            </div>
            <div class="headerMenuTitle">

            </div>
        </div>
        <div class="contentMenu">
            <ul>
                <h2>Usuário: <?= $usuario['nome_usuario']?> </h2>
                <li><a href="inicial.php">Inicial</a></li>
                <li><a href="perfil.php">Perfil</a></li>
                <li><a href="ajuda.php">Ajuda</a></li>
                <li><a href="configuracoes.php">Configurações</a></li>
                <li><a href="amigos.php">Amigos</a></li>
                <li><a href="autores.php">Autores</a></li>
                <li><a href="sobre_nos.php">Sobre nós</a></li>
                <li><a href="sair.php">Sair</a></li>
            </ul>
        </div>

    </div>
    <!--  fim menu -->
    <form action="" method="POST">
            <h2> <?=     $mens?> </h2>
            <h1> ALTERAR INFORMAÇÕES</h1>
            <br>
            Nome
            <input type="text" name="nome">
            Senha
            <input type="text" name="senha">
            <input type="submit" name="enviar">

        </form>

        <a href="deletarconta"><input type="submit" name="delet" value="deletarconta"></a>
        </form>
 <script src="js/menulateral.js"></script>

</body>
</html>
