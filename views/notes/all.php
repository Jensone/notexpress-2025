<h1><?= $pageTitle ?></h1>

<div class="cards d-flex flex-wrap gap-2 mt-5 justify-content-center">
    <?php foreach ($notes as $item) : ?>
        <?php include __DIR__ . '../../components/note-card.php'; ?>
    <?php endforeach; ?>
</div>