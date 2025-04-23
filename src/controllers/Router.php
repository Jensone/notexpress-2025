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
        include_once __DIR__ . '/../../views/components/header.php';
        // Routes
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                if (isset($_GET['slug'])) {
                    $slug = $_GET['slug'];
                    self::handleGetRequest($request, $slug); // "::" opérateur de portée 
                    break;
                } else {
                    self::handleGetRequest($request);
                    break;
                }
            case 'POST':
                if (isset($_POST['slug'])) {
                    $slug = $_POST['slug'];
                    self::handlePostRequest($request, $slug);
                    break;
                } else {
                    self::handlePostRequest($request);
                    break;
                }
            default:
                http_response_code(405);
                $pageTitle = "Demande non autorisée";
                $pageDescription = "La méthode de la requête n'est pas autorisée.";
                require __DIR__ . '/../../views/405.php';
                break;
        }
        include_once __DIR__ . '/../../views/components/footer.php';
    }

    /**
     * Method handleGetRequest()
     * To handle GET requests and display the right view with the right data
     */
    static public function handleGetRequest($request, ?string $slug = null)
    {
        if ($slug) {
            $note = new Note();
            $note->find($slug);
            if ($request == '/note?slug=' . $slug) {
                $pageTitle = $note->getTitle();
                $pageDescription = substr($note->getContent(), 0, 100) . '...';
                require __DIR__ . '/../../views/notes/show.php';
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
                $notes = (new Note())->findAll();
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

    /**
     * Method handlePostRequest()
     * To handle POST requests and treat the data sent by the user
     */
    static public function handlePostRequest($request, ?string $slug = null)
    {
        if ($slug) {
            if ($request == '/note/edit?slug=' . $slug) {
                NoteController::edit($slug);
            }
        } elseif ($request == '/note/add' || $request == '/note/add/') {
            // add() is a static method of the NoteController class
            NoteController::add();
            return;
        } else {
            http_response_code(404);
            $pageTitle = "Page introuvable";
            $pageDescription = "La page demandée n'existe pas.";
            require __DIR__ . '/../../views/404.php';
            return;
        }
    }
}