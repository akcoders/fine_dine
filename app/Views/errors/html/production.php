<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex">
    <?php
    $whoops = lang('Errors.whoops');
    $snag = lang('Errors.weHitASnag');
    $whoops = $whoops === 'Errors.whoops' ? 'Whoops!' : $whoops;
    $snag = $snag === 'Errors.weHitASnag' ? 'We seem to have hit a snag. Please try again shortly.' : $snag;
    ?>

    <title><?= esc($whoops) ?></title>

    <style>
        <?= preg_replace('#[\r\n\t ]+#', ' ', file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'debug.css')) ?>
    </style>
</head>
<body>

    <div class="container text-center">

        <h1 class="headline"><?= esc($whoops) ?></h1>

        <p class="lead"><?= esc($snag) ?></p>

    </div>

</body>

</html>
