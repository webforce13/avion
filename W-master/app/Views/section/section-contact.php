
<form id="form-contact" method="POST" action="DefaultController.php">
	
		<label for="nom">Nom:</label>
		<input type="text" name="nom" id="nom" placeholder="Votre Nom" class="obligatoire">
		<span class="error hidden" id="nom-erreur">Veuillez entrer votre nom de famille !</span>


		<br>

		<label for="email">Email:</label>
		<input type="text" name="email" id="email" placeholder="Votre Email" class="obligatoire">
		<span class="error hidden" id="email-erreur">Veuillez entrer votre email !</span>


		<br>

		<label for="tel">Téléphone:</label>
		<input type="text" name="tel" id="tel" placeholder="Votre numéro de téléphone">

		<br>

		<label>Commentaire:</label>
		<br>
		<textarea name="commentaire" id="Commentaire" cols="30" rows="10" class="obligatoire">	
		</textarea>
		<span class="error hidden" id="erreur">Veuillez entrer votre commentaire !</span>


		<br>
		<button type="submit" name="btn" class="btn btn-primary">ENVOYER</button>
		<input type="hidden"  name="operation" value="ajouter">
		<div class="message">
			<?php if (isset($message)) echo $message; ?>
		</div>
</form>


