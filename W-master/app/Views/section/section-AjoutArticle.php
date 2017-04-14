<h1>POSTER UN ARTICLE</h1>


<form action="" class="form-horizontal"  method="POST" enctype="multipart/form-data" style="margin-bottom: 0px;">


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

<div>
	<label for="condition" class="col-sm-2 control-label">Etat de l'article</label>	
	<label class="radio-inline">
  	<input type="radio" name="condition" id="Bon" value="Bon">BON
	</label>
	<label class="radio-inline">
 	 <input type="radio" name="condition" id="Moyen" value="Moyen">&nbsp;MOYEN
	</label>
	<label class="radio-inline">
  	<input type="radio" name="condition" id="Mauvais" value="Mauvais">&nbsp; MAUVAIS
	</label>
</div>

	<br>

<div class="form-group">
	<label for="description" class="col-sm-2 control-label">La Description de la piece</label>
	<textarea name="description" id="description" cols="30" rows="10"></textarea>	
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
<div class="form-group">	
	<label for="image" class="col-sm-2 control-label">Inserée photo 2:</label>
	<input name="image" id="image" type="file">
</div>
<div class="form-group">	
	<label for="image" class="col-sm-2 control-label">Inserée photo 3:</label>
	<input name="image" id="image" type="file">
</div>
	<br>	

	
	<button type="submit" name="btn" class="btn">ENVOYER</button>
	<input type="hidden"  name="operation" value="ajouter">
	<div>
		<?php if (isset($message)) echo $message; ?>
	</div>
</form>