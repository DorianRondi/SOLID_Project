<?php 
namespace App;

class Autoloader
{
    static function register()
    {
        spl_autoload_register([__CLASS__ , 'autoload']);
    }

    static function autoload($class)
    {
        /*
        *   dans $class il y'a tout le namespace qu'il faut reformater de l'objet que l'on veut créer (App\..\..\Class)
        *   D'abord on supprime le namespace pour conserver seulement le chemin de la class(..\..\Class)
        *   ensuite on remplace l'antislash par un slash (../../Class)
        *   enfin on donne le chemin du fichier de la class (../../Class.php)
        *   Une fois que le chemin est construit, si le fichier existe on l'insert sur la page avec un require_once
        */

        $class = str_replace(__NAMESPACE__ . '\\', '', $class);
        $class = str_replace('\\', '/', $class);
        $file = __DIR__ . DIRECTORY_SEPARATOR . $class . ".php";
        if(file_exists($file)){
            require_once $file;
        }
    }
}