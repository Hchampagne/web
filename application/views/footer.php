</div> <!-- fin de corp -->
</div> <!--fin de container  -->
<footer>

    <div class="row" id="hp">

        <div class='col-12 col-md-4' id="contact">
            <h5 style="color:#343538">Contact</h5>
            <hr>
            CORIF<br>
            145 rue des stations<br>
            59000 LILLE<br>
            Tél: 03 20 54 73 55<br>
            Mail: contact@corif.fr
        </div>
        <br>
        <div id="social" class='col-12 col-md-6 '>
            <h5 style="color:#343538">Social</h5>
            <hr>
            <div class="row">

                <div class="col-1  col-md-1">
                    <a href="" class="" title="Linkedin">
                        <img src="<?= base_url ("img/images/linkedin.png") ?>" alt="">
                    </a>
                </div>

                <div class="col-1  col-md-1">
                    <a href="" class="" title="Twitter">
                        <img src="<?= base_url ("img/images/twitter.png") ?>" alt="">
                    </a>
                </div>

                <div class="col-1  col-md-1">
                    <a href="" class="" title="Facebook">
                        <img src="<?= base_url ("img/images/facebook.png") ?>" alt="">
                    </a>
                </div>

                <div class="col-1  col-md-1">
                    <a href="#" class="" title="YouTube">
                        <img src="<?= base_url ("img/images/youtube.png") ?>" alt="">
                    </a>
                </div>

                <div class="col-1  col-md-1">
                    <a href="#" class="" title="Google">
                        <img src="<?= base_url ("img/images/google.png") ?>" alt="">
                    </a>
                </div>

            </div>
            <!--Fin row -->
        </div>
        <!--fin col -->

        <div class='col-12 col-md-4 ' id="news">
            <h5 style="color:#343538">Newsletter</h5>
            <hr>
            <form method="get" action="../../envoiMail.php" id="" name="">
                <input type="hidden" id="" name="" value="html" />
                <input type="hidden" name="" value="mc_submit_signup_form" />
                <input type="hidden" id="" name="" value="" />

                <label for="" class="">
                    Email
                    <span class="">
                        *
                    </span>
                </label>
                <br>
                <input type="email" size="18" placeholder="" name="" id="" class="form-control" />
                <br>
                <label for="" class="">
                    Votre nom
                    <span class="">
                        *
                    </span>
                </label>
                <br>
                <input type="text" size="18" placeholder="" name="" id="" class="form-control" />
                <br>
                <button type="submit" class="btn" value="S'inscrire" style="">S'inscrire </button>
                <br>
                <p></p>

        </div>
    </div>
    </div> <!-- fin row-hp -->

    <div class="" id="bp">
        <ul class="nav justify-content-center">
            <li id="" class="nav-item">
                <a class="nav-link" href="">
                    <span>
                        <strong>
                            Mentions légales
                        </strong>
                    </span>
                </a>
            </li>
            <li id="" class="nav-item">
                <a class="nav-link" href="<?= site_url("accueil/avantpropos") ?>">
                    <span>
                        <strong>
                            Avant propos
                        </strong>
                    </span>
                </a>
            </li>
            <li id="" class="nav-item">
                <a class="nav-link" href="">
                    <span>
                        <strong>
                            Contact
                        </strong>
                    </span>
                </a>
            </li>
        </ul>
    </div>
    <!--fin div bp -->

</footer>

<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="<?= base_url ("script/script.js") ?>"></script>

</body>

</html>