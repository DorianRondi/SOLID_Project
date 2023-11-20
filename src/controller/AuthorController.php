<?php

declare(strict_types=1);

namespace App\Controller;

class AuthorController
{
    public function show(int $id=1, string $firstName=''){
        echo "Ca a bien affiché";
    }
}