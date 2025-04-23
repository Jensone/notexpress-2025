<div class="bg-body-tertiary p-5 mb-4 rounded-3">
    <div class="container-fluid py-5">
        <img src="/assets/images/nx-line-dark.svg" alt="logo" width="320">
        <p class="fs-4">
            <?= $pageDescription ?>
        </p>
        <a href="/note/add" class="btn btn-primary btn-lg">Créer une note</a>
    </div>
</div>

<div class="cards d-flex flex-wrap gap-2 justify-content-center">
    <?php foreach ($notes as $item) : ?>
        <?php include __DIR__ . '/components/note-card.php'; ?>
    <?php endforeach; ?>
</div>