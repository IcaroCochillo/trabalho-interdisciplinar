<?php
require 'C:\xampp\htdocs\SITE-ASW\conexao.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Consulta para excluir o evento com base no ID
    $excluir_sql = "DELETE FROM jogo WHERE id = '$id'";
    
    if ($conn->query($excluir_sql) === TRUE) {
        echo "Evento excluído com sucesso!";
    } else {
        echo "Erro ao excluir evento: " . $conn->error;
    }

    $conn->close(); // Fechar a conexão com o banco de dados
} else {
    echo "ID do evento não fornecido.";
}
?>