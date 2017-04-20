<?php 
namespace Controller;

use \W\Controller\Controller;

class AdministrateurController extends Controller
{
	
	/*************************************************************************/
	public function modif()
	{
		// ON VEUT PROTEGER L'ACCES A CETTE PAGE
    	$this->allowTo([ "admin", "super-admin" ]);
		// on utilise un objets de la classe 

		$message="";

		if(isset($_POST['submit']))
		{
			// recuperation des donnes du formulaire
			$ActuelleMdp = trim($_POST['mdpA']);
			$NouveauMdp = trim($_POST['mdpN']);
			$VerifMdp  = trim($_POST['mdpV']);
			
			// Récuperaton du login actuelle avec la fonction getUser() et le parametre "login"
			$UserActuelle = $this->getUser();
			$login = $UserActuelle["login"];


			if(is_string($ActuelleMdp) && mb_strlen($ActuelleMdp) > 4 )
			{
				// Vérification du des login 'identifiant' et 'le mot de passe actuelle'
				$objetAuthentificationModel = new \W\Security\AuthentificationModel;
				$mdpActuelle->isValidLoginInfo($login, $ActuelleMdp);

				if(is_string($NouveauMdp) == is_string($VerifMdp))
				{
					$hash = password_hash($NouveauMdp, PASSWORD_DEFAULT);
					$hash->update([
					"MotDePasse"=>$hash],true);

					$message = "Bravo tu a modifier ton mot de passe ";
				}
				else{$message = "Le nouveau mot de passe n'est pas identique";}
			}
			else{$message = "le mot de passe n'est pas correcte";}

		}
		$this->show("page/modif",["message"=>$message]);
	}

	/**************************************************************************/
	// la page administrateur 

	public function admin()
	{
		// ON VEUT PROTEGER L'ACCES A CETTE PAGE
    	$this->allowTo([ "admin", "super-admin" ]);
		// on utilise un objets de la classe 
		$this->show("page/modif",["message"=>$message]);

	}

	/*****************************************************************************/
	// la page d'ajout article

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
			  )
			{
				if(isset($image) && empty($image2) && empty($image3))
				{
					$objetArticle = new \Model\PiecesModel;
					$result = $objetArticle->insert([

					"Reference" => $reference,
					"Designation" => $designation,
					"EtatDeLaPiece" => $condition,
					"Description" => $description,
					"Quantite" => $quantite,
					"Image" => $image
					],true);
				}


				if(isset($image) && isset($image2) && empty($image3))
				{
					$objetArticle = new \Model\PiecesModel;
					$result = $objetArticle->insert([

					"Reference" => $reference,
					"Designation" => $designation,
					"EtatDeLaPiece" => $condition,
					"Description" => $description,
					"Quantite" => $quantite,
					"Image"  => $image,
					"Image2" => $image2
					],true);
				}

				if(isset($image) && isset($image2) && isset($image3)) 
				{
					$objetArticle = new \Model\PiecesModel;
					$result = $objetArticle->insert([

					"Reference" => $reference,
					"Designation" => $designation,
					"EtatDeLaPiece" => $condition,
					"Description" => $description,
					"Quantite" => $quantite,
					"Image"  => $image,
					"Image2" => $image2,							
					"Image3" => $image3							
					],true);								
				}
						


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

							

		}
		$this->show('page/ajoutArticle',['message' => $message]);
	} 


			

				







}

?>