<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\ArticleModel;
use \PHPMailer;

class DefaultController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		$this->show('default/home');
	}

	public function accueil()
	{
		$this->show('page/accueil');
	}


	
	public function contact() 
	{
		$message="";
		if(isset($_POST['operation'])) 
		{
			$nom = $_POST['nom'];
			$email = $_POST['email'];
			$telephone = $_POST['tel'];
			$commentaire = $_POST['commentaire'];

			$mail = new PHPMailer(); // création objet de type mail 
			$mail->isSMTP(); // connexion directe au serveur SMTP
			//$mail->SMTPDebug = 2;
			$mail->isHTML(true); // utilisation du format HTML
			$mail->Host='smtp.gmail.com'; // serveur SMTP pour envoyer
			$mail->Port = 465; // le port obligatoire de google
			$mail->SMTPAuth = true; // on va fournir un login/password au serveur
			$mail->SMTPSecure = 'ssl'; // cerfiticat SSL
			$mail->Username='anthoine.demares@gmail.com';
			$mail->Password='johndo113';
			$mail->setFrom('anthoine.demares@gmail.com'); // l'expéditeur
			$mail->AddAddress('webforce13@gmail.com'); // l'adresse mail du destinataire
			$mail->Subject ="Email"; // objet du mail 
			$mail->Body ='
			<html>
				<head>
					<style> h1{color: pink;} </style>
				</head>
				<body>
					<h1>message</h1>
					<p>nom <strong>' .$nom. '</strong></p>
					<br/>
					<p>Email <strong>' .$email. '</strong></p>
					<br/>
					<p>Téléphone <strong>' .$telephone. '</strong></p>
					<br/>				
					<p>Commentaire <strong>' .$commentaire. '</strong></p>
				</body>
			</html>';

			if(!$mail->send())
			{
				$message = 'erreur envoi '.$mail->ErrorInfo;
			}
			else 
			{
				$message = 'Eureka';
				// mise à jour table clients
			}
		}
		$this->show('page/contact',["message"=>$message]);
	}

	

	public function article($id)
	{
		
		$this->show("page/article",['id'=>$id]);
	}
 	
 	public function info()
 	{
 		$this->show("page/infoPage");
 	}

 	public function mdpo()
 	{

 		$message="";

 		if(isset($_REQUEST["operation"]) && ($_REQUEST["operation"] == "mdpo"))
		{
			// Recuperer les infos du formulaire
			$email = trim($_REQUEST["email"]);

			// un peu de securite
			if(filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				// je verif si le email existe dans la base de donné
				$objetMdpo = new \Model\UserModel;
				$result = $objetMdpo->emailExists($email);

				$objetRecupMdpo = new \Model\MonModel;
				$resultMdpo= $objetRecupMdpo->findBy($nom,$MotDePasse);

				$mail = new PHPMailer(); // création objet de type mail 
				$mail->isSMTP(); // connexion directe au serveur SMTP
				//$mail->SMTPDebug = 2;
				$mail->isHTML(true); // utilisation du format HTML
				$mail->Host='smtp.gmail.com'; // serveur SMTP pour envoyer
				$mail->Port = 465; // le port obligatoire de google
				$mail->SMTPAuth = true; // on va fournir un login/password au serveur
				$mail->SMTPSecure = 'ssl'; // cerfiticat SSL
				$mail->Username='anthoine.demares@gmail.com';
				$mail->Password='johndo113';
				$mail->setFrom('anthoine.demares@gmail.com'); // l'expéditeur
				$mail->AddAddress('webforce13@gmail.com'); // l'adresse mail du destinataire
				$mail->Subject ="Email"; // objet du mail 
				$mail->Body ='
				<html>
					<head>
						<style> h1{color: pink;} </style>
					</head>
					<body>
						<h1>message</h1>
						<p>votre Mot De Passe est <strong>' .$resultMdpo. '</strong></p>
					</body>
				</html>';

				if(!$mail->send())
				{
					$message = 'erreur envoi '.$mail->ErrorInfo;
				}
				else 
				{
					$message = 'votre nouveau mot de passe vous a eté envoiyer par e-mail';
					// mise à jour table clients
				}


			}
			else{$message = "votre email n'existe pâs";}
		}
 		$this->show("page/mdpo",['message' => $message]);
 	}
}



