<?php

namespace Core\Table;

use Core\Database;

/**
* Classe mère de tous les appels à la bd
*/
abstract class Table
{
	protected $table;
	protected $class;
	protected $db;

	/**
	 * Initialise le nom de la table
	 * @param none
	 * @return none
	 */
	public function __construct(Database $db) {
		if ($this->table === null) {
			$this->class = str_replace('table', '', (strtolower(end(explode('\\', get_class($this))))));
			$this->table = str_replace('ry', 'rie', $this->class) . 's';
		}

		$this->db = $db;
	}

	/**
	 * Appelle tous les éléments du modèle passé en paramètre
	 * @param string $model Modèle de la table qu'on souhaite appeler
	 * @return array Tableau avec tous les éléments à renvoyer
	 */
	public function all() {
		return $this->query('SELECT * FROM ' . $this->table);
	}

	/**
	 * Récupère un élément selon la table
	 * @param string $id ID de l'élément à récupérer
	 * @return object Objet du type de la table appelée
	 */
	public function find(string $id) {
		return $this->query('SELECT * FROM ' . $this->table . ' WHERE id=?', array($id), true);
	}

	/**
	 * Lance la méthode query ou prepare de Database selon les paramètres qu'elle reçoit
	 * @param string $statement
	 * @return object PDOStatement
	 */
	public function query(string $statement, array $attributes = [], $onlyOne = false) {
		$entityName = '\App\Entity\\' . ucfirst($this->class) . 'Entity';

		if (empty($attributes)) {
			return $this->db->query($statement, $entityName, $onlyOne);
		} else {
			return $this->db->prepare($statement, $attributes, $entityName, $onlyOne);
		}
		
	}
}