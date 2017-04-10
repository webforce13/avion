<?php
namespace Controller;

use \W\Controller\Controller;
use \Model\Contact;

class ContactController extends Controller
{
	/* la fonction qui permet de verifier les inputs */
	public function verif()
	{
		$email       = trim($_POST['email']);
		$telephone   = trim($_POST['tel']);
		$nom         = trim($_POST['nom']);
		$commentaire = trim($_POST['commentaire']);

		//initialie la valeur de la variable
		$message="";

		// test avec une chaine qui est une adresse email
	 
		// Vérifie si la chaine ressemble à un email
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) 
			{
		    	$message = 'Cet email est correct.';
			} 
		else 
			{
		    	$message = 'Cet email a un format non adapté.';
			}

		
		// Vérifier si le numero est bien en INTEGER
		if(filter_var($telephone, FILTER_VALIDATE_INT))
			{
		    	$message = 'Ce numero est correct.';
			} 
		else 
			{
		        $message = 'Ce numero a un format non adapté.';
			}


		// suprimer les balise et des script 
		if(filter_var($nom, FILTER_SANITIZE_STRING))
			{
		    	$message = 'Ce nom est correct.';
			} 
		else 
			{
		     	$message = 'Ce nom a un format non adapté.';
			}

		// suprimer les balise et des script  
		if(filter_var($commentaire, FILTER_SANITIZE_STRING))
			{
		    	$message = 'Ce format de texte est correct.';
			} 
		else 
			{
		    	$message = 'Ce format de texte est non adapté.';
			}

		if(
			is_string($commentaire) && (mb_strlen($commentaire) > 0)
			&& is_numeric($telephone) && (mb_strlen($telephone) > 10)
			&& is_string($nom) && (mb_strlen($nom) > 0)
			&& is_string($email) && (mb_strlen($email) > 0)
		  )

			{
				$objetInscription = new \Model\Contact;
				$objetInscription->insert(
										[":nom"         => $nom],
										[":email"       => $email],
										[":telephone"   => $telephone],
										[":commentaire" => $commentaire]);

				$message = " Votre message à était envoyer, nous vous contacterons dans les plus bref délais."
			}
			else
			{
				$message = "Certains champs ne sont pas remplis."
			}

	}
}

 ?>