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

		/* La route pour article */
		['GET|POST', '/ajoutArticle', 'Default#ajoutArticle', 'page_ajoutArticle'],
	);