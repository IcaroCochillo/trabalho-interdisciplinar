<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadjogo.css">
    <title>Cadastro de Jogos</title>
</head>
<body>

<?php
    require 'C:\xampp\htdocs\SITE-ASW\conexao.php';
    $sql = "select `codigo`, `nome` from `modalidade`;";
    $result = mysqli_query($conn, $sql);
?>

<div class="princ">
    <h1>Cadastro de Jogos</h1>
    <form action="operacao.php" method="POST">
        <label for="data">Data:</label><br> 
        <input type="date" name="data" ><br><br>

        <label for="horario">Horário:</label><br> 
        <input type="time" name="horario" ><br><br>

        <label for="modalidade">Modalidade:</label><br>
        <select name="modalidade" id="modalidade" >
            <option value="Selecione" selected>Selecione</option>
            <?php
                while ($dados = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $dados['codigo'] . '">' . $dados['nome'] . '</option>';
                }
            ?>
        </select>
        
        <label for="tipo_jogo"> Qual é o tipo de jogo?</label><br><br>
        <div class="radio-group">
            <input type="radio" class="tipo_jogo" name="tipo_jogo" id="radiov" value="Seletiva" >
            <label for="radiov">Seletiva</label><br>
            <input type="radio" class="tipo_jogo" name="tipo_jogo" id="radiof" value="Amistoso">
            <label for="radiof">Amistoso</label><br>
        </div>
        <input type="hidden" name="id" value="<?php echo $_SESSION['login']; ?>">
        <button type="submit" name="cadastrartime">Cadastrar</button>
        <button class="voltar-button"><a href="../../menu.php">Voltar</a></button>
    </form>

</div>


</body>
</html>
