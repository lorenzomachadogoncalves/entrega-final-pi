<?php
    require_once __DIR__ . '/../../bootstrap.php';
    project_require('conexao_bd.php');

    function cadastrar_participante($nome, $ocupacao, $telefone, $ativo, $associado) {
        connect();
        query("INSERT INTO participante(nome, ocupacao, telefone, is_ativo, is_associado) 
        VALUES ('$nome', '$ocupacao', '$telefone', '$ativo', '$associado')");
        close();
    }
    
    function visualizar_participante($id_participante) {
        connect();
        $resultado = query("SELECT * FROM participante WHERE id = $id_participante");
        close();
        return $resultado['resultado'];
    }

    function visualizar_participantes() {
        connect();
        $resultado = query("SELECT * FROM participante");
        close();
        return $resultado['resultado'];
    }
    
    function editar_participante($nome, $ocupacao, $telefone, $ativo, $associado, $id_participante) {
        connect();
        query("UPDATE participante SET nome = '$nome', ocupacao = '$ocupacao', 
        telefone = '$telefone', is_ativo = '$ativo', is_associado = '$associado'
        WHERE id = $id_participante" );
        close();
    }

    function excluir_participante($id_participante) {
        connect();
        query("DELETE FROM participante WHERE id = $id_participante");
        close();
    }

    function ativar_participante($id_participante) {
        connect();
        query("UPDATE participante SET is_ativo = true WHERE id = $id_participante");
        close();
    }

    function desativar_participante($id_participante) {
        connect();
        query("UPDATE participante SET is_ativo = false WHERE id = $id_participante");
        close();
    }

    function visualizar_professores() {
        connect();
        $resultado = query("SELECT * FROM participante WHERE ocupacao LIKE '%professor%'");
        close();
        return $resultado['resultado'];
    }
?>