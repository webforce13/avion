<?php
namespace Controller;

use \W\Controller\Controller;
use \Model\ArticleModel;
use \PHPMailer;

class AnnonceController extends Controller
{

	public function annonce()
		{
			$this->show('page/annonce');
		} 
}
?>