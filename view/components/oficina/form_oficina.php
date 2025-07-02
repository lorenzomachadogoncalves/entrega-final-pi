<?php
        include "../../model/oficina/oficina_model.php";
        $flag_form = $_POST["form_flag"] ?? "cadastrar";
        if ($flag_form === "editar") {
            $resultado = visualizar_oficina($_GET["id_oficina"]);
            foreach ($resultado as $infos);
        }
?>
<form method="post" action="../../controller/oficina/oficina_control.php">
    <legend><?= ucfirst($flag_form) ?> oficina</legend>
    <div class="mb-2">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" class="form-control" name="titulo" id="titulo" value="<?= $flag_form === "editar" ? $infos["nome"] : "" ?>" required>
    </div>
    <div class="mb-2">
        <label for="descricao" class="form-label">Descrição</label>
        <input type="text" class="form-control" name="descricao" id="descricao" value="<?= $flag_form === "editar" ? $infos["descricao"] : "" ?>" required>
    </div>
    <input type="hidden" name="id_oficina" id="id_oficina" value="<?=$infos["id"]?>">
    <?php if ($flag_form === "editar"): ?>
        <button type="submit" class="btn btn-primary" name="opcao" value="editar">Editar</button>
        <button type="submit" class="btn btn-danger" name="opcao" value="excluir">Excluir</button>
    <?php elseif ($flag_form === "cadastrar"): ?>
        <button type="submit" class="btn btn-primary" name="opcao" value="cadastrar">Cadastrar</button>
    <?php endif; ?>
    <button type="button" class="btn btn-warning" onclick="window.location.href='../oficina'">Cancelar</button>
</form>

<script src="../static/lib/jquery/jquery-3.7.1.min.js"></script>
<script src="../static/lib/jquery/jquery.mask.min.js"></script>
<script src="../static/lib/jquery/inputmask.min.js"></script>
<script src="../static/lib/jquery/titulo_mask.js"></script>
<script src="../static/lib/jquery/descricao_mask.js"></script>