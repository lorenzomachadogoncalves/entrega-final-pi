<?php

$inacessiveis = ['view', 'model', 'controller', 'acdv'];

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = array_filter(explode('/', $url));
$base = '';
$breadcrumb_segments = array_filter($segments, function($segment) use ($inacessiveis) {
    return !in_array($segment, $inacessiveis);
});
$breadcrumb_home = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/acdv/view';
$last = end($breadcrumb_segments);

if (str_contains($last, '.php')) {
    array_pop($breadcrumb_segments);
}
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
        <li class="breadcrumb-item">
            <a class="link-body-emphasis fw-semibold text-decoration-none" href="<?= $breadcrumb_home ?>">Início</a>
        </li>
        <?php foreach ($breadcrumb_segments as $index => $segment): ?>
            <?php 
                $base .= '/' . $segment;
                $isLast = $index === array_key_last($segments);
                $label = ucfirst(str_replace(['.php', '_'], ['', ' '], $segment)); 
            ?>
            <?php if ($isLast): ?>
                <li class="breadcrumb-item active" aria-current="page"><?= $label ?></li>
            <?php else: ?>
                <li class="breadcrumb-item">
                    <a class="link-body-emphasis fw-semibold text-decoration-none" href="<?= $breadcrumb_home . $base ?>">
                        <?= $label ?>
                    </a>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ol>
</nav>