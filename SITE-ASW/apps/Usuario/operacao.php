<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>


<?php
require 'C:\xampp\htdocs\SITE-ASW\conexao.php';
session_start();

if (isset($_POST['cadastrarusuario'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $datanascimento = $_POST['datanascimento'];
    $numtelefone = $_POST['numtelefone'];
    $senha = $_POST['senha'];

    $email_sql = "SELECT id FROM Usuario WHERE email = '$email'";
    $email_result = $conn->query($email_sql);

    $nome_sql = "SELECT id FROM Usuario WHERE nome = '$nome'";
    $nome_result = $conn->query($nome_sql);

    if ($email_result->num_rows > 0) {
        echo "O email já está cadastrado. Escolha outro email.";
    } elseif ($nome_result->num_rows > 0) {
        echo "O nome de usuário já está cadastrado. Escolha outro nome de usuário.";
    } else {
        $cadastro_sql = "INSERT INTO Usuario (nome, email, datanascimento, numtelefone, senha) VALUES ('$nome', '$email', '$datanascimento', '$numtelefone', '$senha')";
        
        if ($conn->query($cadastro_sql) === TRUE) {
            $_SESSION['message'] = "Usuário cadastrado com sucesso!";

            header("Location: cadastrar.php");
            exit(0);
    
        } else {
            $_SESSION['message'] = "Erro ao cadastrar usuário";
            header("Location: cadastrar.php");
            exit(0);
        }
    }
}

if (isset($_POST['editarperfil'])) {
    // Inclua o arquivo de conexão com o banco de dados

    $id_usuario = $_SESSION['login'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $datanascimento = $_POST['datanascimento'];
    $numtelefone = $_POST['numtelefone'];

    $nome_sql = "SELECT id FROM Usuario WHERE nome = '$nome'";
    $nome_result = $conn->query($nome_sql);

    
        $atualizar_sql = "UPDATE Usuario SET nome = '$nome', senha = '$senha', datanascimento = '$datanascimento', numtelefone = '$numtelefone' WHERE id = '$id_usuario'";

        if ($conn->query($atualizar_sql) === TRUE) {
            header("Location: perfil.php");
        } else {
            $_SESSION['message'] = "Erro ao atualizar as informações do perfil: " . $conn->error;
        }

        $conn->close(); // Feche a conexão com o banco de dados
  
}

if(isset($_GET['excluirperfil'])){
    $id = $_GET['id'];
    $deletar_sql = "DELETE FROM Usuario WHERE id='$id'";
    $query_run = mysqli_query($conn, $deletar_sql);

    if ($query_run) {
        $_SESSION['message'] = "conta deletada!";
        unset($_SESSION['login']);
        session_destroy();
        header("Location: ../../paginicial.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Erro ao cadastrar usuário";
        header("Location: cadastrar.php");
        exit(0);
    }
}
?>