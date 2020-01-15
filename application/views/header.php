<body onload="startTime()" class=""> 
            <header id="">
               <div class="row">
                    <a href="http://www.corif.fr/" class=""><img src="<?= base_url("img/images/logo-b.jpg") ?>" alt="CORIF" class="img-fluid"/></a>
                </div>    <!-- fin de row img -->   
                
                <div class="row" id="menu">
                    
                    <h6>
                        <?php 
                            setlocale(LC_ALL, 'fr_FR.UTF8', 'fr_FR','fr','fr','fra','fr_FR@euro');
                            date_default_timezone_set('Europe/Paris');
                            $date= date('D d.m.Y');
                            $format =('D d.m.Y') ;
                            echo $this->datetofrench->dateToFrenche($date, $format);
                            
                        ?> 
                    </h6>

                    <nav class="navbar navbar-expand-lg " style="padding-left:20%">
                        <ul class="navbar-nav mr-auto" >

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <strong>Accueil</strong>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item"href="<?= site_url("accueil") ?>"><strong>Accueil</strong></a>
                                    <a class="dropdown-item"href="<?= site_url("accueil/remerciements") ?>"> <strong>Remerciement</strong> </a>
                                </div>

                                <?php if ($this->auth->is_logged() == TRUE){ ?>
                                <?php if ($this->auth->is_admin() == TRUE){ ?>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="" role="button" aria-haspopup="true" aria-expanded="true"><strong>Administration</strong></a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="<?= site_url("administration/adherent") ?>"><strong>Adherent</strong></a>
                                            <a class="dropdown-item" href="<?= site_url("administration/carte") ?>"><strong>Carte</strong></a>
                                            <a class="dropdown-item" href="<?= site_url("administration/dashboad") ?>"><strong>Tableau bord admin</strong></a>
                                        </div> <!-- Fin dropdown -->
                                    </li>
                                    <li>
                                        <a class="nav-link" href="<?= site_url("jeu/create_session") ?>"><strong>Creation d'une session</strong></a>
                                    </li>
                                    <?php }?>
                                    <li>
                                        <a class="nav-link" href="<?= site_url("jeu/dashboad") ?>"><strong>Tableau bord</strong></a>
                                    </li>
                    
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= site_url("connexion/deconnexion") ?>"><strong>Deconnexion (<?=$_SESSION['username']?>)</strong></a>
                                </li>
                                <?php }
                                else{ ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= site_url("connexion/login") ?>"><strong>Connexion</strong></a>
                                </li>
                                <?php }  ?>

                                </li>
                        </ul>
                    </nav>
                </div> <!-- fin de row -->
            </header>
            
      