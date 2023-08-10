<?php
require 'C:\xampp\htdocs\SITE-ASW\conexao.php';


if(isset($_POST['cadastrarmodalidade']))
{
    $nomeModalidade = $_POST['nomeModalidade'];

    $nome_sql = "SELECT nome FROM `Modalidade` WHERE nome = '$nomeModalidade'";
    $nome_result = $conn->query($nome_sql);

    if ($nome_result->num_rows > 0) {
        echo "Modalidade já cadastrada.";

    } else{
            $query = "INSERT INTO Modalidade (nome) VALUES ('$nomeModalidade')";
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

?>