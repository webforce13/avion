<form action="AjoutArticle.php" method="POST">
	<label for="ref">Référence</label>
	<input id="ref" name="ref" placeholder="mettre la Référence" type="text">
	<br>
	<label for="designation">Designation</label>
	<input id="designation" name="Designation" placeholder="Designation" type="text">
	<br>
	<label for="condition">Etat de la piece</label>
	<option value="condition">
		<select name="Bon" id="Bon">BON</select>
		<select name="Moyen" id="Moyen">Moyen</select>
		<select name="Mauvais" id="Mauvais">Mauvais</select>
	</option>
	<br>
	<label for="Description">La Description de la piece</label>
	<textarea name="description" id="Description" cols="30" rows="10"></textarea>		
	<br>
	<label for="quantite">Les Quantitées des pieces Disponible </label>
	<input type="number" name="quantite" id="quantite">
	<br>
	<label for="image">Inserée les images</label>
	<input name="image" id="image" type="file">
	<br>
	<button type="submit" name="btnSub" >ENVOYER</button>

	<input type="hidden" name="operation" value="ajouter">
	<div class="message">
		<?php if (isset($message)) echo $message; ?>
	</div>
</form>