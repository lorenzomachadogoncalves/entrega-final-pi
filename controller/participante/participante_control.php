<?php
    include "../../model/participante/participante_model.php";

    $opcao = $_POST["opcao"];

    switch ($opcao) {
        case "cadastrar":
            cadastrar_participante($_POST["nome"], $_POST["ocupacao"], $_POST["telefone"], $_POST["ativo"], $_POST["associado"], );
            header("Location: ../../view/participante/view_list_participante.php");
            break;

        case "editar":
            editar_participante($_POST["nome"], $_POST["ocupacao"], $_POST["telefone"], $_POST["ativo"], $_POST["associado"], $_POST["id_participante"]);
            header("Location: ../../view/participante/view_list_participante.php");
            break;

        case "excluir":
            excluir_participante($_POST["id_participante"]);
            header("Location: ../../view/participante/view_list_participante.php");
            break;

        case "ativar":
            ativar_participante($_POST["id_participante"]);
            header("Location: ../../view/participante/view_list_participante.php");
            break;

        case "desativar":
            desativar_participante($_POST["id_participante"]);
            header("Location: ../../view/participante/view_list_participante.php");
            break;
    }
?>