<table class="table border table-rounded">
    <caption>Agenda Semanal</caption>
    <thead class="table-light">
      <tr>
        <th class="px-3">Segunda</th>
        <th class="px-3">Terça</th>
        <th class="px-3">Quarta</th>
        <th class="px-3">Quinta</th>
        <th class="px-3">Sexta</th>
        <th class="px-3">Sábado</th>
        <th class="px-3">Domingo</th>
      </tr>
    </thead>
    <tbody>
    <?php
      include "../../model/agenda/agenda_model.php";
      $resultado = visualizar_agenda();
      usort($resultado, function ($a, $b) {
        $dias = ['segunda' => 1, 'terça' => 2, 'quarta' => 3, 'quinta' => 4, 'sexta' => 5, 'sábado' => 6, 'domingo' => 7];
        $diaA = $dias[strtolower($a['dia_semana'])];
        $diaB = $dias[strtolower($b['dia_semana'])];
    
        if ($diaA == $diaB) {
            return strtotime($a['horario_inicio']) <=> strtotime($b['horario_inicio']);
        }
        return $diaA <=> $diaB;
    });
    
    $grade = [];
    $horarios_unicos = [];
    $dias_semana = ['segunda', 'terça', 'quarta', 'quinta', 'sexta', 'sábado', 'domingo'];
    
    foreach ($resultado as $info) {
        $dia = strtolower($info['dia_semana']);
        $hora_inicio = substr($info['horario_inicio'], 0, 5);
        $hora_fim = substr($info['horario_fim'], 0, 5);
        $faixa_horaria = "$hora_inicio - $hora_fim";
    
        $id_programacao = $info["id_prog"];
        $form_flag = "editar";
        $conteudo = "
        <a href='editar_agenda.php?id_programacao=$id_programacao&form_flag=$form_flag'
           class='d-block text-dark text-decoration-none'>
            {$info['nome_oficina']}<br>
            {$info['nome_participante']}<br>
            ($faixa_horaria)
        </a>";
    
        if (!isset($grade[$faixa_horaria])) {
            $grade[$faixa_horaria] = array_fill_keys($dias_semana, '');
            $horarios_unicos[] = $faixa_horaria;
        }
    
        $grade[$faixa_horaria][$dia] = $conteudo;
    }
    sort($horarios_unicos);

    foreach ($horarios_unicos as $horario) {
        echo "<tr>";
        foreach ($dias_semana as $dia) {
            echo "<td class='td-rounded'>";
            echo $grade[$horario][$dia];
            echo "</td>";
        }
        echo "</tr>";
    }
    ?>
    </tbody>
</table>