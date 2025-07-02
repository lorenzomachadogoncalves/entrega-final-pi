<?php
    include "../../model/agenda/agenda_model.php";
    $flag_form = $_GET["form_flag"] ?? "cadastrar";
    $dados = [
        "dia_semana" => "",
        "id_participante" => "",
        "id_oficina" => "",
        "inicio" => "",
        "fim" => "",
    ];

    if ($flag_form === "editar") {
        $resultado = visualizar_programacao($_GET["id_programacao"]);
        foreach ($resultado as $infos);
        $dados = [
            "dia_semana" => $infos['dia_semana'],
            "id_participante" => $infos['id_participante'],
            "id_oficina" => $infos['id_oficina'],
            "inicio" => $infos['horario_inicio'],
            "fim" => $infos['horario_fim'],
        ];
    }
?>
<form method="post" action="../../controller/agenda/agenda_control.php">
    <div class="mb-2">
        <legend><?= ucfirst($flag_form) ?> programação</legend>
        <?php if ($flag_form === "editar"): ?>
            <input type="hidden" name="id_programacao" value="<?= $_GET['id_programacao'] ?>">
        <?php endif; ?>
    </div>
    
    <div class="mb-2">
        <label for="dia_semana" class="form-label">Dia da semana</label>
        <select name="dia_semana" class="form-select" id="dia_semana">
            <?php
                $dias = ["segunda", "terça", "quarta", "quinta", "sexta", "sábado", "domingo"];
                foreach ($dias as $dia) {
                    $selected = ($dados["dia_semana"] === $dia) ? "selected" : "";
                    echo "<option value='$dia' $selected>" . ucfirst($dia) . "</option>";
                }
            ?>
        </select>
    </div>
    
    <div class="mb-2">
        <label for="professor" class="form-label">Professor</label>
        <select name="id_participante" class="form-select" id="professor" onchange="atualizarProfessor()">
            <?php
                include "../../model/participante/participante_model.php";
                $professores = visualizar_professores();
                foreach ($professores as $prof) {
                    $selected = ($dados["id_participante"] == $prof["id"]) ? "selected" : "";
                    echo "<option value='{$prof['id']}' $selected>{$prof['nome']}</option>";
                }
            ?>
        </select>
        <input type="hidden" name="nome_participante" id="nome_participante">
    </div>

    <div class="mb-2">
        <label for="oficina" class="form-label">Oficina</label>
        <select name="id_oficina" class="form-select" id="oficina" onchange="atualizarOficina()">
            <?php
                include "../../model/oficina/oficina_model.php";
                $oficinas = visualizar_todas_oficinas();
                foreach ($oficinas as $oficina) {
                    $selected = ($dados["id_oficina"] == $oficina["id"]) ? "selected" : "";
                    echo "<option value='{$oficina['id']}' $selected>{$oficina['nome']}</option>";
                }
            ?>
        </select>
        <input type="hidden" name="nome_oficina" id="nome_oficina">
    </div>
    
    <div class="mb-2">
        <label for="inicio" class="form-label">Horário de início</label>
        <input type="time" class="form-control" name="inicio" id="inicio" value="<?= $dados["inicio"] ?>">
    </div>
    
    <div class="mb-2">
        <label for="fim" class="form-label">Horário de fim</label>
        <input type="time" class="form-control" name="fim" id="fim" value="<?= $dados["fim"] ?>">
    </div>

    <?php if ($flag_form === "editar"): ?>
        <button type="submit" class="btn btn-primary" name="opcao" value="editar">Editar</button>
        <button type="submit" class="btn btn-danger" name="opcao" value="excluir">Excluir</button>
    <?php elseif ($flag_form === "cadastrar"): ?>
        <button type="submit" class="btn btn-primary" name="opcao" value="cadastrar">Cadastrar</button>
    <?php endif; ?>
    <button type="button" class="btn btn-warning" onclick="window.location.href='../agenda'">Cancelar</button>
</form>

<script>
function atualizarProfessor() {
    const select = document.getElementById("professor");
    const nome = select.options[select.selectedIndex].text;
    document.getElementById("nome_participante").value = nome;
}
function atualizarOficina() {
    const select = document.getElementById("oficina");
    const nome = select.options[select.selectedIndex].text;
    document.getElementById("nome_oficina").value = nome;
}

window.onload = function () {
    atualizarOficina();
    atualizarProfessor();
};
</script>


