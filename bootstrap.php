<?php
    define('PROJECT_ROOT', realpath(__DIR__));

    function project_require($path) {
        $full_path = PROJECT_ROOT . '/' . ltrim($path, '/');
        if (!file_exists($full_path)) {
            throw new Exception("Arquivo não encontrado: {$full_path}");
        }
        require_once $full_path;
    }
?>