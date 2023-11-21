<?php

declare(strict_types=1);

namespace App\Controller;

class AuthorController
{
    public function show(int $id=1, string $firstName=''){
        echo "Ca a bien affiché";
    }
}

//fqcn : App\Controller\Author

/*
 * ce qu'on fait classiquement :
 *
 * $authorController = new Controller avec un use App\Controller\Author
 *
 * dans le routeur, on n'utilise pas de use
 *
 * $authorController = new App\Controller\Author;
 *
 */