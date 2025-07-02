<?php
    require_once __DIR__ . '/../../bootstrap.php';
    project_require('conexao_bd.php');

    function cadastrar_programacao($id_participante, $id_oficina, $dia_semana, $inicio, $fim, $nome_professor, $nome_oficina) {
        try {
            connect();
            global $conexao;

            $sql = "INSERT INTO agenda (id_participante, id_oficina, dia_semana, horario_inicio, horario_fim) 
            VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conexao, $sql);
            mysqli_stmt_bind_param($stmt, "iisss", $id_participante, $id_oficina, $dia_semana, $inicio, $fim);
            $sucesso = mysqli_stmt_execute($stmt);
        
            if (!$sucesso) {
                error_log("Erro SQL: " . mysqli_stmt_error($stmt));
            }
    
            mysqli_stmt_close($stmt);
            close();
            return $sucesso;

        } catch (mysqli_sql_exception $erro) {
            close();
            $mensagem = mb_convert_encoding($erro->getMessage(), "UTF-8", "auto");
        
            if (str_contains($mensagem, "Conflito de horário")) {
                $cortar = "professor";
                $posicao = strpos($mensagem, $cortar);
                $tam = $posicao + strlen($cortar);
                $resultadoA = substr($mensagem, 0, $tam);
                $resultadoB = substr($mensagem, $posicao + strlen($cortar));
                $resultado = $resultadoA . $nome_professor . $resultadoB;
                return $mensagem;
            }

            return $mensagem;
        }
        
    }

    function visualizar_programacao($id_programacao) {
        connect();
        global $conexao;

        $sql = "SELECT part.nome AS nome_participante, part.id AS id_participante,
        ofi.nome AS nome_oficina, ofi.id AS id_oficina,
         ag.dia_semana, ag.horario_inicio, ag.horario_fim, ag.id AS id_prog FROM agenda ag
        JOIN participante part ON ag.id_participante = part.id
        JOIN oficina  ofi ON ag.id_oficina = ofi.id
        WHERE ag.id = $id_programacao";

        $resultado = mysqli_query($conexao, $sql);
        $infos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        close();
        return $infos;
    }

    function visualizar_agenda() {
        connect();
        global $conexao;

        $sql = "SELECT part.nome AS nome_participante,
        ofi.nome AS nome_oficina,
         ag.dia_semana, ag.horario_inicio, ag.horario_fim, ag.id as id_prog FROM agenda ag
        JOIN participante part ON ag.id_participante = part.id
        JOIN oficina  ofi ON ag.id_oficina = ofi.id";

        $resultado = mysqli_query($conexao, $sql);
        $infos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        close();
        return $infos;
    }

    function editar_programacao($id_participante, $id_oficina, $dia_semana, $inicio, $fim, $id_programacao, $nome_professor, $nome_oficina) {
        try {
            connect();
            global $conexao;
            
            $sql = "UPDATE agenda SET id_participante = ?, id_oficina = ?, 
            dia_semana = ?, horario_inicio = ?, horario_fim = ? WHERE id = ?";
            $stmt = mysqli_prepare($conexao, $sql);
            mysqli_stmt_bind_param($stmt, "iisssi", $id_participante, $id_oficina, $dia_semana, $inicio, $fim, $id_programacao);
            $sucesso = mysqli_stmt_execute($stmt);

            if(!$sucesso) {
                error_log("Erro SQL: " . mysqli_stmt_error($stmt));
            }

            mysqli_stmt_close($stmt);
            close();
            return $sucesso;
        } catch (mysqli_sql_exception $erro) {
            close();
            $mensagem = mb_convert_encoding($erro->getMessage(), "UTF-8", "auto");
        
            if (str_contains($mensagem, "Conflito de horário")) {
                $cortar = "professor";
                $posicao = strpos($mensagem, $cortar);
                $tam = $posicao + strlen($cortar);
                $resultadoA = substr($mensagem, 0, $tam);
                $resultadoB = substr($mensagem, $posicao + strlen($cortar));
                $resultado = $resultadoA ." ". $nome_professor ." ". $resultadoB;
                return $resultado;
            }

            return $mensagem;
        }
    }

    function excluir_programacao($id_programacao) {
        connect();
        global $conexao;

        $sql = "DELETE FROM agenda WHERE id = ?";
        $stmt = mysqli_prepare($conexao, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id_programacao);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        close();
    }
?>