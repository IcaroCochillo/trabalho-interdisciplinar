<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/inicial.css">
    <title>IFBAIANO Sports</title>
</head>
<body>
    
    <div class="cabecalho">
        <div class="titulo">IFBAIANO Sports</div>
        <div class="redes-sociais">
        <a href="#" class="icone-instagram"></a>
        <?php


if (isset($_SESSION['login']) && !empty($_SESSION['login'])) {
  echo '<a style="color: green; background-color: white; padding: 5px 10px; border-radius: 4px; text-decoration: none;" href="?logout">Fazer logout!</a>';

    if (isset($_GET['logout'])) {
        unset($_SESSION['login']);
        session_destroy();
        header('Location: login.php'); // Redirecionar para a página de login após o logout
    }
} else {
    echo '<a style="color: red;" href="login.php">Fazer login!</a>';
}

?>



        </div>
        <a href="https://www.ifbaiano.edu.br/unidades/guanambi/" class="botao-site-oficial" target="_blank">Site oficial do IFBAIANO</a>
    </div>
      
    <div class="conteudo1">
      <div class="textoGG">Otimize suas <br> atividades esportivas</div>
      <div class="textoMM">Gerencie eficientemente todas as atividades esportivas do IFBAIANO <br> com nosso sistema de gerenciamento.</div>
      <div class="botao">
        <a href="apps/Usuario\cadastrar.php"  >Experimente agora</a>
      </div>
    </div>
    <div class="conteudo2">
  <img class="img" src="img/if_vista_aerea.jpg" alt="">
  <div class="texto">

    <h1 class="t">Nosso objetivo</h1>
    <p>Desenvolvemos um software feito sob medida para o gerenciamento das atividades esportivas do Ifbaiano, possibilitando a gestão eficiente dos eventos, inscrições, participantes, resultados.</p>
  </div>
</div>

<div class="conteudo3">
  <div class="texto2">
    <h1 class="t">Sobre nós</h1>
    <p class="p">Somos a IFBAIANO Sports, uma empresa que oferece um sistema de gerenciamento das atividades esportivas do IFBAiano em Guanambi, BA. Nosso objetivo é proporcionar uma experiência esportiva de qualidade para todos os alunos e funcionários do IFBA, tornando a prática de atividades físicas mais acessível e organizada.
      <br><br>
    Com uma equipe altamente qualificada e comprometida, trabalhamos diariamente para garantir que nossos clientes tenham acesso a um sistema eficiente e moderno, que facilite a gestão e a realização das atividades esportivas. Estamos sempre em busca de inovação e aprimoramento, para oferecer soluções cada vez mais completas e personalizadas aos nossos clientes.</p>
  </div>
  <img class="img" src="img/IF-Baiano-Campus-Guanambi-2022.jpg" alt="">
</div>

<div class="rodape">
        &copy; <?php echo date("Y"); ?> IFBAIANO Sports - Todos os direitos reservados.
    </div>

</body>
</html>
