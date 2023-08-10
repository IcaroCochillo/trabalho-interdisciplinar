<?php
    require 'C:\xampp\htdocs\SITE-ASW\conexao.php';
    $sql = "select * from `Jogo`;";
    $result = mysqli_query($conn, $sql)
?>

<!DOCTYPE html>
<html lang='pt-br'>
  <head>
    <meta charset='utf-8' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Adicione o jQuery -->
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          header: 'dayGridMonth',
          contentHeight: 650,
          timeZone: 'UTC',
          events: [
            <?php
                while ($dados = mysqli_fetch_assoc($result)) {
                    if (isset($dados['modalidade_codigo'])) {
                        $modalidadeId = $dados['modalidade_codigo'];
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
                ?>
                {
                    id: <?php echo $dados['id']; ?>,
                    title: '<?php echo $modalidadeNome; ?>',
                    start: '<?php echo $dados['data']; ?>',
                },
                <?php
                }
                ?>
            ],
            selectable: true,
            eventClick: function(info) {
                if (confirm("Deseja excluir este evento?")) {
                    $.ajax({
                        type: "POST",
                        url: "excluir_evento.php", // Crie um arquivo PHP para lidar com a exclusão
                        data: { id: info.event.id }, // Passar o ID do evento para o PHP
                        success: function(response) {
                        alert(response); // Exibir a resposta do PHP
                        calendar.refetchEvents();
                        }
                    });
                }
            },
            locale: 'pt-br'

        });
        calendar.render();
      });

    </script>
  </head>
  <body>
    <div id='calendar'></div>
    <button class='button'><a href='../../menu.php'>Voltar</a></button>


    <style>



.button{
    text-align: center;
    margin-top: 10px;
    padding: 10px 20px;
    background-color: #265F29;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    display: block;
    margin: 0 auto;
    text-decoration: none;
    margin-top: 20px;
    width: 30%;
}

.voltar-button a {
    text-decoration: none;
    color: white;
}


    </style>
  </body>
</html>


