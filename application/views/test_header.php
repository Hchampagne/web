        <body>
            <header>
               <div class="row">
                    <a href="http://www.corif.fr/" class=""><img src="<?= base_url("img/images/logo-b.jpg") ?>" alt="CORIF" class="img-fluid"/></a>
                </div>    <!-- fin de row img -->   
                
                <div class="row" id="menu">
                    <

                    <nav class="navbar navbar-expand-lg " style="padding-left:20%">
                        <ul class="navbar-nav mr-auto" >

                            <li class="nav-item ">                               
                                <a class="nav-link"href="<?= site_url("accueil") ?>">ACCUEIL</a>                                                               
                            </li>

                            <?php if ($this->auth->is_logged() == TRUE){ ?>

                            <li class="nav-item">
                                <a class="nav-link" href="#connexionModal" ><strong data-toggle="modal" data-target="#connexionModal">Connexion</strong></a>
                            </li>
                            <?= } ?>   
                        </ul>
                    </nav>
                </div> <!-- fin de row -->
            </header>
        <div class="container-fluid">
            <div class="corp"> 