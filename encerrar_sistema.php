<?php
    $bat_path = __DIR__ . DIRECTORY_SEPARATOR . 'utils/encerrar_sistema.bat';

    shell_exec("start /B \"\" \"$bat_path\"");
    exit();
?>