<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <?php 
            require 'C:\xampp\htdocs\SITE-ASW\conexao.php';
            session_start();

            if (!isset($_SESSION['login'])) {
                if (isset($_POST['acao'])) {
                    $emailForm = $_POST['login'];
                    $senhaForm = $_POST['senha'];
                    
                    $sql = "SELECT id FROM Usuario WHERE email = '$emailForm' AND senha = '$senhaForm'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Credenciais válidas
                        $row = $result->fetch_assoc();
                        $_SESSION['login'] = $row['id'];
                        header('Location: menu.php');
                    } else {
                        // Algum erro ocorreu.
                        echo '<p class="error-message">Dados inválidos.</p>';
                    }
                }
                ?>
                <form method="post" class="login-form">
                    <input type="text" name="login" placeholder="Email">
                    <input type="password" name="senha" placeholder="Senha">
                    <input type="submit" name="acao" value="Enviar">
                </form>
                <button onclick="window.location.href = 'paginicial.php';">Cancelar</button>
                <?php
            }
        ?>
    </div>
</body>
</html>
