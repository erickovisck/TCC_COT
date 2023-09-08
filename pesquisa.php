<div class="livro">
       <?php
   
       
      
  $pesquisa=$_SESSION['pesquisa'];
       $sql="SELECT * FROM livros WHERE nome_livro='$pesquisa'";
       $resultado=$conexao->query($sql);
    $dados=mysqli_fetch_array($resultado);
    $livros = array (
        "nome_livro"=>$dados['nome_livro'],
        "nome_autor"=>$dados['nome_autor'],
        "preco"=>$dados['preco'],

    );
    if($resultado){
       
    echo "Aqui está o livro que você procura <br>";
    $mens="Nome do livro: " .$livros['nome_livro']."<br>".
     "Autor: " . $livros['nome_autor']. "<br>".
     "Preço: R$" .  $livros['preco']. "<br><br>";
     echo $mens; 
    }elseif($resultado==NULL){

        echo"livro nao encontrado"; 
    }else{
        echo "erro na consulta". mysqli_error($conexao);
    }

       ?>

</div>
