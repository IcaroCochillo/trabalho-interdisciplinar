<?php
require 'C:\xampp\htdocs\SITE-ASW\conexao.php';


if(isset($_POST['cadastrartime']))
{
    $nome = $_POST['nome'];
    $modalidade = $_POST['modalidade'];
    $id = $_POST['id'];

    $nome_sql = "SELECT codigo FROM `Time` WHERE nome = '$nome'";
    $nome_result = $conn->query($nome_sql);

    if ($nome_result->num_rows > 0) {
        echo "O nome de usuário já está cadastrado. Escolha outro nome de usuário.";

    } else{
            $query = "INSERT INTO Time (nome, modalidade_codigo, usuario_id ) VALUES ('$nome', '$modalidade', '$id')";

            $query_run = mysqli_query($conn, $query);
            if($query_run)
            {
                echo "Time cadastrado";
        
            }
            
            else
            {
        echo "erroa";
            }
        
        }
        

}

if(isset($_GET['excluirtime'])){
    $id = $_GET['id'];
    $deletar_sql = "DELETE FROM Time WHERE codigo='$id'";
    $query_run = mysqli_query($conn, $deletar_sql);

    if ($query_run) {
    } else {
    }
}

?>
 <button name="Voltar"><a href="../../menu.php">Voltar</a></ button>