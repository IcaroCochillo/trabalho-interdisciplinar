<?php 

    require 'C:\xampp\htdocs\SITE-ASW\conexao.php';

    $sql = "select * from `time`;";
    $result = mysqli_query($conn, $sql)


?>     
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="listar.css">
    <title>Lista de Times</title>
</head>
<body>
    <div class="princ">
        <h2>Lista de Times</h2>
        <table> 
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>USUÁRIO</th>
                    <th>MODALIDADE</th>
                </tr>
            </thead>

            <tbody>
                <?php while ($value = mysqli_fetch_assoc($result)) { 
                    if (isset($value['modalidade_codigo'])) {
                        $modalidadeId = $value['modalidade_codigo'];
                        $modalidadeQuery = "SELECT nome FROM `modalidade` WHERE codigo='$modalidadeId';";
                        $modalidadeResult = mysqli_query($conn, $modalidadeQuery);

                        if ($modalidadeResult && mysqli_num_rows($modalidadeResult) > 0) {
                            $modalidadeData = mysqli_fetch_assoc($modalidadeResult);
                            $modalidadeNome = $modalidadeData['nome'];
                        } else {
                            $modalidadeNome = "Modalidade Desconhecida";
                        }
                    } else {
                        $modalidadeNome = "Modalidade não especificada";
                    }

                    if (isset($value['usuario_id'])) {
                        $usuarioId = $value['usuario_id'];
                        $usuarioQuery = "SELECT nome FROM `usuario` WHERE id='$usuarioId';";
                        $usuarioResult = mysqli_query($conn, $usuarioQuery);

                        if ($usuarioResult && mysqli_num_rows($usuarioResult) > 0) {
                            $usuarioData = mysqli_fetch_assoc($usuarioResult);
                            $usuarioNome = $usuarioData['nome'];
                        } else {
                            $usuarioNome = "Usuario Desconhecida";
                        }
                    } else {
                        $usuarioNome = "Usuario não especificada";
                    }
                ?>
                <tr>
                    <td><?php echo $value['codigo'] ?></td> 
                    <td><?php echo $value['nome'] ?></td> 
                    <td><?php echo $usuarioNome ?></td> 
                    <td><?php echo $modalidadeNome ?></td> 
                    <td>
                        <form method="GET" action="operacao.php">
                            <input name="id" type="hidden" value="<?php echo $value['codigo'] ?>"/>
                            <button class="excluir-button" type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
                <?php } ?> 
            </tbody>
        </table>
        <button class="voltar-button"><a href="../../menu.php">Voltar</a></button>
    </div>
</body>
</html>
