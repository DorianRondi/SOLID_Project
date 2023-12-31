<?php
declare(strict_types=1);
namespace App\Service\Router;

class Router
{

    public function start() : void
    {
        $uri = $this->formatURI();
        $params = explode('/', $uri);
        array_shift($params);
        $controllerFQCN = $this->determineControllerFQCN($params);
        $controller = new $controllerFQCN;
        $action = isset($params[0]) ? $params[1] : 'index';
        array_splice($params, 0, 2); var_dump($params);
        if(!method_exists($controller, $action)){
            http_response_code(404);
            echo "Erreur 404 - La page n'existe pas";
        }else{
            isset($params[0]) ? call_user_func_array([$controller,$action],$params) : $controller->$action();
        }
    }

    public function formatURI() : string{
        $uri = $_SERVER['REQUEST_URI'];
        $numberOfCharsToRemove = 13 ; //(/solidproject)
        $uri = substr($uri, $numberOfCharsToRemove);
        $lastCharacterOfURI = $uri[-1];
        $offset = 0;
        $length = -1;
        return (!empty($uri) && $lastCharacterOfURI === "/") ? substr($uri, $offset, $length) : $uri ;
    }

    public function determineControllerFQCN(array $params) : string
    {
        if(empty($params)){
            $controller = new DefaultController;
            $controller->index();
            return 'Default';
        }
        return '\\App\\Controller\\'.ucfirst(array_shift($params)).'Controller';
    }

/*    public function __invoke()
    {
        //// URL = ROOT/controller/method/parametres[] ////
        $uri = $_SERVER['REQUEST_URI'];
        $numberOfCharsToRemove = 13 ; //(/solidproject)
        $uri = substr($uri, $numberOfCharsToRemove);

        $lastCharacterOfURI = $uri[-1];
        $offset = 0;
        $length = -1;
        $uri = (!empty($uri) && $lastCharacterOfURI === "/") ? substr($uri, $offset, $length) : $uri ;
        $params = $uri ;

        $params = explode('/', $params);

        array_shift($params);
        if(empty($params)){
            $controller = new DefaultController;
            $controller->index();
            return;
        }

        $appController = '\\App\\Controller\\'.ucfirst(array_shift($params)).'Controller';
        $controller = new $appController;

        $action = isset($params[0]) ? array_shift($params) : 'index';

        if(!method_exists($controller, $action)){
            http_response_code(404);
            echo "Erreur 404 - La page n'existe pas";
        }else{

            //// call_user_func_array ////
            /* je ne comprend pas vraiment comment ça marche

            isset($params[0]) ? call_user_func_array([$controller,$action],$params) : $controller->$action();
            //isset($params[0]) ? $controller->$action($params) : $controller->$action();// vielle version
        }

    }*/

}