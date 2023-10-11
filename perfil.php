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
        <nav role="navigation">
            <div id="menuToggle">

                <input type="checkbox" />
                <span></span>
                <span></span>
                <span></span>



                <ul id="menu">
                    <h2>Usuário: <?= $usuario['nome_usuario']?> </h2>
                    <li><a href="inicial.php">Inicial   </a></li>
                    <li><a href="perfil.php">Perfil</a></li>
                    <li><a href="ajuda.php">Ajuda</a></li>
                    <li><a href="configuracoes.php">Configurações</a></li>
                    <li><a href="amigos.php">Amigos</a></li>
                    <li><a href="autores.php">Autores</a></li>
                    <li><a href="sobre_nos.php">Sobre nós</a></li>
                    <li><a href="sair.php">Sair</a></li>
                </ul>


            </div>
        </nav>



        <div class="s128">
            <form method="post" action="itens.php">
                <div class="inner-form">
                    <div class="row">
                        <div class="input-field first" id="first">
                            <input class="input" id="inputFocus" type="text" placeholder="Pesquisar" name="pesquisar"/>
                            <input  type="submit" name="enviar" id="pesqenviar">
                            <button class="clear" id="clear">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path
                                        d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>

                </div>
            </form>
        </div>


    </div>
     <div class="perfil">
    <div class="perfil_card"> 
        <div class="perfil2">   
    <img src="imagens/perfil.jpg" class="profile-pic">
    <h1>Usuário</h1>
</div>
    <br>
  <h2>Bio: </h2>
    <br>
    <br>
    <br>
<hr>
    <form action="" method="POST">
            <h1> <?=     $mens?> </h1>

            <h1> ALTERAR INFORMAÇÕES</h1>
            <br>
            <p>Nome</p>
            <input type="text" name="nome"> 
            <p>Senha</p>
            <input type="text" name="senha">
            <input type="submit" name="enviar">

        </form>

        <a href="deletarconta"><input type="submit" name="delet" value="deletar conta"></a>
        </form>
</div>
</div>
 <script src="js/menulateral.js"></script>

</body>
</html>
