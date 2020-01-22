<body>
    <header id="">
        <div class="">
            <a href="http://www.corif.fr/">
                <img src="<?= base_url("img/images/logo-b.jpg") ?>" alt="CORIF" class="img-fluid"></a>
        </div> <!-- fin de row img -->
        <div class="container-fluid" id="menu">
            <nav class="navbar navbar-expand-lg " style="padding-left:25%">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <!-- affiche accueil - menu au démarrage -->
                        <a class="nav-link" id="accueil" href="<?= site_url("accueil") ?>">ACCUEIL</a>

                    </li>
                    <!-- debut test si une personne connecté -->
                    <?php if ($this->auth->is_logged() != TRUE) { ?>
                        <!-- test si pas de connexion  -->
                        <!-- affiche connexion <=> pas de connexion exist - menu au démarrage -->
                        <li class="nav-item">
                            <a class="nav-link" href="#connexionModal" data-toggle="modal" data-target="#connexionModal">CONNEXION</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url("jeu/login") ?>">ESPACE JEU</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url("accueil/animation") ?>">REGLES</a>
                        </li>
                        <li class="nav-item dropdown">
                            <!-- affiche du menu admin-->
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="" role="button" aria-haspopup="true" aria-expanded="true">INFORMATIONS</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?= site_url("accueil/avantpropos") ?>">Avant propos</a>
                                <a class="dropdown-item" href="<?= site_url("accueil/remerciements") ?>">Remerciements</a>
                            </div>
                        </li>

                    <?php } else { ?>
                        <!-- il y a une connexion existante -->
                        <!-- debut test administrateur -->
                        <?php if ($_SESSION["role"] == "administrateur") { ?>
                            <!-- test role pour affichage menu navigation-->
                            <!-- test si admin -->
                            <li class="nav-item dropdown">
                                <!-- affiche du menu admin-->
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="" role="button" aria-haspopup="true" aria-expanded="true">ADMINISTRATION</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?= site_url("administration/adherent") ?>">Adheren</a>
                                    <a class="dropdown-item" href="<?= site_url("administration/carte") ?>">Carte</a>
                                    <a class="dropdown-item" href="<?= site_url("administration/dashboad") ?>">Tableau bord admin</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= site_url("connexion/deconnexion") ?>">DECONNEXION</a>
                            </li>
                        <?php }  ?>
                        <!-- fin test admin-->
                        <!-- debut test adhérent-->
                        <?php if ($_SESSION["role"] == "formateur") { ?>
                            <!-- affiche menu adherent -->
                            <li>
                                <a class="nav-link" href="<?= site_url("jeu/dashboad") ?>">GESTION</a>
                            </li>
                            <li>
                                <a class="nav-link" href="<?= site_url("jeu/create_session") ?>">SESSION</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= site_url("connexion/deconnexion") ?>">DECONNEXION</a>
                            </li>
                        <?php } ?>
                        <!-- fin test adhérent-->
                        <!-- debut test invite-->
                        <?php if ($_SESSION["role"] == "invite") { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= site_url("connexion/deconnexion") ?>">DECONNEXION </a>
                            </li>
                            <li class="nav-item">
                                <!-- affiche connexion <=> pas de connexion exist - menu au démarrage -->
                                <a class="nav-link" href="<?= site_url("accueil/animation") ?>">REGLES</a>
                            </li>
                        <?php }  ?>
                        <!-- fin test invite -->
                    <?php }  ?>
                    <!-- fin test logged-->
                </ul>
                <!-- affiche de la personne connecté -->
                <span id="afLogin"> <?= isset($_SESSION['role']) ? $_SESSION["role"] . " : " . $_SESSION['nom'] . " " . $_SESSION['prenom'] : "" ?></span>

            </nav>
        </div>
    </header>