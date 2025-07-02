<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/lib/bootstrap-5.3.6-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../static/css/rounded_table.css">
    <script src="../static/lib/js/agenda_message.js" defer></script>
    <title>Agenda ACDV</title>
</head>
<body>
  <div class="container">
    <?php
      include ("../components/skeleton/header.html");
      include ("../components/skeleton/breadcrumb.php");
      $erro = isset($_GET['erro']) ? urldecode($_GET['erro']) : null;
      $origem = isset($_GET['origem']) ? $_GET['origem'] : null;
    ?>
    <?php if ($erro): ?>
        <?php
          include ("../components/agenda/mensagem_erro.php");  
        ?>
    <?php endif; ?>
    <div class="row">
        <div class="col d-flex justify-content-start ms-3">
            <h2>Programação semanal</h2>
        </div>
        <div class="col d-flex justify-content-end">
          <form action="cadastrar_agenda.php">
            <button type="submit" class="btn btn-primary">Cadastrar programação</button>
          </form>
        </div>
        <div class="col d-flex justify-content-end mb-2">
          <button type="button" class="btn btn-success ms-2" onclick="compartilharAgenda()">
              Compartilhar via whatsapp
          </button>
        </div>
    </div>
    <?php
      include ("../components/agenda/tabela_agenda.php");
    ?>
  </div>
</body>
</html>