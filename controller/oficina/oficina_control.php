<?php
    include "../../model/oficina/oficina_model.php";

    $opcao = $_POST["opcao"];
    switch ($opcao) {
        case "cadastrar":
            cadastrar_oficina($_POST["titulo"], $_POST["descricao"]);
            header("Location: ../../view/oficina/");
            break;

        case "editar":
            editar_oficina($_POST["titulo"], $_POST["descricao"], $_POST["id_oficina"]);
            header("Location: ../../view/oficina/");
            break;

        case "excluir":
            excluir_oficina($_POST["id_oficina"]);
            header("Location: ../../view/oficina/");
            break;
    }
?>