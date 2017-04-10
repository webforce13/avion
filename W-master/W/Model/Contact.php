<?php 
namespace Model;
use \W\Model\Model;
/* la class qui permet d'inscrire les message pour contacter le vendeur*/

class Contact extends Model 
{
	public function Inscrire()
	{
				// je récuperer mon formulaire 
		if(isset($_POST['submit'])){

			// je fais une requete SQL pour insérer les éléments 
			$requete = "INSERT INTO contacts(nom, email, telephone, commentaire) 
						VALUES (:nom, :email, :telephone, :commentaire)";
			
			$stmt =  $bdd->prepare($requete);
			
			$params = array( ':nom'         => $nom,
							 ':email'       => $email,
							 ':telephone'   => $telephone,
							 ':commentaire' => $commentaire);
			
			$stmt->execute($params);		
	} 
}

?>