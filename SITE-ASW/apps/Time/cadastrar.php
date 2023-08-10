<?php
session_start();
?>

<html lang="pt-br">
  <head>
    <title>CRUD com PHP, de forma simples e fácil</title>
    <link rel="stylesheet" href="cadastrartime.css" >
  </head>
  <body>
    <?php
      require 'C:\xampp\htdocs\SITE-ASW\conexao.php';
      $sql = "select `codigo`, `nome` from `modalidade`;";
      $result = mysqli_query($conn, $sql)
    ?>
	<form action="operacao.php" method="POST">
	  Nome:<br/> 
	  <input type="text" name="nome" placeholder="Time"><br/><br/>

    Modalidade:<br/>
    <select name="modalidade" id="cars">
      <option value="Selecione" selected>Selecione</option>

      <?php
        while ($dados = mysqli_fetch_assoc($result)){
      ?>
      <option value="<?php echo $dados['codigo'] ?>"><?php echo $dados['nome'] ?></option>
      <?php
        }

     
      ?>
    </select>
	  <input type="hidden" name="id" value="<?php echo $_SESSION['login']; ?>"><br/><br/>


	  <button type="submit" name="cadastrartime">Cadastrar</button>

     <button name="Voltar"><a href="../../menu.php">Voltar</a></ button>

    
	</form>
  
  </body>
</html>