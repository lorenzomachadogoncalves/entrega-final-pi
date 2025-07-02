<?php
    require_once ("../../utils/libs/dompdf/autoload.inc.php");
    use Dompdf\Dompdf;

    include ("../../model/participante/participante_model.php");
    include ("../../model/contribuicao/contribuicao_model.php");    

    $id = $_GET["id_participante"];
    $resultado = visualizar_participante($id);
    foreach ($resultado as $infos) {}
    $contribuicao = visualizar_contribuicao_participante($id);

    ob_start();
?>
<?php
  include ("../../view/components/skeleton/header.html");
?>

<h2>Contribuinte <?= $infos["nome"] ?></h2>
<table>
  <thead>
    <tr>
      <th>Data de pagamento</th>
      <th>Valor</th>
      <th>Método</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($contribuicao as $linha): ?>
      <tr>
        <td><?= $linha["data_pagamento"] ?></td>
        <td>R$ <?= number_format($linha["valor"], 2, ',', '.') ?></td>
        <td><?= $linha["metodo_pagamento"] ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php
    $html = ob_get_clean();

    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream("contribuicoes_{$infos['nome']}.pdf", ["Attachment" => true]);
?>