<form method="post" action="">
        <label>Email</label>
        <input type="Email" name="email" >
        <br/>
        <input type="submit" name="btnEmail" value=" Envoyer ">
        <div>
        	<?php if(isset($message)) echo $message ;?>
        </div>
    </form>


