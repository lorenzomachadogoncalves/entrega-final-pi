<?php
    require_once __DIR__ . '/../../bootstrap.php';
    project_require('conexao_bd.php');

    function cadastrar_contribuicao($id_associado, $data_pagamento, $valor, $metodo_pagamento) {
        connect();
        $resultado = query("INSERT INTO contribuicao (id_associado, data_pagamento, valor, metodo_pagamento)
        VALUES ('$id_associado', '$data_pagamento', '$valor', '$metodo_pagamento')");
        close();
    }

    function visualizar_contribuicao($id_contribuicao) {
        connect();
        $resultado = query("SELECT * FROM contribuicao WHERE id = $id_contribuicao");
        close();
        return $resultado['resultado'];
    }

    function visualizar_contribuicao_participante($id_associado) {
        connect();
        $resultado = query("SELECT * FROM contribuicao WHERE id_associado = $id_associado");
        close();
        return $resultado['resultado'];
    }

    function editar_contribuicao($data_pagamento, $valor, $metodo_pagamento, $id_contribuicao) {
        connect();
        query("UPDATE contribuicao SET valor = '$valor', 
        data_pagamento = '$data_pagamento', metodo_pagamento = '$metodo_pagamento'
        WHERE id = $id_contribuicao");
        close();
    }

    function excluir_contribuicao($id_contribuicao){
        connect();
        query("DELETE FROM contribuicao WHERE id = $id_contribuicao");
        close();
    }
?>