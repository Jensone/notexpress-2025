<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= !empty($pageTitle) ? $pageTitle : 'NoteXpress' ?></title>
    <meta name="description" content="<?= !empty($pageDescription) ? $pageDescription : 'Application NoteXpress' ?>">
    <link rel="shortcut icon" href="/assets/images/nx-icon.svg" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@1&family=Source+Sans+3:wght@200&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/main.css">
</head>

<body>
    <div class="position-sticky top-0 z-3 bg-white">
        <header class="p-3 mb-4 border-bottom d-flex justify-content-between align-items-center">
            <a href="/" class="">
                <img src="/assets/images/nx-line-color.svg" alt="logo" width="150">
            </a>
            <nav class="">
                <a href="/notes" class="text-decoration-none">Les notes</a> •
                <a href="/note/add" class="text-decoration-none">Créer une note</a>
            </nav>
        </header>
    </div>
    <main class="container">