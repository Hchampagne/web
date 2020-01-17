<div class="container">
  <div>
    <div id="titre">
      <h1> Login</h1>
      <hr>
    </div><br>
    <!--<form action="" name="login" role="form" class="" method="post" id="mc_signup_form" accept-charset="utf-8"> -->
    <?= form_open('connexion/login', 'id="form_inscription"'); ?>

    <div class="form-group row justify-content-md-center">
      <label for="login" class="col-sm-2 col-form-label">Login</label>
      <div class="col-sm-6">
        <input type="text" name="login" id="log_login" class="form-control" value="<?php echo set_value('login') ?>" placeholder="Votre login">
        <span id=alertLogin>&nbsp<?= form_error('login', '<span>', '</span>') ?></span>
      </div>
    </div>

    <div class="form-group row justify-content-md-center">
      <label for="password" class="col-sm-2 col-form-label">Mot de passe</label>
      <div class="col-sm-6">
        <input name="password" type="password" class="form-control" id="log_mdp" value="<?php echo set_value('mdp') ?>" placeholder="Votre mot de passe">
        <span id="alertMdp">&nbsp<?= form_error('mdp', '<span>', '</span>') ?></span>
      </div>
    </div>

    <div class="form-group row justify-content-md-center">
      <div class="col-sm-2 col-form-label">
      </div>
      <div class="col-sm-6">
        <input type="submit" id="login_submit" value="login" class="btn">
        <a href=<?= site_url("connexion/reset") ?>>
        <button type="button" class="btn btn-primary" id="reset" value="connexion" style="border: none">Mot de passe oublié !</button>
      </div>
    </div>


    <!--<div class="form-group">
      <label for="exampleInputLogin">Login:</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email or login" name="login" required>
      <small id="emailHelp" class="form-text text-muted">Entrez votre login ou votre adresse email</small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Mot de Passe:</label>
      <input type="password" class="form-control" id="UserPassword" name="password" placeholder="Password" required>
    </div>
    <div style="margin-bottom:2rem; ">
      <button type="submit" class="btn btn-primary" id="valide" value="connexion" style="border: none">Valider</button>
      <a href=<?= site_url("connexion/reset") ?> style="">
        <button type="button" class="btn btn-primary" id="reset" value="connexion" style="border: none">Mot de passe oublié !</button>
      </a>
    </div> -->

    </form>
  </div>
</div>