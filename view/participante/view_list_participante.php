<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/lib/bootstrap-5.3.6-dist/css/bootstrap.min.css">
    <title>Sistema ACDV</title>
</head>
<body>
    <div class="container">
        <?php
            include("../components/skeleton/header.html");
            include("../components/skeleton/breadcrumb.php");
            $mostrar_ativos = isset($_GET["mostrar_ativos"]);
            $mostrar_associados = isset($_GET["mostrar_associados"]);
        ?>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>Participantes</h2>
                </div>
                <div class="col d-flex align-items-center">
                    <form method="get">
                        <input type="checkbox" id="ativos" name="mostrar_ativos" value="1"
                            onchange="this.form.submit()"
                            <?= isset($_GET['mostrar_ativos']) ? 'checked' : '' ?>
                            >
                        <label for="ativos">Mostrar ativos</label>
                        
                        <input type="checkbox" id="associados" name="mostrar_associados" value="1" 
                            onchange="this.form.submit()"
                            <?= isset($_GET['mostrar_associados']) ? 'checked' : '' ?>
                            >
                        <label for="associados">Mostrar associados</label>
                    </form>
                </div>
                <div class="col d-flex justify-content-end">
                    <form method="post" action="cadastrar_participante.php">
                        <button class="btn btn-primary">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
        <?php
            include("../components/participante/tabela_participante.php");
        ?>
    </div>

</body>
</html>