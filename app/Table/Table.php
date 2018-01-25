<?php

namespace app\Table;

use app\Database;

/**
* Classe mère de tous les appels à la bd
*/
abstract class Table
{
	protected $table;
	protected $db;

	/**
	 * Initialise le nom de la table
	 * @param none
	 * @return none
	 */
	public function __construct(Database $db) {
		if ($this->table === null) {
			$this->table = strtolower(end(explode('\\', get_class($this))));
		}

		$this->db = $db;
	}

	/**
	 * Appelle tous les éléments du modèle passé en paramètre
	 * @param string $model Modèle de la table qu'on souhaite appeler
	 * @return 
	 */
	public function all() {
		return $this->db->query('SELECT * FROM ' . $this->table);
	}
}