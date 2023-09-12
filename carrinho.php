<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
</head>
<body>
<?php
require_once "conexao/conexao.php";
session_start();
$usuario = $_SESSION['usuario'];
$carrinho=$_SESSION['carrinho'];
$itensAdicionados = 0; 
$itensSelecionados = isset($_POST["selecionado"]) ? $_POST["selecionado"] : [];
if (isset($_POST["comprar"])) {
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
        
        // Redirecione de volta à página anterior ou aonde desejar
      /*   header("Location: pagina_anterior.php");
        exit(); */
    }  if ($itensAdicionados > 0) {
        if ($itensAdicionados === 1) {
            echo "1 item adicionado ao carrinho com sucesso!";
        } else {
            echo $itensAdicionados . " itens adicionados ao carrinho com sucesso!";
        }
    } else {
        echo "Nenhum item selecionado.";
    }
}


?>
<h1> Aqui está seu carrinho</h1>
<?php 
$sql = "SELECT * FROM carrinho WHERE id_usuario='" . $usuario['id_usuario'] . "'";
$resultado = $conexao->query($sql);

if ($resultado) {
    while ($dados = mysqli_fetch_array($resultado)) {
        $verlivro = $dados['id_livro'];
        $sql = "SELECT * FROM livros WHERE id_livro='$verlivro'";
        $resultado2 = $conexao->query($sql);

        if ($resultado2) {
            while ($dados2 = mysqli_fetch_array($resultado2)) {
                echo "<tr>"; 
                echo "<td>" . $dados2["nome_livro"] . "<br>";
                echo "<td>" . "R$" . $dados2["preco"] . "<br>";
            }
        } else {
            echo "Erro ao buscar detalhes dos livros: " . $conexao->error;
        }
    }
} else {
    echo "Erro ao buscar itens no carrinho: " . $conexao->error;
}
?>
<a href="finalizacompra"<input type="submit" name="comprcarrinho" value="comprar">

</body>
</html>
