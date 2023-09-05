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
    echo $livros['nome_livro'] ;
    echo "<br>";
    echo $livros['nome_autor'];
    echo "<br>";
    echo $livros['preco'];
    }elseif($resultado==NULL){

        echo"livro nao encontrado"; 
    }else{
        echo "erro na consulta". mysqli_error($conexao);
    }

       ?>

</div>
