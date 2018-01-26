<?php

namespace Core\Entity;

/**
* Classe mère de toutes les entity
*/
class Entity
{
	protected $url;
	protected $entity;

	/**
	 * Initialise l'attribut entity
	 * @param none
	 * @return none
	 */
	public function __construct() {
		$this->entity = strtolower(str_replace('Entity', '', end(explode('\\', get_class($this)))));

		if ($this->entity === 'post') {
			$this->url = 'index.php?p=post.single&id=' . $this->id;
		} elseif ($this->entity === 'category') {
			$this->url = 'index.php?p=post.category&id=' . $this->id;
		}
	}

	/**
	 * Méthode magique pour récupérer tous les éléments avec des getters sans les écrire
	 * @param string $key Nom de l'attribut qu'on veut récupérer
	 * @return string $this->$key qui est le getter
	 */
	public function __get(string $key) {
		$method = 'get' . ucfirst($key);
		$this->$key = $this->$method();
		return $this->$key;
	}

	/**
	 * Récupère l'id de l'élement pour en faire un URL
	 * @param none
	 * @return string $url Retourne l'URL de l'entity
	 */
	public function getUrl() {
		return $this->url;
	}
}