<?php
session_start();

require_once "conexao/conexao.php";

$usuario = $_SESSION["usuario"];
echo $usuario["nome_usuario"];
if (is_null($usuario["email"])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["comprar"])) {
    $id_livro = $_POST["id_livro"];
    $quantidade = $_POST["quantidade"];
    
    // Verifica se o carrinho já existe na sessão
    if (!isset($_SESSION["carrinho"])) {
        $_SESSION["carrinho"] = [];
    }
    
    $carrinho = [
        "id_livro" => $id_livro,
        "quantidade" => $quantidade,
        "id_carrinho" => $usuario['id_usuario']
    ];
    
    // Adiciona o item ao carrinho na sessão
    $_SESSION["carrinho"][] = $carrinhoItem;

    // Redireciona o usuário após o envio do formulário usando GET
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Conectar ao banco de dados (já mostrado no código anterior)

$sql = "SELECT * FROM livros";
$resultado = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                <a href="carrinho.php"> <img src="imagens/shopping_cart_FILL0_wght400_GRAD0_opsz24.png"
                        id="carrinho"></a>
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
    <main class="principal">
        <table>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Preço</th>
            </tr>

            <?php
            
            $sql = "SELECT * FROM livros";
            $resultado = $conexao->query($sql);
            
            if (isset($_POST["pesquisa"])) {
                $pesquisa=$_POST["pesquisa"];
                
                $_SESSION['pesquisa']=$pesquisa;
                include_once "pesquisa.php";
                
            }else{
            if ($resultado) {

            // ...
        while ($dados = mysqli_fetch_array($resultado)) {
            echo "<tr>"; 
            echo "<td>" . $dados["nome_livro"] . "<br>";
            echo"<hr>";
            echo "<td>". $dados["nome_autor"] . "<br>";
            echo"<hr>";
            echo "<td>". "R$".$dados["preco"] . "<br>";
            echo "<form method='post' action='carrinho.php'>"; // O formulário envia dados para a página "carrinho.php"
            echo "<input type='hidden' name='id_livro' value='" . $dados["id_livro"] . "'>";
            echo "<input type='checkbox' name='selecionado[]' value='" . $dados["id_livro"] . "'>";
        
        }
        echo "</table>";
        echo "<input type='submit' id='sub_adicomprar' name='comprar' value='Comprar'>";
        echo "</form>";
        // ...


                // Feche o resultado após o uso
                mysqli_free_result($resultado);
            } else {
                // Lida com erros de consulta, se houverem
                echo "Erro na consulta: " . mysqli_error($conexao);
            }
            }
            ?>
    </main>
    <?php


                $conexao->close(); 
                ?>
    <script src="script.js"></script>
</body>

</html>
