<?php

namespace controllers;

use controllers\AbstractController;

use models\Note;

/**
 * Représentation dees capacité applicable sur une note dans l'application NoteXpress
 * Aucunes interactions directes avec la base de données
 * Catégorie de la classe : CONTROLLER
 */
class NoteController extends AbstractController
{
    static public function add()
    {
        $nouvelleNote = new Note(); // Instanciation de la classe Note avec un objet $nouvelleNote
        $nouvelleNote
            ->setTitle($_POST['title']) // Récupération du contenu de la variable $_POST['title']
            ->setSlug(uniqid('note_')) // Création d'un nouveau slug
            ->setContent($_POST['content']) // Récupération du contenu de la variable $_POST['content']
        ;

        $nouvelleNote->bindValues(); // Liaison des variables avec les propriétés de la classe Note
        $nouvelleNote->create(); // Enregistrement de la nouvelle note dans la base de données
        
        // Redirection vers la page de la note nouvellement créée
        header('Location: /note?slug=' . $nouvelleNote->getSlug());
        exit();
    }

    static public function edit($slug)
    {
        // Get actual data of the note
        $currentNote = new Note();
        $currentNote->find($slug);

        // Compare whit the form data sended
        if ($currentNote->getTitle() != $_POST['title']) {
            $currentNote->setTitle($_POST['title']);
        }
        if ($currentNote->getContent() != $_POST['content']) {
            $currentNote->setContent($_POST['content']);
        }

        $currentNote->bindValues();
        $currentNote->update($slug);
        
        // Redirection vers la page de la note modifiée
        header('Location: /note?slug=' . $slug);
        exit();
    }

    static public function delete($slug)
    {
        $noteToDelete = new Note();
        $noteToDelete->find($slug);

        $noteToDelete->bindValues();
        $noteToDelete->delete($noteToDelete->getSlug());

        // Redirection vers la page de toutes les notes
        header('Location: /notes');
        exit();
    }
}
// Don't write any code below this line