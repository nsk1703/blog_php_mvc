<?php

class Router
{
    private $_ctrl;
    private $_view;

    public function routeReq()
    {
        try{

            $page= '';

            //LE CONTROLLEUR EST INCLUT SELON L'ACTION DE L'UTILISATEUR
            if(isset($_GET['page']))
            {   
                $page= explode('/', filter_var($_GET['page'], FILTER_SANITIZE_URL));
                // debug($_GET['page']);
                $controller = ucfirst(strtolower($page[0]));
                // debug($controller);
                $controllerClass = $controller."Controller";
                // debug($controllerClass);
                $controllerFile = CONTROLLER.$controllerClass.".php";
                // debug($controllerFile);

                if(file_exists($controllerFile))
                { 
                    // debug($page);
                    require_once($controllerFile);
                    $this->_ctrl = new $controllerClass($page);

                }else
                    throw new \Exception("Page Introuvable!");
            }else{

                require_once(CONTROLLER."AccueilController.php");
                $this->_ctrl = new AccueilController($page);

            }

        //GESTION DES ERREURS
        }catch(Exception $e){
            $errMsg = $e->getMessage();
            $this->_view = new View('Error');
            $this->_view->generate(array('errMsg' => $errMsg));
        }
    }
    
}