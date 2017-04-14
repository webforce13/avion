<section>
    <form action="" method="POST">
        <label for="login">Ce Connecter</label>
        <input id="login" name="login" type="text" required>
        </br>
        <label for="password">Mot De Passe</label>
        <input id="password" name="password" type="password" required>

        <span><a href="">modifier le mot de passe</a></span>

        <button type="submit">CONNEXION</button>

        <input type="hidden" name="operation" value="login">
    </form>
    <div>
            <?php if (isset($message)) echo $message ?>
    </div>
</section>