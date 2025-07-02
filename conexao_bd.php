<?php
    $conexao;
    function connect() {
        global $conexao;
        $servidor = 'localhost';
        $nomeUsuario = 'root';
        $senhaUsuario = '';
        $base = 'acdv';
        $conexao = mysqli_connect($servidor, $nomeUsuario, 
        $senhaUsuario, $base)
        or die(mysqli_connect_error());
        mysqli_set_charset($conexao, "utf8mb4");
    }

    function query($sql) {
        global $conexao;
        mysqli_set_charset($conexao, "utf8mb4");
        $query = mysqli_query($conexao, $sql);
        if (!$query) {
            print("erro");
            return [
                'sucesso' => false,
                'erro' => mysqli_error($conexao)
            ];
        }

        return [
            'sucesso' => true,
            'resultado' => $query
        ];
    }

    function close() {
        global $conexao;
        mysqli_close($conexao);
    }
?>