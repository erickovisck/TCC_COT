 <?php 
require_once "conexao/conexao.php";
session_start();
$usuario=$_SESSION["usuario"];
$sql="SELECT * FROM usuario WHERE id_usuario = ".$usuario["id_usuario"]." ";
$resultado=$conexao->query($sql);
$id = $usuario ["id_usuario"];

if ($resultado && $resultado->num_rows > 0) {
    echo "login efetuado com sucesso";
    
    $dados = mysqli_fetch_array($resultado);
    
    $_SESSION["usuario"]=$dados;

}
    
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["enviarnome"])) {

    
    $altnome = $_POST["nome"];
    $altsenha = $_POST["senha"];

    // Certifique-se de que as variáveis POST existem antes de usá-las.
    if (isset($altnome, $altsenha)) {
     
        
        // Prepare a consulta SQL e vincule os parâmetros.
        $sql="UPDATE `usuario`
SET `nome_usuario`='$altnome' ,
`senha`='$altsenha'
WHERE `id_usuario`= '$id'";
$resultado=$conexao->query($sql);
if($resultado){
    echo "<script language='javascript' type='text/javascript'>alert('Dados alterados com sucesso!')
    ;</script>";

}else{

}
       /*  $stmt = $conexao->prepare($sql);
        $stmt->bind_param("sss", $altnome, $altsenha, $email);

        // Execute a consulta.
        if ($stmt->execute()) {
            echo "Dados atualizados com sucesso.";
        } else {
            echo "Erro ao atualizar os dados: " . $conexao->error;
        } */

    
    }
}

    
    
 



?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="shortcut icon" href="imagens/logo_empresa.jpg">
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
                    <h2>Usuário: <?= $dados['nome_usuario']?> </h2>
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
<form action="" method="post">
    <h3>Editar imagem</h3>
    <input type="text" placeholder="Endereço da imagem" name="img" />
    <input type="submit" name="enviarimg" id="enviarimg" placeholder="Endereço da imagem...">
    <?php
    if (isset($_POST["img"])) {
        $img = $_POST["img"];
        $sql="UPDATE `usuario`
        SET `img_perfil`='$img'
        WHERE `id_usuario`= '$id'";
 
$resultado=$conexao->query($sql);
if($resultado){
  echo "imagem alterada";
}else{
 echo "Não foi possivel atualizar a imagem";   
}
    }
?>
</form>
    <div class="perfil_card"> 
        <div class="perfil2">   
            
        <?php
    if($dados["img_perfil"]){    
    ?>
    <img class="profile-pic" id="iconperfil" src="<?=$dados["img_perfil"]?>" >
    
    <?php 
    }else{ 
        ?>
       <img class="profile-pic" id="iconperfil" src="https://img.freepik.com/fotos-gratis/icone-de-perfil-de-usuario-frontal-com-fundo-branco_187299-40010.jpg?w=740&t=st=1697032016~exp=1697032616~hmac=d6f954d7e8c6ce2127a1fc24d262b5a7ccaa9abffb3a117fe93d5bc3055b5ab0">
       
    <?php
    }
    ?>

  
    <h1><?= $dados["nome_usuario"]?></h1>
</div>
    <br>
  <h2>Bio: </h2>
  <?php 

if ($dados["biografia"]) {
    echo "<p>" . $dados["biografia"] . "</p>";
} else {
    if (isset($_POST["enviarbio"])) {
        $bio = $_POST["bio"];
        $sql="UPDATE `usuario`
        SET `biografia`='$bio' ,
        `senha`='$altsenha'
        WHERE `id_usuario`= '$id'";
/*  $sql="INSERT biografia INTO usuario VALUE ($bio); "        ;
 */    
$resultado=$conexao->query($sql);
if($resultado){
    echo $bio;
}else{
 echo "Não foi possivel atualizar a bio";   
}
   
        
    } else {
        ?>
        <form action="" method="post">
            <input type="text" placeholder="insira algo aqui..." name="bio" />
            <input type="submit" name="enviarbio" id="envbio">
        </form>
        <?php
    }
}
?>

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
