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
    $usuario=$_SESSION['usuario'];

    $carrinho=$_SESSION['carrinho'];
    echo $carrinho["quantidade"];
    $sql="INSERT INTO carrinho(id_livro,id_usuario,quantidade)
    VALUES ('".$carrinho['id_livro']."','".$usuario['id_usuario']."' , '".$carrinho['id_livro']."')";
    $resultado=$conexao->query($sql);
    if($resultado){
        echo "seu carrinho";
    }else{
        echo mysqli_error($conexao);
    }
    ?>
</body>
</html>