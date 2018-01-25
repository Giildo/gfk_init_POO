<?php

namespace app\Table;

use app\App;

/**
 * Implémente les articles récupérés depuis le base de données
 * @package app\Table
 */
class Post extends Table
{
	protected static $table = 'posts';
	protected static $class = 'post';

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
	 * Récupềre l'ensemble des derniers articles
	 * @param none
	 * @return object Database
	 */
	public static function getLastPosts() {
		return static::query("
			SELECT posts.id, posts.title, posts.content, posts.date, posts.category_id, categories.name as category
			FROM `posts`
			LEFT JOIN categories ON category_id = categories.id");
	}

	/**
	 * Récupère l'ensemble des articles en fonction de la category
	 * @param int $categoryId id de la categorie où l'on souhaite récupéré les articles
	 * @return object Database
	 */
	public static function getPostByCategory(string $categoryId) {
		return static::query("
			SELECT posts.id, posts.title, posts.content, posts.date, posts.category_id, categories.name as category
			FROM `posts`
			LEFT JOIN categories ON category_id = categories.id
			WHERE category_id = ?",
			array($categoryId));
	}
}