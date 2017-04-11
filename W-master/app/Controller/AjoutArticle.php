<?php 
namespace Controller;
use \W\Controller\Controller;

class AjoutArticle extends Controller
{
	//Methode associer a la l'ajout des article dans la base de donné
	public function InserteArticle()
	{
		// la variable ou afficher les messages
		$message="";

		if(isset($_POST['ajouter']) && ($_POST['ajouter'] == "ajouter"))
		{
			// Recuperer les infos du formulaire
			$reference = trim($_POST['ref']);
			$designation = trim($_POST['designation']);
			$condition = trim($_POST['Bon'] || $_POST['Moyen'] || $_POST['Mauvais']);
			$description = trim($_POST['description']);
			$quantite = trim($_POST['quantite']);
			$image = trim($_POST['image']);

			// Verifier que chaque info est conforme
			if(	is_string($reference)   && (mb_strlen($reference) > 0) &&
			 	is_string($designation) && (mb_strlen($designation) > 0) &&
			 	is_string($condition)   &&
			 	is_string($description) && (mb_strlen($description) > 0) &&
			 	is_numeric($quantite)   && (mb_strlen($quantite) > 0) &&
			 	/* verife image */
			  )
			{
				$id = 1;
				//enregistrer la ligne la table mysql article
				// je cree un objet de la classe ArticleModel
				// ne pas oublier de faire le "USE"

				// on appelle la class qui fait la requete SQL dans Model
				$objetArticle = new ArticleModel;

				$objetArticle->insert([
					"id" => $id,
					"Reference" => $reference,
					"Designation" => $designation,
					"EtatDeLaPiece" => $condition,
					"Description" => $description,
					"Quantite" => $quantite,
					"Image" => $image]);

				// ca marche
				$message = "Bravo vous avez rajouter un article";

			}
			else
			{
				// une erreur
				$message = "Erreur infos incorrecte";
			}
		}
	} 
}
?>
