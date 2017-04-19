<?php
namespace Controller;

use \W\Controller\Controller;
use \Model\ArticleModel;
use \PHPMailer;

public function annonce()
	{
		$objetPiecesModel = new \Model\PiecesModel;
		/*$objetPiecesMode2 = new \Model\PiecesModel;
		$objetPiecesMode3 = new \Model\PiecesModel;
		$objetPiecesMode4 = new \Model\PiecesModel;
		$objetPiecesMode5 = new \Model\PiecesModel;*/

		$tabResult1 = $objetPiecesModel-> findAll("Id", "DESC",1);
		/*$tabResult2 = $objetPiecesMode2-> findAll("Designation", "DESC");
		$tabResult3 = $objetPiecesMode3-> findAll("Designation", "DESC");
		$tabResult4 = $objetPiecesMode4-> findAll("Designation", "DESC");
		$tabResult5 = $objetPiecesMode5-> findAll("Designation", "DESC");*/

		// le resultat du premier article
		foreach ($tabResult1 as $index => $tabinfo) 
		{
			$designation1 = $tabinfo['Designation'];
			$image1       = $tabinfo['Image'];
			$description1 = $tabinfo['Description'];
		}

		/*// le resultat du 2eme article
		foreach ($tabResult2 as $index => $tabinfo) 
		{
			$designation2 = $tabinfo['Designation'];
			$image2       = $tabinfo['Image'];
			$description2 = $tabinfo['Description'];
		}

		// le resultat du 3eme article
		foreach ($tabResult3 as $index => $tabinfo) 
		{
			$designation3 = $tabinfo['Designation'];
			$image3       = $tabinfo['Image'];
			$description3 = $tabinfo['Description'];
		}

		// le resultat du 4eme article
		foreach ($tabResult4 as $index => $tabinfo) 
		{
			$designation4 = $tabinfo['Designation'];
			$image4       = $tabinfo['Image'];
			$description4 = $tabinfo['Description'];
		}

		// le resultat du 5eme article
		foreach ($tabResult5 as $index => $tabinfo) 
		{
			$designation5 = $tabinfo['Designation'];
			$image5       = $tabinfo['Image'];
			$description5 = $tabinfo['Description'];
		}*/
		
		$this->show('page/annonce',
			[	
				/* les infos du 1er article */
				'designation1'=>$designation1,
			 	'image1'      =>$image1,
			 	'description1'=>$description1,

			 	/* les infos du 2eme article 
			 	'designation2'=>$designation2,
			 	'image2'      =>$image2,
			 	'description2'=>$description2,

			 	/* les infos du 3eme article 
			 	'designation3'=>$designation3,
			 	'image3'      =>$image3,
			 	'description3'=>$description3,

			 	/* les infos du 4eme article 
			 	'designation4'=>$designation4,
			 	'image4'      =>$image4,
			 	'description4'=>$description4,

			 	/* les infos du 5eme article 
			 	'designation5'=>$designation5,
			 	'image5'      =>$image5,
			 	'description5'=>$description5,*/


			 	]);
	} 
?>