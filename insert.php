<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert adm apenas</title>
</head>
<body>
    <form action="" method="post">
        <h1>nome</h1>
        <input type="text" name="nome">
        <h1>autor</h1>
        <input type="text" name="autor">
        <h1>preco</h1>
        <input type="text" name="preco">
        <input type="submit" name="enviar">
</form>
</body>
</html>
<?php
require_once "conexao/conexao.php";
$nome=$_POST['nome'];
$autor=$_POST['autor'];
$preco=$_POST['preco'];

$sql="INSERT INTO livros(nome_livro, nome_autor, preco) VALUES('$nome', '$autor', '$preco')";
$resultado=$conexao->query($sql);
if($resultado){
    echo"cadastrado";
}else{
    echo "erro";
}
?>