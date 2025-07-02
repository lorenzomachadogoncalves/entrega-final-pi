<?php
    require_once __DIR__ . '/../../bootstrap.php';
    project_require('conexao_bd.php');

    function cadastrar_oficina($nome, $descricao) {
        connect();
        $resultado = query("INSERT INTO oficina(nome, descricao) VALUES ('$nome', '$descricao')");
        close();
    }

    function visualizar_oficina($id_oficina) {
        connect(); 
        $resultado = query("SELECT * FROM oficina WHERE id = $id_oficina");
        close();
        return $resultado['resultado'];
    }

    function visualizar_todas_oficinas() {
        connect();
        $resultado = query("SELECT * FROM oficina");
        close();
        return $resultado['resultado'];
    }

    function editar_oficina($nome, $descricao, $id_oficina) {
        connect();
        query("UPDATE oficina SET nome = '$nome', descricao = '$descricao'
                WHERE id = $id_oficina");
        close();
    }

    function excluir_oficina($id_oficina) {
        connect();
        query("DELETE FROM oficina WHERE id = $id_oficina");
        close();
    }
?>