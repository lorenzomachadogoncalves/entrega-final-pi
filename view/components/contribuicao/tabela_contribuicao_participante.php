<?php   
    require_once ("../../utils/libs/dompdf/autoload.inc.php");
    use Dompdf\Dompdf;

    include ("../../model/participante/participante_model.php");
    include ("../../model/contribuicao/contribuicao_model.php");
    $resultado = visualizar_participante($_GET["id_participante"]);
    foreach ($resultado as $infos) {}
    $contribuicao = visualizar_contribuicao_participante($_GET["id_participante"]);

    ob_start();
?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1><?= $infos["nome"] ?></h1>
        </div>
        <div class="col d-flex justify-content-center">
            <form method="post" action="cadastrar_contribuicao.php?id_associado=<?= $infos['id'] ?>">
                    <button type="submit" class="btn btn-primary">Cadastrar contribuição</button>
            </form>
        </div>
        <div class="col">
            <a href="../../model/contribuicao/gerar_pdf_contribuicao.php?id_participante=<?= $infos['id'] ?>" class="btn btn-secondary" target="_blank">
                Gerar PDF das contribuições de <?= $infos["nome"] ?>
            </a>
        </div>
    </div>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Data de pagamento</th>
            <th scope="col">Valor</th>
            <th scope="col">Método de pagamento</th>
        </tr>
    </thead>
    <tbody>
            <?php foreach ($contribuicao as $linha): ?>
                <tr>
                <td><?= $linha["data_pagamento"] ?></td>
                <td>R$ <?= $linha["valor"] ?></td>
                <td><?= $linha["metodo_pagamento"] ?></td>
                <td>
                    <form method="post" action="../contribuicao/editar_contribuicao.php?id_contribuicao=
                    <?= $linha['id'] ?>&id_associado=<?= $infos['id'] ?>">
                        <input type="hidden" name="opcao" value="editar">
                        <input type="hidden" name="form_flag" value="editar">
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
    </tbody>
</table>