<?php

class Autoloader {

    /**
     * Ajout de l'Autoloader
     */
    public function registerClass()
    {
        //Autoload du dossier '_classes'
        spl_autoload_register(function($class){
            include_once CLASSES.$class.'.php';
        });

    }

    public function registerModels()
    {
        //Autoload du dossier 'models'
        spl_autoload_register(function($model){
            include_once MODEL.$model.'.php';
        });

    }

    public function registerViews()
    {
        //Autoload du dossier 'models'
        spl_autoload_register(function($view){
            include_once VIEW.'View.php';
        });

    }

}