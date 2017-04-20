<?php
namespace Controller;
use\W\Controller\Controller;

/**
 * 
 */
 class UsersController extends Controller
 {
 	
 	public function logout()
	{
		$message="";
		$objetAuthentificationModel = new \W\Security\AuthentificationModel;
        $objetAuthentificationModel->logUserOut();

        // Rediriger vers la page de login
        $this->redirectToRoute("users_connexion",['message' => $message]);
	} 
/*******************************************************************************/
	// Traitement du formulaire de la route Connection
	public function connexion()
	{		
		$message = "";

		//traiter le formulaire
		if(isset($_POST["operation"]) && ($_POST["operation"] == "login"))
		{
			$login = trim($_REQUEST["login"]);
			$password = trim($_REQUEST["password"]);

			if  (	is_string($login) && mb_strlen($login) > 4
					&& is_string($password) && (mb_strlen($password) > 4)
				)
			{
				// utilisation de la class "AuthentificationModel" qui utilise la fonction
				// "isValidLoginInfo" qui fait la gestion sql a notre place  
				$objetAuthentificationModel = new \W\Security\AuthentificationModel;
				$idUser = $objetAuthentificationModel->isValidLoginInfo($login, $password);


				if($idUser > 0)
				{
					$message = "Bienvenue $idUser";
					$objetUserModel = new \W\Model\UsersModel;

					//on recupere la ligne sur l'utilisateur
					$tabUser = $objetUserModel->find($idUser);
					// la fonction "logUserIn" va memoriser les informatins de l'utilisateur dans une session
					$tabUser = $objetAuthentificationModel->logUserIn($tabUser);
					$this->redirectToRoute("page/administarteur",['message' => $message]);

				}
				else
				{
					$message = "Identification incorrects";
				}
			}
			else
			{
				$message = "Identification incorrects";
			}
		} 
		$this->show("page/connexion",["message"=>$message]);

	}
 	
 } 
?>
