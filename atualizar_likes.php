
<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // Receba os dados do JavaScript
    $id_mensagem = $_POST['id_mensagem'];
   $cont_like = $_POST['cont_like'] ;

   $sql = "UPDATE chat_geral SET cont_like = $cont_like WHERE id_mensagem = $id_mensagem";

   if ($conexao->query($sql) === TRUE) {
       echo 'cont_like atualizado com sucesso.';
   } else {
       echo 'Erro ao atualizar cont_like: ' . $conexao->error;
   }    

   // Feche a conexão com o banco de dados
   $conexao->close();
}



?>

