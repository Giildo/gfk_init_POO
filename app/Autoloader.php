<?php

namespace app;

/**
 * Class Autoloader
 * Classe permetant de charger directement les autres classes sans faire les includes
 * @package app
 */
class Autoloader{

    /**
     * Enregistre notre autoloader
     * @param none
     * @return none
     */
    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * Inclue le fichier correspondant à notre classe
     * @param $class string Le nom de la classe à charger
     * @return none
     */
    static function autoload($class){
        if (strpos($class, __NAMESPACE__ . '\\') === 0){
            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            $class = str_replace('\\', '/', $class);
            require __DIR__ . DIRECTORY_SEPARATOR . $class . '.php';
        }
    }

}