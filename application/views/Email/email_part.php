<body style="background-color:#343538; color:#FFFFFF">
        <header>
                <a href="http://www.corif.fr/" class=""><img src="http://www.corif.fr/wp-content/uploads/2015/09/header_corif_001.jpg" alt="CORIF" class="img-fluid" style="widht:100%"/></a>
                <div> <h1 style="color:#F18F1F; background-color: #343538; text-align: center;"> Des métiers, des vies</h1></div>
            </header>
            <hr>
            <div style="background-color:#FFFFFF; color:#343538;">
            <h2 style="text-align:center; ">Demande d'inscription</h2>
            <p style="margin-left:2rem">Bonjour,</p>
            <br><br>
            <p style="margin-left:2rem"> Vous venez d'etre inscrit sur une session "Des métiers, des vies" par le Corif. 
                 <br><br>
                 Rendez-vous le:
                               <?= $participant->date_session ?> à <?= $participant->heure_debut ?>
                                sur le site <a class="nav-link" href="<?= site_url("jeu/login") ?>"><strong>Connection</strong></a>
                    
                 <br><br>
                 Cordialement,
            </p>
            </div>
            <footer style="background-color:#F18F1F">
            <p style="text-align: right; margin-right:2rem; ">
            La Driection
            </P>
            </footer>
</body>
</html>



     
        
