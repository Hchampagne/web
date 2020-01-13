<div id="titre">
<h1> Login</h1>
<hr>
</div><br>
  <form action="" name="login" role="form" class="" method="post" id="mc_signup_form" accept-charset="utf-8">

  <div class="form-group">
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
  <a href=<?= site_url("connexion/reset") ?> style="" >
    <button type="button" class="btn btn-primary" id="reset" value="connexion" style="border: none">Mot de passe oublié !</button>
  </a> 
  </div>
</form>