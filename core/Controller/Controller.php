<?php

namespace Core\Controller;

abstract class Controller
{
    /** @var String $viewPath Chemin par défaut des vues */
    protected $viewPath;

    /** @var String $template Nom du template à charger */
    protected $template;

    /**
     * Appel la vue, lui applique les variables et l'envoie à l'application
     *
     * @param String $nameView Nom de la vue à appeler
     * @param Array $variables Variables nécessaire dans la vue pour afficher les différents éléments récupérés dans les Models
     * @return type
     **/
    protected function render(String $nameView, array $variables = [])
    {
        ob_start();

        extract($variables);

        require $this->viewPath . str_replace('.', '/', $nameView) . '.php';

        $content = ob_get_clean();

        require ($this->viewPath . 'templates/' . $this->template . '.php');
    }

	/**
	 * Permet de renvoyer vers une page 404
	 * @param none
	 * @return none
	 */
	protected function error404() {
		header("HTTP/1.0 404 Not Found");
		header('Location: index.php');
	}

	/**
	 * Interdit l'accès à la page quand le User n'est pas Auth
	 * @param none
	 * @return none
	 */
	protected function forbidden() {
		header('HTTP/1.0 403 forbidden');
		die('Accès interdit');
	}
}