<?php view('partials/head.php'); ?>
<link rel="stylesheet" href=<?= style('main.css') ?>>
<link rel="stylesheet" href=<?= style('headFN.css') ?>>


<?php view('partials/nav.php') ?>

<main class="content">
    <link rel="stylesheet" href=<?= style('alert.css') ?>>
    <div class="container">
        <div class="icon">
            <?=$icon?> <!-- Unicode for a warning sign -->
        </div>
        <h1><?=$msg ?></h1>
        <p><?=$exp?></p>
        <a href=<?=$action['href'] ?> class="btn"><?=$action['text'] ?></a>

    </div>

</main>
<?php view('partials/footer.php') ?>