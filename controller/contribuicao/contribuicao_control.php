<?php
    include "../../model/contribuicao/contribuicao_model.php";

    $opcao = $_POST["opcao"];
    if($_POST["valor"]) {
        $valor = $_POST["valor"];
        $valor_formatado = str_replace(".", "", $valor);
        $valor = str_replace(",", ".", $valor_formatado);
        print($valor);
    }
    switch ($opcao) {
        case "cadastrar":
            cadastrar_contribuicao($_POST["id_associado"], $_POST["data_pagamento"], $valor, $_POST["metodo_pagamento"]);
            header("Location: ../../view/contribuicao/view_contribuicao_participante.php?id_participante=" . $_POST['id_associado']);
            break;

        case "editar":
            editar_contribuicao($_POST["data_pagamento"], $valor, $_POST["metodo_pagamento"], $_POST["id_contribuicao"]);
            header("Location: ../../view/contribuicao/view_contribuicao_participante.php?id_participante=" . $_POST['id_associado']);
            break;

        case "excluir":
            excluir_contribuicao($_POST["id_contribuicao"]);
            header("Location: ../../view/contribuicao/view_contribuicao_participante.php?id_participante=" . $_POST['id_associado']);
            break;
    }
?>