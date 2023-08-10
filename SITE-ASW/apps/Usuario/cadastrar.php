<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastrouser.css">
    <title>Cadastro de Usuário</title>
</head>
<body>

<?php 
include('C:\xampp\htdocs\SITE-ASW\message.php'); ?>

<div class="container">
    <h1>Cadastro de Usuário</h1>

    <form action="operacao.php" method="POST">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome"><br>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email"><br>
        <label for="datanascimento">Data de Nascimento:</label><br>
        <input type="date" id="datanascimento" name="datanascimento"><br>
        <label for="numtelefone">Número de Telefone:</label><br>
        <input type="text" id="numtelefone" name="numtelefone"><br>
        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha"><br>
        <button type="submit" name="cadastrarusuario" >Cadastrar</button>
    </form>

    <button class="voltar-button"><a href="../../paginicial.php">Voltar</a></button>
</div>

</body>
</html>
