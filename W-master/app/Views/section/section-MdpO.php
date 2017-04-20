
<div class="mdpo">
<h2> Veuillez entrer votre Email afin de redéfinir votre mot de pass<h2>

<form id="mdpo" method="post" action="">
        <label>Email</label>
        <input type="Email" name="email" >        
        <input type="hidden" name="operation" value="mdpo">
        <input type="submit" name="btnEmail" value=" Envoyer ">
        <div>
        	<?php if(isset($message)) echo $message ;?>
        </div>
</form>
</div>

