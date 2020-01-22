<!-- Modal -->
<div class="modal fade" id="jeuModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">
          Connexion espace de jeu
        </h4>
      </div>

      <div class="modal-body">

        <?= form_open('connexion/login', 'id="form_login _jeu"'); ?>

        <div class="form-group row justify-content-md-center">
          <label for="nom" class="col-sm-3 col-form-label">Nom</label>
          <div class="col-sm-7">
            <input type="text" name="nom" id="log_login" class="form-control" value="<?php echo set_value('login') ?>" placeholder="Votre nom">
            <span id=alertLogin>&nbsp<?= form_error('login', '<span>', '</span>') ?></span>
          </div>
        </div>

        <div class="form-group row justify-content-md-center">
          <label for="mail" class="col-sm-3 col-form-label">Email</label>
          <div class="col-sm-7">
            <input name="mail" type="mail" class="form-control" id="log_mdp" value="<?php echo set_value('mdp') ?>" placeholder="Votre email">
            <span id="alertMdp">&nbsp<?= form_error('mdp', '<span>', '</span>') ?></span>
          </div>
        </div>

        <div class="form-group row justify-content-md-center">
          <div class="col-sm-3 col-form-label">
          </div>
          <div class="col-sm-7">
            <input type="submit" id="login_submit" value="login" class="btn">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
          </div>
        </div>

        </form>
      </div>

    </div>

  </div>
</div>