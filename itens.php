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
        <nav role="navigation">
            <div id="menuToggle">

                <input type="checkbox" />
                <span></span>
                <span></span>
                <span></span>



                <ul id="menu">
                    <h2>Usuário: <?= $usuario['nome_usuario']?> </h2>
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
                echo "Erro na consulta: " . mysqli_error($sql);
            
            
            
            
            
            
            
            
            
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
