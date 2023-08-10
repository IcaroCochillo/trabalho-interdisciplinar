<?php
session_start();

if (isset($_SESSION['login'])) {
    // Inclua o arquivo de conexão com o banco de dados
    require 'C:\xampp\htdocs\SITE-ASW\conexao.php';

    $id_usuario = $_SESSION['login'];

    // Consulta para obter as informações do usuário
    $sql = "SELECT * FROM Usuario WHERE id = $id_usuario";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome = $row['nome'];
        $senha = $row['senha'];
        $datanascimento = $row['datanascimento'];
        $numtelefone = $row['numtelefone'];
    } else {
        echo "Nenhum dado de usuário encontrado.";
    }

    $conn->close(); // Feche a conexão com o banco de dados
} else {
    header('Location: login.php'); // Redirecione se o usuário não estiver autenticado
    exit; // Certifique-se de sair após o redirecionamento
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="editperfil.css">
    <title>Editar Perfil</title>
</head>
<body>
    <div class="container">
        <h1>Editar Perfil do Usuário</h1>
        <form action="operacao.php" method="POST">
            <label for="nome">Nome:</label><br>
            <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>"><br>
            <label for="senha">Senha:</label><br>
            <input type="text" id="senha" name="senha" value="<?php echo $senha; ?>"><br>
            <label for="datanascimento">Data de Nascimento:</label><br>
            <input type="date" id="datanascimento" name="datanascimento" value="<?php echo $datanascimento; ?>"><br>
            <label for="numtelefone">Número de Telefone:</label><br>
            <input type="text" id="numtelefone" name="numtelefone" value="<?php echo $numtelefone; ?>"><br>
            <button type="submit" name="editarperfil">Salvar Edições</button>
        </form>
        <button class="cancel-button" onclick="window.location.href = 'perfil.php';">Cancelar</button>
    </div>
</body>
</html>


