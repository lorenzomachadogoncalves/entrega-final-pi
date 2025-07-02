<?php
        include "../../model/participante/participante_model.php";
        $flag_form = $_POST["form_flag"] ?? "cadastrar";
        if ($flag_form === "editar") {
            $resultado = visualizar_participante($_GET["id_participante"]);
            foreach ($resultado as $infos);
        }
?>
<form id="form" method="post" action="../../controller/participante/participante_control.php">
    <legend><?= ucfirst($flag_form) ?> participante</legend>
    <div class="mb-2">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome" value="<?= $flag_form === "editar" ? $infos["nome"] : "" ?>" required>
    </div>

    <div class="mb-2">
        <label for="ocupacao" class="form-label">Ocupação</label>
        <input type="text" class="form-control" name="ocupacao" id="ocupacao" value="<?= $flag_form === "editar" ? $infos["ocupacao"] : "" ?>" required>
    </div>

    <div class="mb-2">
        <label for="telefone" class="form-label">Telefone</label>
        <input type="tel" class="form-control" name="telefone" id="telefone" value="<?= $flag_form === "editar" ? $infos["telefone"] : "" ?>" required>
    </div>

    <div class="mb-2">
        <label for="ativo" class="form-label">Está ativo?</label>
        <select name="ativo" class="form-select" id="ativo" required>
            <option value="1" <?= isset($infos["is_ativo"]) && $infos["is_ativo"] == 1 ? "selected" : ""?> >Sim</option>
            <option value="0" <?= isset($infos["is_ativo"]) && $infos["is_ativo"] == 0 ? "selected" : ""?> >Não</option>
        </select>
    </div>

    <div class="mb-2">
        <label for="associado" class="form-label">É associado?</label>
        <select name="associado" class="form-select" id="associado" required>
            <option value="1" <?= isset($infos["is_associado"]) && $infos["is_associado"] == 1 ? "selected" : ""?> >Sim</option>
            <option value="0" <?= isset($infos["is_associado"]) && $infos["is_associado"] == 0 ? "selected" : ""?> >Não</option>
        </select>
    </div>
    <input type="hidden" name="id_participante" id="id_participante" value="<?=$infos["id"]?>">
    <?php if ($flag_form === "editar"): ?>
        <button type="submit" class="btn btn-primary" name="opcao" value="editar">Editar</button>
        <button type="submit" class="btn btn-danger" name="opcao" value="excluir">Excluir</button>
    <?php elseif ($flag_form === "cadastrar"): ?>
        <button type="submit" class="btn btn-primary" name="opcao" value="cadastrar">Cadastrar</button>
    <?php endif; ?>
    <button type="button" class="btn btn-warning" onclick="window.location.href='../participante'">Cancelar</button>
</form>

<script src="../static/lib/jquery/jquery-3.7.1.min.js"></script>
<script src="../static/lib/jquery/inputmask.min.js"></script>
<script src="../static/lib/jquery/telefone_mask.js"></script>
<script src="../static/lib/jquery/nome_mask.js"></script>
<script src="../static/lib/jquery/ocupacao_mask.js"></script>