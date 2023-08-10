<?php
require 'C:\xampp\htdocs\SITE-ASW\conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Modalidade</title>
</head>
<body>
    <h2>Inserir Nova Modalidade</h2>
    <form action="operacao.php" method="POST">
        <label for="nomeModalidade">Nome da Modalidade:</label>
        <input type="text" id="nomeModalidade" name="nomeModalidade" required>
        <br>
        <input type="submit" name="cadastrarmodalidade">
    </form>
</body>
</html>

