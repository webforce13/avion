<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
        <div class="account-wall">
            <form method="post" action="" class="form-signin">
                <label>Mot de passe actuel : </label>
                <input type="password" name="mdpA" >
                <br/>
                <label>Nouveau mot de passe :</label> 
                <input type="password" name="mdpN" >
                <br/>
                <label>Verification mot de passe : </label>
                <input type="password" name="mdpV" >
                <br/>
                <input type="submit" name="submit" value=" Envoyer ">
                <div>
                	<?php if(isset($message)) echo $message ;?>
                </div>
            </form>
     </div>
     </div>
    </div> 