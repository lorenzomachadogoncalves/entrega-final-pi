<?php
        include "../../model/participante/participante_model.php";
        include "../../model/contribuicao/contribuicao_model.php";
        $flag_form = $_POST["form_flag"] ?? "cadastrar";
        $id_associado = $_GET["id_associado"];
        $participante = visualizar_participante($_GET["id_associado"]);
        foreach($participante as $campos);
        if ($flag_form === "editar") {
            $resultado = visualizar_contribuicao($_GET["id_contribuicao"]);
            foreach ($resultado as $infos);
        }
?>
<form method="post" action="../../controller/contribuicao/contribuicao_control.php">
    <legend><?= ucfirst($flag_form) ?> contribuição</legend>
    <div class="mb-2">
        <label for="participante" class="form-label">Associado</label> 
        <input type="text" class="form-control" name="participante" id="participante" value="<?= $campos["nome"] ?>" disabled>
    </div>
    <div class="mb-2">
        <label for="data_pagamento" class="form-label">Data da contribuição</label>
        <input type="text" class="form-control" name="data_pagamento" id="data" value="<?= $flag_form === "editar" ? $infos["data_pagamento"] : "" ?>" required>
    </div>
    <div class="mb-2">
        <label for="valor" class="form-label">Valor da contribuição</label>
        <input type="text" class="form-control" name="valor" id="valor" value="<?= $flag_form === "editar" ? $infos["valor"] : "" ?>" required>
    </div>
    <div class="mb-2">
        <label for="metodo_pagamento" class="form-label">Método de pagamento</label>
        <input type="text" class="form-control" name="metodo_pagamento" id="metodo_pagamento" value="<?= $flag_form === "editar" ? $infos["metodo_pagamento"] : "" ?>" required>
    </div>
    <input type="hidden" name="id_associado" id="id_associado" value="<?= $id_associado ?>">
    <?php if ($flag_form === "editar"): ?>
        <input type="hidden" name="id_contribuicao" id="id_contribuicao" value="<?= $infos['id'] ?>">
        <button type="submit" class="btn btn-primary" name="opcao" value="editar">Editar</button>
        <button type="submit" class="btn btn-danger" name="opcao" value="excluir">Excluir</button>
    <?php elseif ($flag_form === "cadastrar"): ?>
        <button type="submit" class="btn btn-primary" name="opcao" value="cadastrar">Cadastrar</button>
    <?php endif; ?>
    <button type="button" class="btn btn-warning" onclick="window.location.href='view_contribuicao_participante.php?id_participante=<?= $id_associado ?>'">Cancelar</button>
</form>

<script src="../static/lib/jquery/jquery-3.7.1.min.js"></script>
<script src="../static/lib/jquery/jquery.mask.min.js"></script>
<script src="../static/lib/jquery/inputmask.min.js"></script>
<script src="../static/lib/jquery/data_mask.js"></script>
<script src="../static/lib/jquery/valor_mask.js"></script>
<script src="../static/lib/jquery/pagamento_mask.js"></script>