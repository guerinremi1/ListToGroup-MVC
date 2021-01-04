<?php


class Router
{
    private $_ctrl;

    public function route(){
        try{
            $url ='';
            if(isset($_GET['url'])){
                $url = explode('/', $_GET['url']);

                $controller = ucfirst($url[0]);
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";
                if (file_exists($controllerFile)){
                    require_once ($controllerFile);
                    if (isset($url[1])){
                        $this->_ctrl = new $controllerClass($url[1]);
                        require 'views/viewGroupe.php';
                    }else{
                        throw new Exception('Pas de nombre specifié');
                    }

                }else{
                    throw new Exception('Controller n\'existe pas' );
                }
            }else{
                require_once ('views/viewAccueil.php');
            }

        }catch (Exception $e){
            require_once ('views/viewErreur.php');

        }


    }
}