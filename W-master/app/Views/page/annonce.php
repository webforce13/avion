<?php
/* la page liste d'annonces */ 
$this->insert("section/section-annonce-header");
$this->insert("section/section-annonce",[

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
$this->insert("section/section-footer");
?>