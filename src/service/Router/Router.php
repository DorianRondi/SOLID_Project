<?php
namespace App\Service\Router;

class Router
{
    public function __invoke()
    {
        //// URL = ROOT/controller/method/parametres[] ////
        $uri = $_SERVER['REQUEST_URI'];
        $lastCharacterOfURI = $uri[-1];
        $offset = 0;
        $length = -1;
        $uri = (!empty($uri) && $lastCharacterOfURI === "/") ? substr($uri, $offset, $length) : $uri ;
        $params = $uri ;

        $params = explode('/', $params);

        array_shift($params);

        if(strlen($params[0]) === 0){
            $controller = new DefaultController;
            $controller->index();
        }else{
            $appController = '\\App\\Controller\\'.ucfirst(array_shift($params)).'Controller';
            var_dump($appController);
            $controller = new $appController;

            $action = isset($params[0]) ? array_shift($params) : 'index';

            if(!method_exists($controller, $action)){
                http_response_code(404);
                echo "Erreur 404 - La page n'existe pas";
            }else{

                //// call_user_func_array ////
                /* je ne comprend pas vraiment comment ça marche */

                isset($params[0]) ? call_user_func_array([$controller,$action],$params) : $controller->$action();
                //isset($params[0]) ? $controller->$action($params) : $controller->$action();// vielle version
            }
        }
    }
}