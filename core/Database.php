<?php

namespace Core;

use \PDO;

/**
 * Se connecte à la base de donnée grâce au système PDO 
 * @package app
 */
class Database
{
	private $name;
	private $user;
	private $pass;
	private $host;
	private $db = null;

	/**
	 * Initialise les attributs avec les paramètres de connexion à la base de données
	 * @param string $name nom de la bdd
	 * @param string $user (optional) nom d'utilisateur pour se connecter
	 * @param string $pass (optional) mot de passe pour se connecter
	 * @param string $host (optional) nom du serveur
	 * @return non
	 */
	public function __construct(string $name, string $user ='root', string $pass = 'jOn79613226', string $host = 'localhost') {
		$this->name = $name;
		$this->user = $user;
		$this->pass = $pass;
		$this->host = $host;
	}

	/**
	 * Initialisation d'une instance de PDO qui sera stockée dans l'attribut prévu s'il n'existe pas encore et le retourne
	 * @access private
	 * @param none
	 * @return object PDO
	 */
	private function getPDO() {
		if ($this->db === null) {
			$db = new PDO('mysql:dbname=blog;host=localhost;charset=utf8', 'root', 'jOn79613226');
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->db = $db;
		}

		return $this->db;
	}

	/**
	 * Fait une requête SQL qu'elle reçoit en paramètre
	 * @access public
	 * @param string $satement requête SQL
	 * @param string $className classe de retour pour la récupération des données
	 * @return object $className objet retourné selon celui passé en paramètre
	 */
	public function query(string $statement, string $className = null, bool $oneResult = false) {
		$results = $this->getPDO()->query($statement);

		if ($className === null) {
			$results->setFetchMode(PDO::FETCH_OBJ);
		} else {
			$results->setFetchMode(PDO::FETCH_CLASS, $className);
		}

		if ($oneResult) {
			$datas = $results->fetch();
		} else {
			$datas = $results->fetchAll();
		}

		return $datas;
	}

	/**
	 * Fait un requête SQL préparée qu'elle reçoit en paramètre
	 * @param string $statement requête SQL
	 * @param string $className classe de retour pour la récupération des données
	 * @param string $parameters paramètre à ajouter dans la requête SQL
	 * @param bool $oneResult (optional) indique si on souhaite récupérer un élément et on fait un fetch ou plusieurs et on fait un fetchAll
	 * @return object $className objet retourné selon celui passé en paramètre
	 */
	public function prepare(string $statement, array $parameters, string $className = null, bool $oneResult = false) {
		$prep = $this->getPDO()->prepare($statement);
		$prep->execute($parameters);

		$prep->setFetchMode(PDO::FETCH_CLASS, $className);

		
		if ($oneResult) {
			$datas = $prep->fetch();
		} else {
			$datas = $prep->fetchAll();
		}
		
		return $datas;
	}
}