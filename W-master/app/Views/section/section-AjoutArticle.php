<form action="" class="form-horizontal"  method="POST" enctype="multipart/form-data">


<div class="form-group">
	<label for="ref" class="col-sm-2 control-label">Référence</label>
	<input id="ref" name="ref" placeholder="Entrer la Référence de votre article" type="text">
</div>	

	<br>

<div class="form-group">	
	<label for="designation" class="col-sm-2 control-label">Désignation</label>
	<input id="designation" name="designation" placeholder="Désignation de votre article" type="text">
</div>

	<br>

<div class="form-group">	
	<label for="condition" class="col-sm-2 control-label">Etat de la piece</label>
	<select name="condition" value="">
		<option value="Bon" selected id="Bon">BON</option>
		<option value="Moyen" id="Moyen">Moyen</option>
		<option value="Mauvais" id="Mauvais">Mauvais</option>
	</select>
</div>

	<br>

<div class="form-group">
	<label for="Description" class="col-sm-2 control-label">La Description de la piece</label>
	<textarea name="description" id="Description" cols="30" rows="10"></textarea>	
</div>

	<br>

<div class="form-group">
	<label for="quantite" class="col-sm-2 control-label">Les Quantitées des pieces Disponible </label>
	<input type="number" min="0" name="quantite" id="quantite">
</div>

	<br>

<div class="form-group">	
	<label for="image" class="col-sm-2 control-label">Inserée photo 1:</label>
	<input name="image" id="image" type="file">
</div>

	<br>	

	<button type="submit" name="btn btn-default" >ENVOYER</button>
	<input type="hidden" name="operation" value="ajouter">
	<div>
		<?php if (isset($message)) echo $message; ?>
	</div>
</form>