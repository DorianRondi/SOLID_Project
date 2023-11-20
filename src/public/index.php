<?php
declare (strict_types=1);
require_once 'C:\laragon\www\solidproject\vendor\autoload.php';
use App\Controller\AuthorController;
use App\Service\Router\Router;

new AuthorController();
(new Router())();