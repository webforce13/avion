<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            
            <div class="account-wall">
                <p id="renseignez">Renseignez vos données pour vos connecter</p>
                <img class="profile-img" src="../public/assets/images/attention.png"
                    alt="">
                <form class="form-signin">
                <input type="text" class="form-control" placeholder="Email" required autofocus>
                <input type="password" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Se connecter</button>
                <label class="checkbox pull-left">
                    <input type="checkbox" value="remember-me">
                    Remember me
                </label>
                <a href="#" class="pull-right need-help">Besoin d'aide?</a><span class="clearfix"></span>
            
                <a href="#" class="text-center new-account">Créer un compte </a>
                <span><a href="<?php echo $this->url('page_modif')?>">Modifier le Mot de passe </a></span>
                </form>
            </div>
        </div>
    </div>
</div>
            <?php if (isset($message)) echo $message ?>
    </div>
</section>