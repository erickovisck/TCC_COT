 <?php 
require_once "conexao/conexao.php";
session_start();
$usuario=$_SESSION["usuario"];
$sql="SELECT * FROM usuario WHERE id_usuario = ".$usuario["id_usuario"]." ";
$resultado=$conexao->query($sql);   
$id = $usuario ["id_usuario"];

if ($resultado && $resultado->num_rows > 0) {
/*     echo "login efetuado com sucesso";
 */    
    $dados = mysqli_fetch_array($resultado);
    
    $_SESSION["usuario"]=$dados;

}
    
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["nome"])) {

    
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
    <link rel="shortcut icon" href="imagens/logo_projeto2.png">
    <link rel="stylesheet" href="assets/css/estilo.css">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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
                <h2><a href="perfil.php"><i class="bi bi-person-circle"> </i>
                    <?= $usuario['nome_usuario'] ?></a>
                    </h2>                    <li><a href="inicial.php">Inicial</a></li>
                    <li><a href="comunidade.php">Comunidade</a></li>
                    <li><a href="Amigos.php">Amigos</a></li>
                    <li><a href="carrinho.php">Carrinho</a></li>
                    <li><a href="autores.php">Autores</a></li>
                    <li><a href="https://mail.google.com/mail/u/0/?fs=1&tf=cm&source=mailto&to=creatorsofthought@gmail.com">Ajuda</a></li>
                    <li><a href="sobre_nos.php">Sobre nós</a></li>
                    <li><a href="sair.php">Sair</a></li>
                </ul>



            </div>
        </nav>



      <div class="s128">
        <form method="post" action="pessoas.php">
                <div class="inner-form">
                    <div class="row">
                        <div class="input-field first" id="first">
                            <input class="input" id="inputFocus" type="text" placeholder="Pesquisar" name="pesquisarpessoa" />
                            <input type="submit" name="enviar" id="pesqenviar">
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
<div class="principal">
<div class="container text-center " style="border: 1px solid #2f2841; border-radius: 3%; margin-top: 8%; height: 500px; ">
<div class="row">
    <div class="col   p-4">
<form action="" method="post">
    <h2 class="alterar">EDITAR IMAGEM</h2>
    <input type="text" placeholder="Endereço da imagem" name="img" class="btn btn-light"/>
    <input type="submit" name="enviarimg" id="enviarimg" placeholder="Endereço da imagem..."  class="btn btn-primary" style="font-weight: bold;" >
    <?php
    if (isset($_POST["img"])) {
        $img = $_POST["img"];
        $sql="UPDATE `usuario`
        SET `img_perfil`='$img'
        WHERE `id_usuario`= '$id'";
 
$resultado=$conexao->query($sql);
if($resultado){
    echo"<script language='javascript' type='text/javascript'>alert('Imagem alterada')
    ;window.location.href='perfil.php'</script>"; 
}else{
 echo "Não foi possivel atualizar a imagem";   
}
    }
?>
</form>  
            
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

  
    <h4 class="n_usuario"><?= $dados["nome_usuario"]?></h4>
    <br>
  <h2 class="alterar">BIO </h2>
  <?php 

if ($dados["biografia"]) {
    if (isset($_POST["alterarbio"])) {
        $bio = $_POST["bio2"];
        $sql="UPDATE `usuario`
        SET `biografia`='$bio'
        WHERE `id_usuario`= '$id'";
/*  $sql="INSERT biografia INTO usuario VALUE ($bio); "        ;
 */    
$resultado=$conexao->query($sql);

if($resultado){
    header("location: perfil.php");
}else{
 echo "Não foi possivel atualizar a bio";   
}
    }
    echo "<p class='bio_autor text-break'>" . $dados["biografia"] . "</p>";
    ?>
    <form action="" method="post">
        <input type="text" placeholder="Edite sua bio!" name="bio2" class="btn btn-light" />
        <input type="submit" name="alterarbio" id="envbio"  class="btn btn-primary" style="font-weight: bold;">
    </form>
    <?php
} else {
    if (isset($_POST["enviarbio"])) {
        $bio = $_POST["bio"];
        $sql="UPDATE `usuario`
        SET `biografia`='$bio'
        
        WHERE `id_usuario`= '$id'";
/*  $sql="INSERT biografia INTO usuario VALUE ($bio); "        ;
 */    
$resultado=$conexao->query($sql);
header("location: perfil.php");
exit();
if($resultado){
    echo $bio;
}else{
 echo "Não foi possivel atualizar a bio";   
}
   
        
    } else {
        ?>
        <form action="" method="post">
            <input type="text" placeholder="Insira algo aqui..." name="bio" class="btn btn-light" />
            <input type="submit" name="enviarbio" id="envbio"  class="btn btn-primary" style="font-weight: bold;">
        </form>
        <?php
    }
}
?>
</div>
    <div class="col  p-4" style="background-color:#2f2841; color: white; border-radius: 3%;  height: 500px; ">
    <form action="" method="POST">
            <h1> <?=     $mens?> </h1>

            <h2 class="alterar" style=" color: white;"> ALTERAR INFORMAÇÕES</h2>
            <br>
            <div class="atnome">
           <label for="alt_nome"> Nome <br>
            <input type="text" name="nome">
        </label>
</div>
<br>
<div class="atnome">
            <label for="alt_senha">Senha <br>
            <input type="text" name="senha"> 
</label>
<br>  <br>
</div>
<div class="atenviar">
<label for="alt_enviar">
            <input type="submit" name="enviar" class="envio">
</label>
</div>
        </form>
        <a href="deletarconta"><input type="submit" name="delet" value="Deletar conta" class="btn btn-danger" style="font-weight: bold;"></a>
        </form>
        
</div>
</div>
</div>
</div>
</div>
<!-- Site footer -->
 <footer class="site-footer mt-5 ">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h6>Sobre</h6>
                    <p class="text-justify">O desenvolvimento deste site se tornou necessário após uma breve
                        pesquisa
                        sobre sites com o mesmo propósito, contudo, percebemos que estes sites são quase
                        inexistentes.
                        Visando isso, decidimos fazer um site com mais reconhecimento para autores nacionais e para
                        que
                        mais pessoas possam ter gosto pela leitura.</p>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h6>Links Rapidos</h6>
                    <ul class="footer-links">
                        <li><a href="sobre_nos.php">Sobre nós</a></li>
                        <li><a href="https://mail.google.com/mail/u/0/?fs=1&tf=cm&source=mailto&to=creatorsofthought@gmail.com">Fale conosco</a></li>
                        <li><a href="politicas.html">Politica de Privacidade</a></li>
                        <li><a href="politicas.html">Termos</a></li>
                    </ul>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">

                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <ul class="social-icons">
                        <li><a class="facebook" href="https://www.facebook.com/share/NL9fR7nrcNKsgbtW/"><i class="bi bi-facebook"></i></a></li>
                        <li><a class="twitter" href="https://x.com/creababyohw?s=20"><i class="bi bi-twitter"></i></a></li>
                        <li><a class="insta" href="https://instagram.com/creatorsofthought?igshid=MzRlODBiNWFlZA"><i
                                    class="bi bi-instagram"></i></a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </footer>


  
        

 <script src="js/menulateral.js"></script>

</body>
</html>
