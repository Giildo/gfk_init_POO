<?php

use Core\Database;
use Core\Config;

/**
 * Va stocker les informations nécessaires à plusieurs éléments de l'Application afin de les réutiliser un peu partout
 * @package App
 */
class App
{
	private $dbInstance;
	private $config;
	private $title = 'Mon super blog';

	private static $_instance = null;
	
	/**
	 * Instancie une nouvelle connection à la bdd
	 * @param none
	 * @return none
	 */
	protected function __construct() {
		$config = $this->config = Config::getInstance(ROOT . '/config/config.php');
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
	 * Charge l'Autoloader afin de gérer le reste des Classes et lance une session
	 * @param none
	 * @return none
	 */
	public static function load() {
		session_start();
		require ROOT . '/app/Autoloader.php';
		App\Autoloader::register();
		require ROOT . '/core/Autoloader.php';
		Core\Autoloader::register();
	}

	/**
	 * Factory pour les Modèles
	 * @param string $model Nom du modèle qu'on va charger
	 * @return object Retourne le modèle demandé
	 */
	public function getTable(string $model) {
		$className = 'App\Table\\' . ucfirst($model);
		return new $className($this->getDb());
	}

	/**
	 * Factory pour la bdd
	 * @param none
	 * @return object Database Retourne un singleton de Database
	 */
	public function getDb() {
		if ($this->dbInstance === null) {
			$this->dbInstance = new Database($this->config->get('db_name'), $this->config->get('db_user'), $this->config->get('db_pass'), $this->config->get('db_host'));
		}

		return $this->dbInstance;
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
		return $this->title;
	}

	/**
	 * Modifie le $title
	 * @param string $title Nouveau titre
	 * @return none
	 */
	public function setTitle(string $title) {
		$this->title = $title;
	}
}