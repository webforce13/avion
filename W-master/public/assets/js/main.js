// recupération du formulaire et traitement
/*


document.getElementById('form').onsubmit=function(){
 	var inputs  = document.querySelectorAll('input.obligatoire');
 	var erreur = 0;
 	
	var id = inputs.id;
	var idMessage =  id + '-erreur';
	var contenu = document.querySelectorAll('input.obligatoire').value;
	var verif = "";
 	
	if (contenu == verif){
		erreur++;

		// On affiche le message d'erreur
		idMessage.classList.remove("hidden");
 			
		inputs.classList.add("invalid");
 			
		// On enlève la classe "valid" à l'input
		inputs.classList.remove("valid");
	}
	else{
		// Sinon on cache le message d'erreur
		inputs.classList.add("hidden");

		// On ajoute à l'input la classe valid et on enlève la classe invalid
		inputs.classList.add("valid");
		inputs.classList.remove("invalid"); 			
	}
	// Si il y a des erreurs, on ne soumet pas le formulaire
	return false;
};


*/


// On se branche sur la soumission du formulaire dont l'id est "form-contact"
$('#form-contact').submit(function(){
  // On créé une variable qui contient tous les inputs du form-contact
  var inputs = $('#form-contact input');
  // On créé une variable (type booleen) qui nous permettra de savoir si il y a des erreurs ou pas
  var erreurs = false;

  // Pour chaque input dans notre variable inputs
  inputs.each(function(index, input){
    // input représente ici chaque input
    // l'identifiant de l'input est contenu dans input.id
    var idInput = input.id;
    // On en déduit l'identifiant du <span> qui contient le message d'erreur
    var idMessage = idInput + '-erreur';
    // On en déduit le sélecteur CSS qui nous permettra de retrouver le <span> avec jQuery
    var selecteurMessage = '#' + idMessage;

    // Si la valeur de l'input n'existe pas (longueur === 0)
    if($(input).val().length === 0){
      // On supprime la classe "valid" et on ajoute la classe "invalid"
      $(input).removeClass('valid').addClass('invalid');
      // On demande à jQuery de trouver le message d'erreur grâce au sélecteur CSS et on appelle la fonction .show()
      $(selecteurMessage).show();
      // On signale qu'il y a eu une erreur
      erreurs = true;
    } else {
      // Si tout va bien, on supprime la classe invalide de l'input et on ajoute la classe valid
      $(input).removeClass('invalid').addClass('valid');
      // On demande à jQuery de trouver le message d'erreur grâce au sélecteur CSS et on appelle la fonction .hide()
      $(selecteurMessage).hide();
    }
  });

  // Si il n'y a eu aucune erreur (erreurs n'est pas passé à "true")
  if(erreurs === false) {
    // On récupère le nom qui a été entré
    var nom = $('#nom').val();
    // On créé une phrase de remerciement qui contient le nom
    var phrase = "Bravo, vous êtes inscrit cher(e) <strong>" + nom + "</strong>";
    // On injecte le phrase créée à l'interieur du <span> dont l'identifiant est "success-message"
    $('#success-message').html(phrase);
    // On demande à jQuery de faire apparaitre le <span> dont l'identifiant est "success-message"
    $('#success-message').show();
    // On demande à jQuery de faire disparaitre le formulaire dont l'identifiant est "form-contact"
    $('#form-contact').hide();
  }

  // Dans tous les cas on empêche le formulaire de partir
  return false;
})	
    

/*  verif du textarea */

document.getElementById('form-contact').onsubmit=function(){
  var Commentaire = document.getElementById('Commentaire').value;
  
  var info = document.getElementById('Commentaire');
  var span = document.getElementById('erreur');
  
  if (Commentaire == 0){
    $(info).removeClass('valid').addClass('invalid');
    $(span).removeClass('hidden');
  }
  else{
    $(info).removeClass('invalid').addClass('valid');
    $(span).addClass('hidden');
  }
}