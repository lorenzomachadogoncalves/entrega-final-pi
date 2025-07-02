<?php
    include "../../model/agenda/agenda_model.php";

    $opcao = $_POST["opcao"];
    switch ($opcao) {
        case "cadastrar":
            $resultado = cadastrar_programacao($_POST["id_participante"], $_POST["id_oficina"], $_POST["dia_semana"], $_POST["inicio"], $_POST["fim"], $_POST["nome_participante"], $_POST["nome_oficina"]);
            if ($resultado === true) {
                header("Location: ../../view/agenda");
            } else {
                $erro = urlencode($resultado);
                header("Location: ../../view/agenda/view_agenda.php?erro=$erro&origem=cadastrar");
            }
            break;

        case "editar":
            $resultado = editar_programacao($_POST["id_participante"], $_POST["id_oficina"], $_POST["dia_semana"], $_POST["inicio"], $_POST["fim"], $_POST["id_programacao"], $_POST["nome_participante"], $_POST["nome_oficina"]);
            if ($resultado === true) {
                header("Location: ../../view/agenda");
            } else {
                
                $erro = urlencode($resultado);
                header("Location: ../../view/agenda/view_agenda.php?erro=$erro&origem=editar");
            }
            break;

        case "excluir":
            excluir_programacao($_POST["id_programacao"]);
            header("Location: ../../view/agenda");
            break;
    }
?>