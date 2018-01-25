<?php

namespace app;

/**
 * Va stocker les informations nécessaires à plusieurs éléments de l'application afin de les réutiliser un peu partout
 * @package app
 */
class App
{
	const DB_NAME = 'blog';
	const DB_USER = 'root';
	const DB_PASS = 'jOn79613226';
	const DB_HOST = 'localhost';

	private static $database = null;
	private static $title = 'Mon super blog';
	
	public static function getDb() {
		if (self::$database === null) {
			self::$database = new Database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST);
		}

		return self::$database;
	}

	/**
	 * Permet de renvoyer vers une page 404
	 * @param none
	 * @return none
	 */
	public static function error404() {
		header("HTTP/1.0 404 Not Found");
		header('Location: index.php?p=404');
	}

	/**
	 * Renvoie le $title
	 * @param none
	 * @return string $title
	 */
	public static function getTitle() {
		return self::$title;
	}

	/**
	 * Modifie le $title
	 * @param string $title Nouveau titre
	 * @return none
	 */
	public static function setTitle(string $title) {
		self::$title = $title;
	}
}