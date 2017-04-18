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


	public function annonce()
	{
		$this->show('page/annonce');
	}

	//Methode associer a la l'ajout des article dans la base de donné
	public function ajoutArticle()
	{
		// ON VEUT PROTEGER L'ACCES A CETTE PAGE
        //$this->allowTo([ "admin", "super-admin" ]);

        
		// la variable ou afficher les messages
		$message="";

		if(isset($_POST['operation']) && ($_POST['operation'] == "ajouter"))
		{
			// Recuperer les infos du formulaire
			$reference = trim($_POST['ref']);
			$designation = trim($_POST['designation']);
			$condition = trim($_POST['condition']);
			$description = trim($_POST['description']);
			$quantite = trim($_POST['quantite']);
			
			$image = ""; 
			// on vérifie maintenant l'extension
			$type_file = $_FILES['image']['type'];

			if(
				(isset($_FILES['image']) || isset($_FILES['image2']) || isset($_FILES['image3'])) &&   
				(strstr($type_file, 'jpg') || strstr($type_file, 'jpeg') || strstr($type_file, 'bmp') || strstr($type_file, 'gif'))
			  )
			{
 
				$dossier = '../public/assets/imageBdd/'; // le dossier ou mettre la photo
				$fichier = $_FILES['image']['name']; // le nom du fichier d'origine 
				$tmpName = $_FILES['image']['tmp_name'];
				if(move_uploaded_file($tmpName, $dossier.$fichier))
				{
					$message = 'votre image à était télecharger!';
					$image = $dossier.$fichier;
				}

				// pour l'image2
				$dossier2 = '../public/assets/imageBdd/'; // le dossier ou mettre la photo
				$fichier2 = $_FILES['image2']['name']; // le nom du fichier d'origine 
				$tmpName2 = $_FILES['image2']['tmp_name'];
				if(move_uploaded_file($tmpName2, $dossier2.$fichier2))
				{
					$message = 'votre image à était télecharger!';
					$image2 = $dossier2.$fichier2;
				}

				// pour l'image3
				$dossier3 = '../public/assets/imageBdd/'; // le dossier ou mettre la photo
				$fichier3 = $_FILES['image3']['name']; // le nom du fichier d'origine 
				$tmpName3 = $_FILES['image3']['tmp_name'];			
				if(move_uploaded_file($tmpName3, $dossier3.$fichier3))
				{
					$message = 'votre image à était télecharger!';
					$image3 = $dossier3.$fichier3;
				}
			}
			else
			{
				$message='Erreur de téléchargement';
			}	

			// Verifier que chaque info est conforme
			if(	is_string($reference)   && (mb_strlen($reference) > 0) &&
			 	is_string($designation) && (mb_strlen($designation) > 0) &&
			 	in_array($condition,array('Bon','Moyen','Mauvais'))   &&
			 	is_string($description) && (mb_strlen($description) > 0) &&
			 	is_numeric($quantite)   && (mb_strlen($quantite) > 0)
			 	/* verife image */
			  )
			{

					$objetArticle = new \Model\PiecesModel;
					$result = $objetArticle->insert([

					"Reference" => $reference,
					"Designation" => $designation,
					"EtatDeLaPiece" => $condition,
					"Description" => $description,
					"Quantite" => $quantite,
					"Image" => $image,
					"Image2"=> $image2,
					"Image3"=> $image3
					],true);

				// ca marche
				if($result == false)
				{
					$message = "Erreur";
				}
				else
				{
					$message = "Bravo vous avez rajouter un article";
				}


			}
			else
			{
				// une erreur
				$message = "Erreur infos incorrecte";
			}
		}
		$this->show('page/ajoutArticle',['message' => $message]);
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

	

	public function article()
	{
		
		$this->show("page/article");
	}

	public function articleDetail($url)
	{
		$this->show("page/article-detail",["url" => $url]);	
	}

	public function connexion()
	{
		$message="";
		$this->show("page/connexion",['message' => $message]);
	}
	
	public function info()
	{
		$this->show("page/infoPage");
	}

	public function mdpo()
	{
		$message ="";
		/* Récuperation du formulaire du modif mot de passe */
		if (isset($_['btnEmail'])) 
		{
			$email = trim($_REQUEST["email"]);

			if(filter_var($email,FILTER_VALIDATE_EMAIL))
			{
				/*faire l'ogjets de la Class UserModel pour pouvoir utiliser 
				la fonction emailExists*/
				$objetEmail = new \Model\UserModel;
				if($Verif = $objetEmail->emailExists($email))
				{
					/*Récuperatin du mot de passe dans la basse de donnée*/
					$objetEmail = new \Model\MonModel;
					$MotDePasse = $objetEmail->findBy('Nom','Email');
					// envoie du mail
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
							<p>Votre Mot de passe:</p>
							<p><strong>'.$MotDePasse.'</strong></p>
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

					
				}else{$message = 'erreur';}
			
			}else{$message="votre Email est incorrecte";}
	
		}else{$message = 'votre formulaire est incorrecte';}
		/* l'affichage de la page */
		$this->show("page/mdpo",['message' => $message]);
	}


}



