
<form action="" id="form-contact" method="POST">
	
		<label for="nom">Nom:</label>
		<input type="text" name="nom" id="nom" placeholder="Votre Nom" class="obligatoire">
		<span class="error hidden" id="nom-erreur">Veuillez entrer votre nom de famille !</span>


		<br>

		<label for="email">Email:</label>
		<input type="text" name="email" id="email" placeholder="Votre Email" class="obligatoire">
		<span class="error hidden" id="email-erreur">Veuillez entrer votre email !</span>


		<br>

		<label for="tel">téléphone:</label>
		<input type="text" name="tel" id="tel" placeholder="Votre numero de téléphone">

		<br>

		<lable for="Commentaire">Commentaire:</lable>
		<br>
		<textarea name="Commentaire" id="Commentaire" cols="30" rows="10" class="obligatoire">	
		</textarea>
		<span class="error hidden" id="erreur">Veuillez entrer votre commentaire !</span>


		<br>

		<input name="submit" class="submit" type="submit" value="Envoyer">
</form>


