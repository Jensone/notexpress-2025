<?php $content = substr($item['content'], 0, 30) . '...'; ?>

<div class="card" style="width: 18rem;">
    <img src="https://placehold.co/150x100?text=<?= $item['title'] ?>" class="card-img-top" alt="<?= $item['title'] ?? '' ?>">
    <div class="card-body">
        <h5 class="card-title">
            <?= $item['title'] ?? '' ?>
        </h5>
        <p class="card-text">
            <?= $content ?>
        </p>
        <a href="/note?slug=<?= $item['slug'] ?? '' ?>" class="btn btn-primary">
            Voir la note
        </a>
    </div>
</div>