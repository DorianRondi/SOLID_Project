<?php
declare (strict_types=1);
use App\Autoloader;
// Autoloader
require '../Autoloader.php'; // Assurez-vous que le chemin est correct
Autoloader::register();

// Récupérer l'URL et découper en segments
$url = trim($_SERVER['REQUEST_URI'], '/');
$urlParts = explode('/', $url);

// Identifier le contrôleur et la méthode
$controllerName = !empty($urlParts[0]) ? ucfirst($urlParts[0]) . 'Controller' : 'DefaultController';
$methodName = isset($urlParts[1]) ? $urlParts[1] : 'index';
$args = array_slice($urlParts, 2);
$controllerNameSpace = 'App\\Controller\\';
$fqcn = $controllerNameSpace . $controllerName;
// Chargement du contrôleur
if(class_exists($fqcn)){
    $controller = new $fqcn();
    if(method_exists($fqcn, $methodName)){
        $controller->$methodName();
    } else {
        // Gérer l'erreur : Méthode non trouvée
        echo "Méthode $methodName non trouvée dans le contrôleur $controllerName.";
    }
} else {
    // Gérer l'erreur : Contrôleur non trouvé
    echo "Contrôleur $controllerName non trouvé.";
}
qmsljfkqsmdjfldf