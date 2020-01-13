<div id="titre">
<h1>Inscription</h1>
<hr>
</div>
                                                            <form method="post" action="" id="mc_signup_form">
                                                               

                                                                
                                                                    <div class="mc_merge_var">
                                                                        <label>Nom</label>
                                                                        <input type="text" name="nom" id="mc_mv_FNAME" class="form-control" required />
                                                                    </div><!-- /mc_merge_var -->

                                                                    <div class="mc_merge_var">
                                                                        <label>Prénom</label>
                                                                        <input type="text" name="prenom" id="mc_mv_FNAME" class="form-control" required />
                                                                    </div><!-- /mc_merge_var -->

                                                                    <div class="mc_merge_var">
                                                                        <label>Email<span class="mc_required">*</span></label>
                                                                        <input type="email" name="email" id="mc_mv_EMAIL" class="form-control" required />
                                                                    </div><!-- /mc_merge_var -->

                                                                    <div class="mc_merge_var">
                                                                        <label>Login<span class="mc_required">*</span></label>
                                                                        <input type="text" name="login" id="mc_mv_login" class="form-control" required />
                                                                    </div><!-- /mc_merge_var -->

                                                                    <div class="mc_merge_var">
                                                                        <label>Organisme<span class="mc_required">*</span></label>
                                                                        <input type="text" name="organisme" id="mc_mv_organisme" class="form-control" required />
                                                                    </div><!-- /mc_merge_var -->
                                                                <br>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="role" id="mc_mv_role" class="form-control" value="administrateur">
                                                                        <label class-form-label>Administrateur</label>
                                                                    </div> 

                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="role" id="mc_mv_role" class="form-control" value="formateur">
                                                                        <label class-form-label>Formateur</label>
                                                                    </div> 
                                                                <br>
                                                                    <div class="mc_merge_var">
                                                                        <label>Mot de passe<span class="mc_required">*</span></label>
                                                                        <input type="password" class="form-control" id="password"  required />
                                                                    </div><!-- /mc_merge_var -->

                                                                    <div class="mc_merge_var">
                                                                        <label>Confirmation de mot de passe<span class="mc_required">*</span></label>
                                                                        <input type="password" class="form-control" id="confirm_password" name="mdp" required />
                                                                    </div><!-- /mc_merge_var -->
<br>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="validation" id="mc_mv_role" class="form-control" value="0" checked>
                                                                        <label class=form-check-label>En cours de validation</label>
                                                                    </div> 
                                                                    <br>


                                                                        <input type="submit"  id="mc_signup_submit" value="Je m'inscris au jeu" class="btn" style="margin-bottom:1rem;"/>
                                                            </form><!-- /mc_signup_form -->

                                                      
<script>
var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("La confirmation du mot de passe n'est pas identique!");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>