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
    <!-- Metatags, título, estilos, etc. -->
</head>
<body>
    
    <h1>Seu carrinho</h1>
    <?php 
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
    if(isset($_POST["comprarcarrinho"])){
        $sql2="SELECT * FROM cartao_credito WHERE numero_cartao='".$usuario['numero_cartao']."'";
        $resultado3=$conexao->query($sql2);
        $dados = mysqli_fetch_array($resultado3);
        if($dados['limite']>=$totalpreco){
        $sqll="DELETE FROM carrinho WHERE id_usuario='".$usuario["id_usuario"]."'";
        $resultado=$conexao->query($sqll);
        if($resultado){
           
            header("Location: carrinho.php");
            echo "Compra realizada com sucesso!"; 
             $novolimite=$dados['limite']-$totalpreco;
             $sql3="UPDATE cartao_credito
             SET limite='$novolimite'
             WHERE numero_cartao='".$usuario['numero_cartao']."' ";
             $resultado5=$conexao->query($sql3);
             if(!$resultado5){
                echo $conexao->error();
             }
        }else{
            echo "erro na sua compra".$conexao->error;
        }
    }else{
        $saldo= "saldo insuficiente (R$". $dados['limite'].")";  
    }
}
    ?>
    <form method="post" action="">
        <h2> Valor total R$<?=$totalpreco?>
        <input type="submit" name="comprarcarrinho" value="Comprar"> </input>
        <h3><?= $saldo?> </h3>
    </form>
</body>
</html>

</body>
</html>
