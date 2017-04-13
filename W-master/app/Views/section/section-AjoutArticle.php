<form action="" method="POST" enctype="multipart/form-data">
	<label for="ref">Référence</label>
	<input id="ref" name="ref" placeholder="mettre la Référence" type="text">
	<br>
	<label for="designation">Designation</label>
	<input id="designation" name="designation" placeholder="Designation" type="text">
	<br>
	<label for="condition">Etat de la piece</label>
	<select name="condition" value="">
		<option value="Bon" selected id="Bon">BON</option>
		<option value="Moyen" id="Moyen">Moyen</option>
		<option value="Mauvais" id="Mauvais">Mauvais</option>
	</select>
	<br>
	<label for="Description">La Description de la piece</label>
	<textarea name="description" id="Description" cols="30" rows="10"></textarea>		
	<br>
	<label for="quantite">Les Quantitées des pieces Disponible </label>
	<input type="number" min="0" name="quantite" id="quantite">
	<br>
	<label for="image">Inserée photo 1:</label>
	<input name="image" id="image" type="file">
	<br>	
	<label for="image2">Inserée photo 2:</label>
	<input name="image2" id="image2" type="file">
	<br>	
	<label for="image3">Inserée photo 3:</label>
	<input name="image3" id="image3" type="file">
	<br>	
	<button type="submit" name="btnSub" >ENVOYER</button>

	<input type="hidden" name="operation" value="ajouter">
	<div>
		<?php if (isset($message)) echo $message; ?>
	</div>
</form>