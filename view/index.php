<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/lib/bootstrap-5.3.6-dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <?php
        include("components/skeleton/home_page.php")
    ?>
    <div class="container d-flex justify-content-end">
        <form action="../encerrar_sistema.php">
            <button type="submit" class="btn btn-danger mt-5">Encerrar o programa</button>
        </form>
    </div>
</body>
</html>