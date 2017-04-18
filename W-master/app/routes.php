<?php
	
	$w_routes = array(
		['GET|POST', '/', 'Default#home', 'default_home'],

		/* La route pour les contacts */
		['GET|POST', '/contact', 'Default#contact', 'page_contact'],

		/* La route pour l accueil */
		['GET|POST', '/accueil', 'Default#accueil', 'page_accueil'],

		/* La route pour l info */
		['GET|POST', '/info', 'Default#info', 'page_info'],

		/* La route pour article */
		['GET|POST', '/article', 'Default#article', 'page_article'],
		['GET|POST', '/article-detail/[:url]', 'Default#articleDetail', 'page_article_detail'],		
		
		/* La route pour article */
		['GET|POST', '/ajoutArticle', 'Default#ajoutArticle', 'page_ajoutArticle'],
		
		/* La route pour ce connecter */
		['GET|POST', '/connexion', 'Default#connexion', 'page_connexion'],

		/* La route pour modifier mot de passe */
		['GET|POST', '/modif', 'Administrateur#modif', 'page_modif'],


		/* La route pour l accueil */
		['GET|POST', '/annonce', 'Default#annonce', 'page_annonce'],
);