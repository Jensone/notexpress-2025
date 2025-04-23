<?php 
$pageTitle = 'Homepage';
$pageDescription = "Prenez des notes en toute simplicité avec NoteXpress";
$notes = [
    [
        'title' => 'Note 1',
        'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero vel pariatur eos optio temporibus, velit labore officiis necessitatibus animi alias odio nihil rerum commodi rem ea ad nesciunt facilis possimus error similique magnam. Ratione architecto eveniet libero quisquam obcaecati iusto, nisi alias dolores quae aliquam laudantium recusandae quo a repudiandae fugit placeat maxime quis ea, unde voluptates? Quaerat laudantium maiores voluptates amet perferendis sed, iusto quisquam totam molestiae sit mollitia enim cumque minima perspiciatis obcaecati at! Ut facere quis a eveniet ad, adipisci non consequatur sit voluptatum dolorem minus fuga exercitationem. Inventore dolorum expedita quo ea quidem! Corrupti, facere quidem.',
        'slug' => 'note-1'
    ],
    [
        'title' => 'Note 2',
        'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero vel pariatur eos optio temporibus, velit labore officiis necessitatibus animi alias odio nihil rerum commodi rem ea ad nesciunt facilis possimus error similique magnam. Ratione architecto eveniet libero quisquam obcaecati iusto, nisi alias dolores quae aliquam laudantium recusandae quo a repudiandae fugit placeat maxime quis ea, unde voluptates? Quaerat laudantium maiores voluptates amet perferendis sed, iusto quisquam totam molestiae sit mollitia enim cumque minima perspiciatis obcaecati at! Ut facere quis a eveniet ad, adipisci non consequatur sit voluptatum dolorem minus fuga exercitationem. Inventore dolorum expedita quo ea quidem! Corrupti, facere quidem.',
        'slug' => 'note-2'
    ],
    [
        'title' => 'Note 3',
        'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero vel pariatur eos optio temporibus, velit labore officiis necessitatibus animi alias odio nihil rerum commodi rem ea ad nesciunt facilis possimus error similique magnam. Ratione architecto eveniet libero quisquam obcaecati iusto, nisi alias dolores quae aliquam laudantium recusandae quo a repudiandae fugit placeat maxime quis ea, unde voluptates? Quaerat laudantium maiores voluptates amet perferendis sed, iusto quisquam totam molestiae sit mollitia enim cumque minima perspiciatis obcaecati at! Ut facere quis a eveniet ad, adipisci non consequatur sit voluptatum dolorem minus fuga exercitationem. Inventore dolorum expedita quo ea quidem! Corrupti, facere quidem.',
        'slug' => 'note-3'
    ],
];
?>

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