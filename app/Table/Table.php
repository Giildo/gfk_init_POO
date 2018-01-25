<?php

namespace app\Table;

use app\App;

/**
 * Classe abstraite, parente de Post et Category
 * @package app\Table
 */
abstract class Table
{
	protected static $table;
	protected static $class;

	/**
	 * Passe l'URL de l'article en ajoutant l'ID
	 * @param none
	 * @return string URL de l'article
	 */
	public function getUrl() {
		return 'index.php?p=' . static::$class . '&id=' . $this->id;
	}

	/**
	 * Méthode générique pour tout récupérer dans une base de données spécifiée par le paramètre '$table'
	 * @param none
	 * @return object Database
	 */
	public static function all() {
		return static::query('SELECT * FROM ' . static::$table);
	}

	/**
	 * Méthode magique qui est appelée lorsqu'on fait appel à un attribut qui n'existe pas dans la classe. Nous permet de faire appel aux getteurs correspondant
	 * @param string $key attribut inconnu
	 * @return string méthode à appeler
	 */
	public function __get(string $key) {
		$method = 'get' . ucfirst($key);
		$this->$key = $this->$method();
		return $this->$key;
	}

	/**
	 * Lance la fonction getPDO pour éviter de se répéter dans toutes les fonctions de Table
	 * @param string $statement requête SQL à lancer
	 * @param array $attributes attributs à faire passer si on fait une requête préparée
	 * @return 
	 */
	protected static function query(string $statement, array $attributes = null, bool $oneResult = false) {
		if($attributes === null) {
			return app::getDb()->query($statement, get_called_class(), $oneResult);
		} else {
			return app::getDb()->prepare($statement, get_called_class(), $attributes, $oneResult);
		}
	}

	/**
	 * Récupère un élément post ou catergoy selon son id
	 * @param string $id id de l'élément à récupérer
	 * @return object Database
	 */
	public static function find(string $id) {
		return static::query('SELECT * FROM `' . static::$table . '` WHERE id=?', array($id), true);
	}
}