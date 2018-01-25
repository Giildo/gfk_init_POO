<?php

namespace app\Table;

/**
* Classe mère de tous les appels à la bd
*/
abstract class Table
{
	protected $table;

	/**
	 * Initialise le nom de la table
	 * @param none
	 * @return none
	 */
	public function __construct() {
		if ($this->table === null) {
			$this->table = strtolower(end(explode('\\', get_class($this))));
		}
	}
}