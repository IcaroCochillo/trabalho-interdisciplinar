<?php
session_start();

if (isset($_SESSION['login'])) {
    // Inclua o arquivo de conexão com o banco de dados
    require 'C:\xampp\htdocs\SITE-ASW\conexao.php';

    $id_usuario = $_SESSION['login'];

    // Consulta para obter as informações do usuário
    $sql = "SELECT nome, email, datanascimento, numtelefone FROM Usuario WHERE id = $id_usuario";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome = $row['nome'];
        $email = $row['email'];
        $datanascimento = $row['datanascimento'];
        $numtelefone = $row['numtelefone'];
    } else {
        echo "Nenhum dado de usuário encontrado.";
    }

    $conn->close(); // Feche a conexão com o banco de dados
} else {
    header('Location: ../../login.php'); // Redirecione se o usuário não estiver autenticado
    exit; // Certifique-se de sair após o redirecionamento
}
?>





<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="perfil.css">
    <title>Perfil</title>
</head>
<body>
<div class="container">
    <h1>Perfil do Usuário</h1>
    <p>Nome: <?php echo $nome; ?></p>
    <p>Email: <?php echo $email; ?></p>
    <p>Data de Nascimento: <?php echo $datanascimento; ?></p>
    <p>Número de Telefone: <?php echo $numtelefone; ?></p>
    <a href="editperfil.php">Editar Perfil</a><br>
    <form method="GET" action="operacao.php">
            <input name="id" type="hidden" value="<?php echo $id_usuario;?>"/>
            <button name="excluirperfil" style='border-radius: 10px;width:80px;height:30px;background-color:red ;margin-right:5px; cursor:pointer;font-size:15px;' type="submit">Excluir</button> <br><br>
    </form>
    <button name="Voltar"><a href="../../menu.php">Voltar</a></ button>
</body>
</html>
