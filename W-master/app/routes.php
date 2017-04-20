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
		['GET|POST', '/article-[:id]', 'Default#article', 'page_article'],
		/* La route pour les annonces */
		['GET|POST', '/annonce', 'Annonce#annonce', 'page_annonce'],		
		
		/* La route pour article */
		['GET|POST', '/ajoutArticle', 'Administrateur#ajoutArticle', 'Administrateur_ajoutArticle'],
		
		/* La route pour ce connecter */
		['GET|POST', '/connexion', 'Users#connexion', 'users_connexion'],
		['GET|POST', '/users/logout', 'Users#logout', 'users_logout'],


		/* La route pour modifier mot de passe */
		['GET|POST', '/modif', 'Administrateur#modif', 'page_modif'],

		/* La route pour mot de passe oublier */
		['GET|POST', '/mdpo', 'Default#mdpo', 'page_mdpo'],
	);