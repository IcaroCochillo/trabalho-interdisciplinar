<?php
session_start();
?>

<?php
require 'C:\xampp\htdocs\SITE-ASW\conexao.php';


if(isset($_POST['cadastrartime']))
{

    $data = $_POST['data'];
    $horario = $_POST['horario'];
    $modalidade = $_POST['modalidade'];
    $tipo_jogo = $_POST['tipo_jogo'];
    $id = $_POST['id'];


    $query = "INSERT INTO Jogo (data, horario, modalidade_codigo, usuario_id, tipo_jogo) VALUES ('$data', '$horario', '$modalidade', '$id', '$tipo_jogo')";


    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Usuário cadastrado com sucesso!";
        header("Location: cadastrar.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Erro ao cadastrar usuário";
            header("Location: cadastrar.php");
            exit(0);
    }
}

?>