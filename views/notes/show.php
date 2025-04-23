<h1 class="text-center mb-2"><?= $pageTitle ?></h1>
<h6 class="text-center mb-5 text-muted"><?= $pageDescription ?></h6>

<hr>

<div class="p-3">
    <p class="">
        <?= $note->getContent() ?>
    </p>
</div>

<hr>

<a href="/note/edit?slug=<?= $slug ?>" class="btn btn-warning">
    Modifier la note
</a>