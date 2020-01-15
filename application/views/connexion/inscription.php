<div class="container">  
    <div> 
        <div id="titre">
            <h1>Inscription</h1>
            <hr>
        </div>
          
        <form method="post" action="" id="mc_signup_form">
                                                                                                                        
            <div class="form-group row justify-content-md-center">
                <label  for="nom" class="col-sm-2 col-form-label">Nom</label>
                <div class="col-sm-6">
                    <input type="text" name="nom" id="mc_mv_FNAME" class="form-control" placeholder="Votre nom">
                    <span id="alertNom">&nbsp</span>
                </div>
            </div>

            <div class="form-group row justify-content-md-center">
                <label for="prenom" class="col-sm-2 col-form-label">Prénom</label>
                <div class="col-sm-6">               
                    <input type="text" name="prenom" id="mc_mv_FNAME" class="form-control" placeholder="Votre prénom">
                    <span id="alertPrenom">&nbsp</span>
                </div>
            </div>

            <div class="form-group row justify-content-md-center">
                <label for="organisme" class="col-sm-2 col-form-label">Organisme</label>
                <div class="col-sm-6">
                    <input type="text" name="organisme" id="mc_mv_organisme" class="form-control" placeholder="Votre organisme">
                    <span id="alertOrganisme">&nbsp</span>
                </div>    
            </div>

            <div class="form-group row justify-content-md-center">
                <label fro="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="email" name="email" id="mc_mv_EMAIL" class="form-control" placeholder="Votre email">
                    <span id="alertEmail">&nbsp</span>
                </div>
            </div>

            <div class="form-group row justify-content-md-center">
                <label for="login" class="col-sm-2 col-form-label">Login</label>
                <div class="col-sm-6">
                    <input type="text" name="login" id="mc_mv_login" class="form-control" placeholder="Votre login">
                    <span id=alertLogin>&nbsp</span>
                </div>
            </div>      
       
            <div class="form-group row justify-content-md-center">
                <label for="password" class="col-sm-2 col-form-label">Mot de passe</label>
                <div class="col-sm-6">
                    <input name="mdp" type="password" class="form-control" id="mdp"placeholder="Votre mot de passe">
                    <span id="alertMdp">&nbsp</span>
                </div>
            </div>

            <div class="form-group row justify-content-md-center">
                <label for="ctrl_mdp"class="col-sm-2 col-form-label">Mot de passe</label>
                <div class="col-sm-6">
                    <input name="ctrl_mdp" type="password" class="form-control" id="confirm_password" placeholder="Veuillez confirmer votre mot de passe">
                    <span id="alertCtrlmdp">&nbsp</span>
                </div>
            </div>

            <div class="form-group row justify-content-md-center">
                <div class="col-sm-2 col-form-label">
                </div>
                <div class="col-sm-6">
                    <input type="submit"  id="mc_signup_submit" value="Inscription" class="btn">   
                </div>
            </div>           
        </form>
    </div>
</div> 