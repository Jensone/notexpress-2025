<?php

namespace controllers;

use controllers\AbstractController;

use models\Note;

class NoteController extends AbstractController
{
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
        header('Location: /note?slug=' . $slug);
    }
}
// Don't write any code below this line