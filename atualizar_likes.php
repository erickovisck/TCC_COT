<?php
require_once "conexao/conexao.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    
    // Verifique se as variáveis estão definidas
    if (isset($_POST['id_mensagem']) && isset($_POST['cont_like'])) {
        // Recupere o ID da mensagem e a nova contagem de likes da solicitação AJAX
        $data->data;
        $messageId = $daa['id_mensagem'];
        $newLikeCount = $_POST['cont_like'];
        
        // Crie uma consulta SQL segura para evitar injeção de SQL
        $sqlUpdate = "UPDATE chat_geral SET cont_like = $newLikeCount WHERE id_mensagem = $messageId";
        
        // Prepare a consulta
        $stmt = $conexao->prepare($sqlUpdate);
        
        // Vincule os parâmetros
        $stmt->bind_param("ii", $newLikeCount, $messageId);
        
        // Execute a consulta SQL
        if ($stmt->execute()) {
            // A atualização foi bem-sucedida
            echo "Contagem de likes atualizada com sucesso!";
        } else {
            // Lida com erros, se houverem
            echo "Erro na atualização da contagem de likes: " . $stmt->error;
        }
        
        // Feche a conexão com o banco de dados
        $stmt->close();
    } else {
        echo "Parâmetros ausentes.";
    }
}
?>
