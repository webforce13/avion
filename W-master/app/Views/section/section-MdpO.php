
<div class="mdpo">
<h2> Veuillez entrer votre Email afin de redéfinir votre mot de passe<h2>

<form id="mdpo" method="post" action="">
        <label>Email</label>
        <input type="Email" name="email" > 
        <br>  
        <br> 
        <input type="submit" name="btnEmail" value=" Envoyer ">
        <div>
        	<?php if(isset($message)) echo $message ;?>
        </div>
</form>
</div>

