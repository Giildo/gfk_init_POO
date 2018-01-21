<?php

namespace app\Table;

/**
 * Class Post
 * Implémente les articles récupérés depuis le base de données
 * @package app\Table
 */
class Post
{

	/**
	 * Passe l'URL de l'article en ajoutant l'ID
	 * @param none
	 * @return string URL de l'article
	 */
	public function getUrl() {
		return 'index.php?p=post&id=' . $this->id;
	}

	/**
	 * Coupe l'article à 100 caractères et le renvoie accompagné d'un "Voir la suite" qui permet d'afficher la page de l'article
	 * @param none
	 * @return string
	 */
	public function getExtract() {
		$html = '<p>' . substr($this->content, 0, 100) . '...</p>';
		$html .= '<p><a href="' . $this->getUrl() . '">Voir la suite</a></p>';
		return $html;
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
}