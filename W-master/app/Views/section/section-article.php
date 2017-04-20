


<?php
// LA METHODE findAll EST DEFINIE DANS LA CLASSE \W\Model\Model
// LA METHODE findAll RENVOIE UN TABLEAU DE TABLEAU 
$objetPiecesModel = new \Model\PiecesModel;
$tabinfo = $objetPiecesModel-> find($id);


// pour chaque ligne je recupere une colonne dans une variable
$designation = $tabinfo['Designation'];
$reference   = $tabinfo['Reference'];
$condition   = $tabinfo['EtatDeLaPiece'];
$description = $tabinfo['Description'];
$quantite    = $tabinfo['Quantite'];
$image       = $tabinfo['Image'];
$image2      = $tabinfo['Image2'];
$image3      = $tabinfo['Image3'];



// la gestion des photos vide ou remplis pour l'image variable $PHPimage 
if(isset($image))
{
    $PHPimage = '<img src="' . $image .'"' ;
}
else
{
    $PHPimage = 'no image';
}

// la gestion des photos vide ou remplis pour l'image variable $PHPimage2 
if(isset($image2))
{
    $PHPimage2 = '<img src="' . $image2 .'"' ;
}
else
{
    $PHPimage2 = 'no image';
}

// la gestion des photos vide ou remplis pour l'image variable $PHPimage3 
if(isset($image3))
{
    $PHPimage3 = '<img src="' . $image3 .'"' ;
}
else
{
    $PHPimage3 = 'no image';
}


           
echo
<<<CODEHTML
  <h1 id="titrearticle">$designation</h1>
  <div class="wrapper">
    <div class="carousel-container">    
      <ul class="carousel">
        <li>$PHPimage</li>
        <li>$PHPimage2</li>
        <li>$PHPimage3</li>
      </ul>    
    </div>
  </div>




<div class="art">
  <table>
     <tr>
         <td>Reference : </td>
         <td><input type="text" name="Reference" value="$reference"/>
         </td>       
     </tr>

     <tr>
         <td>Designation : </td>
         <td><input type="text" name="Designation" value="$designation"/>
         </td>       
     </tr>

     <tr>
         <td>EtatDeLaPiece : </td>
         <td><input type="text" name="EtatDeLaPiece" value="$condition"/>
         </td>       
     </tr>

     <tr>
         <td>Quantite : </td>
         <td><input type="text" name="Quantite" value="$quantite"/>
         </td>       
     </tr>
     
     <tr>
         <td>Description : </td>
         <td><input type="text" name="Description" value="$description"/>
         </td>       
     </tr>
   
  </table>
  </div>



CODEHTML;
?>  
