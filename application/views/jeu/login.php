<div>
    <h1>Login jeu</h1>
</div>

<div class="container corp">
    <div>
        <!-- <form action="" method="post"> -->
        <?= form_open('jeu/login', 'id="form_inscription"'); ?>

            <label for="">Email de connexion:</label>
            <input type="email" name="email" id="" class="form-control" placeholder="Email de connexion" require>

            <label for="">nom:</label>
            <input type="text" name="nom" id="" class="form-control" placeholder="Votre nom" require>
            <br>
            <button class="btn" type="submit">Valider</button>
            <br>

        </form>
    </div>
</div>