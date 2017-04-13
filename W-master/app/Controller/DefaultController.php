<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\ArticleModel;
use \PHPMailler;

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


	//Methode associer a la l'ajout des article dans la base de donné
	public function AjoutArticle()
	{
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
				(isset($_FILES['image'])) &&  
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
					"Image" => $image],true);

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
		$this->show('page/AjoutArticle');
	} 

	public function contact() 
	{
		$message="";
		if(isset($_POST['operation'])) 
		{
			/*$nom = $_POST['nom'];
			$email = $_POST['email'];
			$telephone = $_POST['tel'];
			$commentaire = $_POST['commentaire'];*/

			$mail = new PHPMailer(); // création objet de type mail 
			$mail->isSMTP(); // connexion directe au serveur SMTP
			$mail->SMTPDebug = 2;
			$mail->Debugoutput = 'html';
			$mail->isHTML(true); // utilisation du format HTML
			$mail->Charset = "utf-8"; //L'encodage du mail
			$mail->Host='smtp.gmail.com'; // serveur SMTP pour envoyer
			$mail->Port = 25; // le port obligatoire de google
			$mail->SMTPAuth = true; // on va fournir un login/password au serveur
			$mail->SMTPSecure = 'ssl'; // cerfiticat SSL
			$mail->Username='webforce13@gmail.com';
			$mail->Password='azerty123456';
			$mail->setFrom= ('webforce13@gmail.com'); // l'expéditeur
			$mail->AddAddress('mabrouk.houssam@hotmail.fr'); // l'adresse mail du destinataire
			$mail->Subject ="Email"; // objet du mail 
			$mail->Body ='
			<html>
				<head>
					<style> h1{color: pink;} </style>
				</head>
				<body>
					<h1>message</h1>
					<p>nom <strong> .$nom. </strong></p>
					<br/>
					<p>Email <strong> .$email. </strong></p>
					<br/>
					<p>Téléphone <strong> .$telephone. </strong></p>
					<br/>				
					<p>Commentaire <strong> .$commentaire. </strong></p>
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
		$this->show('page/contact');
	}

	

	public function article()
	{
		$this->show('page/article');

	}
}



