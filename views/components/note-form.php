<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="slug" value="<?= !empty($note) ? $note->getSlug() : '' ?>">
    <div class="form-group mb-2">
        <label for="title" class="form-label">Titre de la note</label>
        <input 
        type="text" name="title" id="title" class="form-control"
        <?= !empty($note) ? 'value="' . $note->getTitle() . '"' : '' ?>
        >
    </div>
    <div class="form-group mb-2">
        <label for="content" class="form-label">Contenu de la note</label>
        <textarea name="content" id="content" cols="30" rows="10" class="form-control"><?= !empty($note) ? $note->getContent() : '' ?></textarea>
    </div>
    <input type="submit" name="submit" value="Enregister" class="btn btn-success">
</form>