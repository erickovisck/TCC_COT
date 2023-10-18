
<?php
require_once "conexao/conexao.php";
session_start();
$usuario = $_SESSION['usuario'];

$itensAdicionados = 0;
$itensSelecionados = isset($_POST["selecionado"]) ? $_POST["selecionado"] : [];

if (isset($_POST["selecionado"])) {
    $itensSelecionados = $_POST["selecionado"];
    
    foreach ($itensSelecionados as $id_livro) {
        // Você pode ajustar a quantidade conforme necessário
        $quantidade = 1;
        
        // Use instruções preparadas para evitar SQL Injection
        $sql = "INSERT INTO carrinho (id_livro, id_usuario, quantidade) 
        VALUES ('$id_livro','".$usuario['id_usuario']."','$quantidade')";
        $resultado = $conexao->prepare($sql);
        
        if ($resultado->execute()) {
            $itensAdicionados++;
        } else {
            echo "Erro ao adicionar item ao carrinho: " . $resultado->error;
        }
        
        $resultado->close();
    }
    
    // Redirecionar para esta página usando GET após a inserção bem-sucedida
    header("Location: carrinho.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
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
                    <h2>Usuário: <?= $usuario['nome_usuario']?> </h2>
                    <li><a href="inicial">Inicial</a></li>
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
            <form>
                <div class="inner-form">
                    <div class="row">
                        <div class="input-field first" id="first">
                            <input class="input" id="inputFocus" type="text" placeholder="Keyword" />
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
    <script src="script.js"></script>
    
    <h1>Meu carrinho</h1>
    <div class="imagem_carrinho">
        <img src="imagens/carrinho.png">
    </div> <br> <br>
    <?php 
     $saldo="";
    $totalpreco=0;
    $sql = "SELECT * FROM carrinho WHERE id_usuario='" . $usuario['id_usuario'] . "'";
    $resultado = $conexao->query($sql);
    if ($resultado) {
        while ($dados = mysqli_fetch_array($resultado)) {
            $verlivro = $dados['id_livro'];
            $sql = "SELECT * FROM livros WHERE id_livro='$verlivro'";
            $resultado2 = $conexao->query($sql);

            if ($resultado2) {
                while ($dados2 = mysqli_fetch_array($resultado2)) {
                    $totalpreco= $totalpreco+ $dados2["preco"];
                    echo"<div class='carrinho_item'>";
                    echo '<p>Nome: '.$dados2["nome_livro"].' |Preço: R$'.$dados2["preco"].'</p>';
                    echo"</div>";
                }
              

            } else {
                echo "Erro ao buscar detalhes dos livros: " . $conexao->error;
            }
        }
    } else {
        echo "Erro ao buscar itens no carrinho: " . $conexao->error;
    }
    if(isset($_POST["comprarcarrinho"])){
        $sql2="SELECT * FROM cartao_credito WHERE numero_cartao='".$usuario['numero_cartao']."'";
        $resultado3=$conexao->query($sql2);
        $dados = mysqli_fetch_array($resultado3);
        if($dados['limite']>=$totalpreco){
        $sqll="DELETE FROM carrinho WHERE id_usuario='".$usuario["id_usuario"]."'";
        $resultado=$conexao->query($sqll);
        if($resultado){
           
            
            echo"<script language='javascript' type='text/javascript'>alert('Compra realizada com sucesso!')
            ;window.location.href='carrinho.php'</script>";
             $novolimite=$dados['limite']-$totalpreco;
             $sql3="UPDATE cartao_credito
             SET limite='$novolimite'
             WHERE numero_cartao='".$usuario['numero_cartao']."' ";
             $resultado5=$conexao->query($sql3);
             if(!$resultado5){
                echo $conexao->error();
               
             }
        }else{
     
            echo"<script language='javascript' type='text/javascript'>alert('erro na sua compra')
            ;window.location.href='carrinho.php'</script>".$conexao->error;
        }
    }else{
        $saldo= "saldo insuficiente (R$". $dados['limite'].")";  
    }
}
    ?>

    <form method="post" action="">
        <div class="carrinhos">
        <h2> Valor total: R$<?=$totalpreco?></div> <br>
            <input type="submit" name="comprarcarrinho" id="btncomprar" value="Comprar"> </input>
            <div class="carrinhos">
            <h3><?= $saldo?> </h3></div>
    </form> <br> <br>
    <div class="voltarpagina">
        <form method="" action="inicial.php">
            <input type="submit" id="voltainc" value="VOLTAR AO INÍCIO">
    </div>
    </form>

</body>

</html>
