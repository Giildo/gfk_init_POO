<?php

use app\Database;
use app\Config;

namespace app;

/**
 * Va stocker les informations nécessaires à plusieurs éléments de l'application afin de les réutiliser un peu partout
 * @package app
 */
class App
{
	private $database;
	private $config;
	private $title = 'Mon super blog';

	private static $_instance = null;
	
	/**
	 * Instancie une nouvelle connection à la bdd
	 * @param none
	 * @return none
	 */
	protected function __construct() {
		$this->config = Config::getInstance();
		$this->database = new Database($this->config->get('db_name'), $this->config->get('db_user'), $this->config->get('db_pass'), $this->config->get('db_host'));
	}

	/**
	 * Envoie une instance unique de l'App pour créer un singleton
	 * @param none
	 * @return object App Renvoie l'instance unique de App
	 */
	public static function getInstance() {
		if (self::$_instance === null) {
			self::$_instance = new App();
		}

		return self::$_instance;
	}

	/**
	 * Permet de renvoyer vers une page 404
	 * @param none
	 * @return none
	 */
	public function error404() {
		header("HTTP/1.0 404 Not Found");
		header('Location: index.php?p=404');
	}

	/**
	 * Renvoie le $title
	 * @param none
	 * @return string $title
	 */
	public function getTitle() {
		return $this->$title;
	}

	/**
	 * Modifie le $title
	 * @param string $title Nouveau titre
	 * @return none
	 */
	public function setTitle(string $title) {
		$this->$title = $title;
	}
}