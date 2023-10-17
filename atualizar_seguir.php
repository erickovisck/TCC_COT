<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifique se o usuário está logado (você pode personalizar essa verificação)
    if (isset($_SESSION['usuario'])) {
        $idUsuario = $_POST['id_usuario'];
        $seguir = $_POST['seguir'];

        // Conecte-se ao seu banco de dados (substitua com as informações do seu banco)

        if ($conexao->connect_error) {
            die("Falha na conexão com o banco de dados: " . $conexao->connect_error);
        }

        if ($seguir === 'true') {
            // Ação para seguir
            $sql="INSERT INTO seguir (id_seguido, id_seguidor) VALUES ('$idUsuario' , '$idUsuario')";
           /*  $sql = "UPDATE usuario SET cont_seguindo = cont_seguindo + 1 WHERE id_usuario = $idUsuario"; */
        } else {
            // Ação para deixar de seguir
        }

        if ($conexao->query($sql) === true) {
            echo "Ação de seguir atualizada com sucesso.";
        } else {
            echo "Erro na atualização da ação de seguir: " . $conexao->error;
        }

        $conexao->close();
    } else {
        echo "Usuário não autenticado. Faça o login para seguir.";
    }
} else {
    echo "Método de solicitação inválido.";
}
