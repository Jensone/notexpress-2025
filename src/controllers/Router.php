<?php

namespace controllers;

use models\Note;
use controllers\NoteController;

/**
 * Class Router
 * Dedicated to lead the routing of the application
 */
class Router
{
    /**
     * Method route()
     * To handle the routing of the application
     * @param string $request
     * @return void
     */
    static public function route($request): void
    {
        // On vérifie si la requête est une redirection
        self::handleRedirects($request);
        include_once __DIR__ . '/../../views/components/header.php';
        self::handleViews($request);
        include_once __DIR__ . '/../../views/components/footer.php';
        die();
    }

    static public function handleRedirects($request): void
    {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                // Si le tableau GET contient "slug" et que la requête est "/note/delete?slug=" + slug
                if (isset($_GET['slug']) && $request == '/note/delete?slug=' . $_GET['slug']) {
                    /**
                     * Appel de la méthode delete() de la classe NoteController
                     * Seul NoteController est habilité à agir sur les notes
                     */
                    $note = new Note();
                    $note->find($_GET['slug']);
                    NoteController::delete($note->getSlug());
                }
                break;
            case 'POST':
                if (isset($_POST['slug']) && $request == '/note/edit?slug=' . $_POST['slug']) { // Cas où un modification de la note est faite
                    NoteController::edit($_POST['slug']); // On appelle la méthode edit(avec le slug) de NoteController
                } 
                
                if ($request == '/note/add' || $request == '/note/add/') {
                    NoteController::add(); // On appelle la méthode add() de NoteController
                }
                break;
        }
    }

    static public function handleViews($request): void
    {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                if (isset($_GET['slug'])) {
                    self::handleGetRequest($request, $_GET['slug']);
                } else {
                    self::handleGetRequest($request);
                }
                break;

            default:
                http_response_code(405);
                $pageTitle = "Demande non autorisée";
                $pageDescription = "La méthode de la requête n'est pas autorisée.";
                require __DIR__ . '/../../views/405.php';
                break;
        }
    }

    /**
     * Method handleGetRequest()
     * To handle GET requests and display the right view with the right data
     */
    static public function handleGetRequest($request, ?string $slug = null)
    {
        if ($slug) {
            $note = new Note();
            $note->find($slug); // Travail du modèle
            if ($request == '/note?slug=' . $slug) {
                $pageTitle = $note->getTitle();
                $pageDescription = substr($note->getContent(), 0, 100) . '...';
                require __DIR__ . '/../../views/notes/show.php'; // Travail de la vue
                return;
            } elseif ($request == '/note/edit?slug=' . $slug) {
                $pageTitle = "Modification d'une note";
                $pageDescription = "Modifiez une note sur NoteXpress.";
                require __DIR__ . '/../../views/notes/edit.php';
                return;
            }
        }
        switch ($request) {
            case '':
            case '/':
                $pageTitle = "Accueil";
                $pageDescription = "NoteXpress est une application de prise de notes en ligne.";
                $notes = array_slice((new Note())->findAll('DESC'), 0, 4);
                require __DIR__ . '/../../views/home.php';
                break;
            case '/notes':
            case '/notes/':
                $pageTitle = "Toutes les notes";
                $pageDescription = "Retrouvez toutes les notes de NoteXpress.";
                $notes = (new Note())->findAll();
                require __DIR__ . '/../../views/notes/all.php';
                break;
            case '/note/add':
            case '/note/add/':
                $pageTitle = "Créer une nouvelle note";
                $pageDescription = "Créez une nouvelle note sur NoteXpress.";
                require __DIR__ . '/../../views/notes/add.php';
                break;
            default:
                http_response_code(404);
                $pageTitle = "Page introuvable";
                $pageDescription = "La page demandée n'existe pas.";
                require __DIR__ . '/../../views/404.php';
                break;
        }
    }
}
