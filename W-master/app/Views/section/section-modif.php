<form method="post" action="">
        <label>Mot de passe actuel : </label>
        <input type="password" name="mdpA" >
        <br/>
        <label>Nouveau mot de passe :</label> 
        <input type="password" name="mdpN" >
        <br/>
        <label>Verification mot de passe : </label>
        <input type="password" name="mdpV" >

        <input type="submit" name="submit" value=" Envoyer ">
        <div>
        	<?php if(isset($message)) echo $message ;?>
        </div>
    </form>
     