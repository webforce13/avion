<?php

namespace Controller;

use \W\Controller\Controller;

class DefaultController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		$this->show('default/home');
	}

	public function contact()
	{
		$this->show('page/contact');
	}

	public function accueil()
	{
		$this->show('page/accueil');
	}

}