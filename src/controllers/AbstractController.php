<?php 

namespace controllers;

use utilities\Database;

abstract class AbstractController
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = (new Database())->getPdo();
    }

}