<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <div class="account-wall">
                    <p id="renseignez">Renseignez vos données pour vos connecter</p>
                    <img class="profile-img" src="../public/assets/images/attention.png" alt="">
                    <form class="form-signin" method="POST">
                        <input type="text" class="form-control" placeholder="Email" name="login" required >
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                        
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
                        <input type="hidden" name="operation" value="login">
                        <label class="checkbox pull-left">
                            <input type="checkbox" value="remember-me">
                            Remember me
                        </label>
                        <br/>
                        <sapn><a href="<?php echo $this->url('page_mdpo')?>">Mot de passe oublier</a></sapn>
                    </form>
                </div>
            </div>
        </div>
    </div>
        <div>
            <?php if (isset($message)) echo $message ?>
        </div>
</section>
            