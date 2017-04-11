<?php
	
	$w_routes = array(
		['GET|POST', '/', 'Default#home', 'default_home'],

		/* La route pour les contacts */
		['GET|POST', '/contact', 'Default#contact', 'page_contact'],

		/* La route pour les contacts */
		['GET|POST', '/acceuil', 'Default#acceuil', 'page_acceuil'],
	);