Drop database corif;
Create database corif;
use corif;

CREATE TABLE metier (
	id INT(3) NOT NULL AUTO_INCREMENT PRIMARY key,
	metier VARCHAR(50) NOT NULL,
	prenom VARCHAR(50) NOT NULL,
	age INT(3) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

Create table carte (
	id INT(3) NOT NULL AUTO_INCREMENT PRIMARY key,
	id_metier INT(3) NOT NULL,
	numero VARCHAR(50) NOT NULL,
	description text NOT NULL,
	type VARCHAR(10) NOT NULL,
foreign key (id_metier) references metier(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

Create table adherent (
	id INT(3) auto_increment  NOT NULL PRIMARY KEY,
	nom VARCHAR(50)   NOT NULL,
	prenom VARCHAR(50)   NOT NULL,
	email VARCHAR(150)   NOT NULL,
	organisme VARCHAR(50)   NOT NULL,
	role VARCHAR(15) NOT NULL,
	password VARCHAR(255) NOT NULL,
	validation INT(2) NOT NULL,
	date_inscription date,
	date_connexion datetime,
	key VARCHAR(50), 

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE session (
  id int(11) auto_increment NOT NULL PRIMARY KEY,
  id_formateur int(11) NOT NULL,
  date_session date NOT NULL,
  heure_debut time NOT NULL,
  heure_fin time NOT NULL,
  foreign key (id_formateur) references adherent(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE invite (
  id int(11) auto_increment NOT NULL PRIMARY KEY,
  id_session int(11) NOT NULL,
  nom varchar(50) NOT NULL,
  prenom varchar(50) NOT NULL,
  email varchar(50) NOT NULL,
  foreign key (id_session) references session(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE contient (
	id_session	INTEGER NOT NULL,
	id_metier	INTEGER NOT NULL,
	PRIMARY KEY(id_session,id_metier),
	FOREIGN KEY (id_session) references session(id),
	FOREIGN KEY (id_metier) references metier(id)
);


use corif;

DELETE FROM metier;

INSERT INTO metier (metier, prenom, age)
 VALUES
 ('Aide à domicile', 'Nadège', 43),
 ('Aide soignant(e) en gériatrie', 'David', 27),
 ('Carrosier(ière)', 'Marie', 31),
 ('Coiffeur(euse)', 'Olivier', 38),
 ('Conducteur(trice) de bus', 'Mélanie', 24),
 ('Conducteur(trice) de la machine de finition', 'Zakia', 33),
 ('Hote(esse) de caisse', 'Jean Luc', 45),
 ('Economiste de la construction / Mettreur(euse)', 'Anne Marie', 45),
 ('Menuisier(ère)', 'Samuel', 24),
 ('Opérateur(trice) sur machine', 'Sylvie', 33),
 ('Préparateur(trice) de commande', 'Patricia', 40),
 ('Responsable de rayon', 'Delphine', 26),
 ('Restaurateur(trice)', 'Smaïl', 39),
 ('Secrétaire', 'Yasmina', 48),
 ('Tourneur(euse)', 'Audrey', 22);

DELETE FROM adherent;
INSERT INTO adherent (nom, prenom, email, organisme, role, password, validation)
 VALUES
('Delicque', 'Jeremy', 'Jeremy@delicque.fr', 'Afpa', 'Administrateur', 'jdelicque', '$2y$10$AiVPNjz2GX9HhXQviC5YyONerxtajJ4gKTQb1N4eWcwZZOIzT/0Ie', 1);

DELETE FROM carte;
INSERT INTO carte (id_metier, numero, description, type)
 VALUES
(1, 'P 387', 'Dans mon travail, je m''occupe de différentes personnes jeunes ou adultes, malades ou valides.', 'metier'),
(1, 'P 384', 'Je prends en charge toute seule les activités et les tâches quotidiennes des personnes dont je m''occupe, de cette manière elles peuvent rester dans leur logement et leur environnement familier.', 'metier'),
(1, 'P 380', 'Chez les personnes ou chez les familles auprès desquels j''interviens, je repasse, je fais le ménage et la vaisselle, je prépare le repas et je fais parfois les courses. Je fais les toilettes également.', 'metier'),
(1, 'P 375', 'Chaque particulier à ses exigences et je dois suivre leurs consignes. Mes interventions varient en fonction des personnes. Pour certains je passe l''aspirateur et je fais les poussières. Pour d''autres je repasse et je fais les vitres. Ça dépend aussi de ma semaine. J''organise mon temps et mon travail.', 'metier'),
(1, 'P 369', 'Quand je m''occupe d''une personne qui séjourne dans une résidence, je prends le linge pour le laver chez moi.', 'metier'),
(1, 'P 362', 'J''effectue pour certaines personnes des tâches administratives. Dès fois, elles peuvent venir avec moi si elles le désirent. Ça leur permet de sortir un peu de leur domicile.', 'metier'),
(1, 'P 355', 'Pour les personnes âgées, je prépare tous les matins le petit déjeuner même le samedi matin. Mais le dimanche, je suis en repos. Je l''ai demandé.', 'metier'),
(1, 'P 348', 'Je travaille 25h, c''est un choix. Alors qu''au départ je travaillais à temps plein je faisais 40h.', 'metier'),
(1, 'P 341', 'Mes interventions sont courtes, elles ne durent pas plus de 2 heures à 2 heures 30. Mais je travaille essentiellement dans mon quartier aussi je peux rentrer chez moi de temps en temps pour accompagner ma fille à l''école.', 'metier'),
(1, 'P 334', 'Mon employeur me donne un planning avec mes horaires pour toute la semaine. Je peux faire des heures en plus lorsque la personne a besoin de moi et me le demande.', 'metier'),
(1, 'P 327', 'J''ai toujours voulu être utile et aider les autres ; m''occuper des autres était un intérêt pour moi.', 'metier'),
(1, 'P 320', 'Mon travail me demande d''être très dynamique et de me déplacer tous les jours. J''effectue de nombreux déplacements mais ça fait parti de mon emploi. Mes déplacements sont compris dans les heures de travail.', 'metier'),
(1, 'P 313', 'Je rencontre souvent des personnes seules qui n''ont pas trop de contact avec l''extérieur. Quand j''arrive, je discute beaucoup. On échange nos idées, on parle de tout et de rien. Elles me racontent leur vie.', 'metier'),
(1, 'P 306', 'Certains m''offrent le caf » et des cadeaux pour les fêtes. D''autres me donnent leurs clés pour que je puisse aller chez eux sans qu''ils soient présents.', 'metier'),
(1, 'P 299', 'Mon metier me demande d''être présente, d''écouter et d''établir une relation de confiance. C''est pour cela que certains me donnent leurs clés.', 'metier'),
(1, 'P 292', 'En cas d''hospitalisation, je leur rends visite à l''hôpital. Et même lorsque je ne travaille pas chez eux ils veulent me rémunérer quand même, je n''accepte pas.', 'metier'),
(1, 'P 285', 'Maintenant, je connais toutes les personnes chez qui je vais. Au bout de plusieurs années, on installe une relation de confiance.', 'metier'),
(1, 'P 278', 'Mon metier n''est pas facile tous les jours. J''ai déjà vu des décès, il faut savoir prendre du recul et avoir un bon équilibre.', 'metier'),
(1, 'P 271', 'Je créé des liens dans mon travail et je me sens utile. Quand je suis malade, ils prennent de mes nouvelles.', 'metier'),
(1, 'P 264', 'Je suis toujours sur la route, je conduis mes enfants à leurs loisirs et leurs activités sportives.', 'metier'),
(1, 'P 257', 'J''aime rentrer chez moi et lire même si je dors rapidement. En dehors de la lecture, je passe tout mon temps à m''occuper de mes enfants.', 'metier'),
(2, 'P 245', 'Je m''occupe, en collaboration avec des infirmières, de personnes atteintes de la maladie de Parkinson, d''Alzheimer, démentes ou souffrant de troubles psychiatriques. Je travaille dans cette structure depuis un an , je suis en CDI.', 'metier'),
(2, 'P 240', 'Le matin, je commence le travail à 7h30. J''arrive, je me change, c''est obligatoire, je mets une blouse blanche stérile, des chaussures blanches.', 'metier'),
(2, 'P 234', 'Je pratique des toilettes complètes au lit, mais aussi j''aide les personnes à la toilette, à l''habillage et au déshabillage.', 'metier'),
(2, 'P 226', 'Trois ou quatre fois par jour, je fais des soins de nursing : le change.', 'metier'),
(2, 'P 218', 'Je distribue les repas. Soit je donne les plateaux à ceux qui se débrouillent seul, soit j''aide les personnes à s''alimenter. Le plus souvent je m''occupe des personnes qui ont des sondes gastriques.', 'metier'),
(2, 'P 207', 'Pour les repas principaux, mes collègues et moi descendons les personnes qui le peuvent  en salle de restaurant.', 'metier'),
(2, 'P 196', 'Je fais les soins des cheveux au lit, pour laver la tête je pose un évier en plastique gonflable et j''installe la personne. Quelque fois je fais des brushings.', 'metier'),
(2, 'P 184', 'Pour le confort de la personne, je propose aussi des massages : les pieds, les jambes, les mains.', 'metier'),
(2, 'P 171', 'Je prépare les médicaments, je dois noter le jour et l''heure de la prise des médicaments. Je le distribue avec les infirmiers.', 'metier'),
(2, 'P 158', 'Je traite les escarres. Je vérifie si les personnes sont bien hydratées, je surveille les perfusions, je peux également brancher l''oxygène si nécessaire.', 'metier'),
(2, 'P 145', 'Chaque jour, je change les draps, les serviettes… ; je débarrasse les chambres du linge sale et je le trie dans différents sacs.', 'metier'),
(2, 'P 132', 'J''anime des ateliers l''après-midi pendant le goûter. On met un peu d''ambiance avec de la musique, on fait danser et chanter les résidents. On propose également des ateliers pour entretenir la capacité de mémorisation.', 'metier'),
(2, 'P 119', 'Régulièrement on se réunit tous. Chaque jour il y a les transmissions : on échange sur tout ce qui s''est passé la nuit ou la journée. Je signale s''il y a eu des chutes des accidents, des problèmes avec les familles.', 'metier'),
(2, 'P 106', 'Une fois par mois je participe à des réunions avec un psychologue, cela me permet de discuter de ce que je ressens, de partager les moments difficiles. J''au aussi des formations comme par exemple sur la maltraitance.', 'metier'),
(2, 'P 093', 'Le soir, je fais la vaisselle, ensuite je fais le nettoyage, je désinfecte les locaux (tables, salle et chaises) de notre étage avec des produits spécifiques.', 'metier'),
(2, 'P 080', 'La nuit, je surveille sur mon étage, je passe dans les chambres pour vérifier si tout va bien, je m''arrête de temps en temps pour réconforter certaines personnes lorsque je vois que ça ne va pas parce qu''elles ont peur.', 'metier'),
(2, 'P 067', 'La chose un peu plus difficile à mon travail c''est l''accompagnement de fin de vie avec la famille, préparer la séparation.', 'metier'),
(2, 'P 054', 'Je fais les soins de conservation des personnes décédées. La toilette mortuaire consiste en une toilette normale après quoi je les habille des plus beaux vêtements qu''ils ont. Je mets les dents, je ferme les yeux et la bouche ', 'metier'),
(2, 'P 041', 'Depuis un an et demi je fais des interventions auprès des stagiaires en définition de projet. Nous montons un projet d''animation : un spectacle chantant et dansant avec un goûter.', 'metier'),
(2, 'P 028', 'Nous sommes tenus au secret professionnel. Ça n''est pas évident quand je travaille avec des stagiaires de leur dire ce qu''ils doivent savoir pour faire correctement leur travail mais pas plus pour respecter la confidentialité des dossiers.', 'metier'),
(2, 'P 015', 'J''aimerai bien avoir plus de reconnaissance quelque part. Bon vis-à-vis de mes chefs, j''en ai. Mais vis-à-vis des familles…Moi je me suis déjà pris des claques dans la figure.', 'metier'),
(2, 'P 002', 'Ce que j''aime le plus c''est le contact. Dans ce metier, il faut être bien physiquement et mentalement.', 'metier'),
(3, 'P 009', 'Je répare les ailes, les longerons, les portières, les capots. Tout sauf ce qui est moteur et électricité. On change également les éléments vitrés quand ils ne sont pas collés.', 'metier'),
(3, 'P 022', 'Pour réparer les pièces en fibre fissurées je perce un trou pour arrêter la fissure et ensuite je la colmate. C''est délicat, il faut faire très attention de ne pas les casser plus.', 'metier'),
(3, 'P 035', 'Je ne touche pas l''électricité mais il m''arrive de changer des ampoules. Quand je remonte des éléments électriques je fais les branchements nécessaires à leur bon fonctionnement.', 'metier'),
(3, 'P 048', 'Pour remplacer les éléments endommagés, d''abord je les dégarnis puis je démonte tout ce qu''il est possible de démonter en faisant attention de ne rien perdre même pas une vis ou un boulon. Je regarde aussi comment toutes les pièces sont montées.', 'metier'),
(3, 'P 061', 'S''il faut remplacer un élément, on en choisit un nu et on remonte les accessoires qu''on a démontés sur celui abîmé.', 'metier'),
(3, 'P 074', 'Je redresse la tôle froissée ou bosselée je fais attention de pas mettre trop de mastic car ça coûte cher et le ponçage est très long.', 'metier'),
(3, 'P 087', 'Je redonne à la tôle sa forme initiale, je la frappe avec le burin. J''utilise aussi le chalumeau pour qu''elle se tende à la chaleur. Avec une cuiller je reforme les arêtes et tous les mouvements qui font l''esthétique de la pièce.', 'metier'),
(3, 'P 100', 'Pour découper certains éléments, je meule. Je porte alors mes gants pour me protéger les mains et des lunettes pour ne pas recevoir de projection dans les yeux.', 'metier'),
(3, 'P 113', 'Il m''arrive fréquemment de souder. Par exemple quand le plancher est pourri je découpe les endroits les plus endommagés et je soude les pièces. Je travaille alors allongée par terre.', 'metier'),
(3, 'P 126', 'Quand une pièce est réparée et remontée, alors il faut poncer. Quand on ponce toute une journée, la poussière est partout dans le nez, les cheveux, la toile bleue ne l''arrête  pas.', 'metier'),
(3, 'P 223', 'Je passe le jet, l''aspirateur, je lave les carreaux. Quand on sort le véhicule, il est propre à l''intérieur comme à l''extérieur.Je prépare la pièce ou le véhicule entièrement jusque l''apprêt, puis je fais le camouflage.', 'metier'),
(3, 'P 152', 'Si on met la peinture à la bombe alors je peux le faire moi-même. Sinon c''est le peintre. Quelque fois je prépare avec lui la base et la couleur. Il fait ses mélanges par ordinateur, et nous pesons tous les produits de la composition.', 'metier'),
(3, 'P 165', 'Il faut porter un masque pour ne pas être intoxiqué par certains produits.', 'metier'),
(3, 'P 178', 'Il faut de la force quelque fois et notamment pour actionner la pompe manuelle que j''utilise pour tirer à la flèche un véhicule écrasé.', 'metier'),
(3, 'P 191', 'Je trie et je range toutes les pièces avant d''entamer un autre boulot. On récupère pas mal de choses, ça fait toujours plaisir à quelqu''un une pièce d''occasion.', 'metier'),
(3, 'P 202', 'Je rencontre les représentants, ils informent des nouveaux produits. Je choisis mes produits ou mes pièces à commander suivant ce dont j''ai besoin mais c''est le chef qui prend la décision.', 'metier'),
(3, 'P 223', 'Je passe le jet, l''aspirateur, je lave les carreaux. Quand on sort le véhicule, il est propre à l''intérieur comme à l''extérieur.', 'metier'),
(3, 'P 231', 'L''hiver il fait froid et ce n''est  pas facile de travailler avec les mains gelées.', 'metier'),
(3, 'P 238', 'Dans une grande concession, chacun sa place, mais ici le chef donne le travail quel qu''il soit à celui qui est libre pour le faire. C''est varié.', 'metier'),
(3, 'P 244', 'Je travaille 7 heures par jour ;  quelque fois plus pour terminer à temps et satisfaire le client. Le soir, j''aime m''occuper de mes chiens.', 'metier'),
(3, 'P 213', 'Tout ce qui est paperasserie c est le chef. Je n''aimerai pas être chef. Enfin pas tout de suite.', 'metier'),
(1, 'B 718', 'J''ai le niveau BEP sténo-dactylo. J''ai toujours voulu être derrière un bureau et devenir secrétaire enfin sténodactylo.','parcours'),
(1, 'B 712', 'J ai tout de suite travaillé dans une entreprise de transport. Mon père connaissait une personne dans cette entreprise puisqu il ne travaillait pas loin de cette entreprise.','parcours'),
(1, 'B 698', 'Mon contrat a démarré pendant les vacances d''été. J''ai occupé le poste de sténodactylo dans cette entreprise de transport.','parcours'),
(1, 'B 706', 'C''était un metier varié ou je pouvais rencontrer beaucoup de monde surtout dans le transport. Je répondais au téléphone, je dirigeais les communications téléphoniques, je prenais en sténo enfin tout comme une secrétaire.','parcours'),
(1, 'B 688', 'J''ai travaillé pendant 6 mois. J''ai signé contrat sur contrat pendant cette période. Je savais que je n''allais pas signer de CDI. J''ai eu mon premier enfant.','parcours'),
(1, 'B 676', 'Ma mère travaillait chez une dame, elle lui faisait le ménage et ma mère lui a parlé de moi que je recherchais un emploi.','parcours'),
(1, 'B 664', 'Cette dame m''a proposé de postuler chez un comptable agréer. Il recherchait quelqu''un. J''ai donc postulé et j''ai signé un CDI entant qu''opératrice de saisie. J''ai tout appris sur le tas après une semaine d''essai, j''ai pu continuer.','parcours'),
(1, 'B 638', 'J''ai travaillé dans cette entreprise pendant 17ans j''ai pris 3 ans de congé parental.','parcours'),
(1, 'B 651', 'Mon rôle était de saisir toutes les données comptables sur ordinateur. J''aimais ce travail, il était varié et j''avais des responsabilités. J''ai appris plein de choses. Avec mes collègues je m''entendais très bien.','parcours'),
(1, 'B 625', 'Il faut être rapide. La rapidité on l''avait avec l''habitude. On me demandait dès fois de me déplacer chez les clients pour compléter les documents.','parcours'),
(1, 'B 612', 'Puis j''ai été licenciée. Mon employeur m''a annoncé quelques mois après mon retour de congé parental qu''il n''avait plus les moyens financiers pour me garder.','parcours'),
(1, 'B 586', 'J''ai été très déçue et anéantie. J''ai dons dû m''inscrire comme tout le monde à l''ANPE. J''ai eu du mal à vouloir retravailler.','parcours'),
(1, 'B 599', 'Je suis restée 3 ans au chômage. Et pendant cette période, j''ai cherché un poste d''opératrice de saisie mais je n''ai jamais trouvé. Je pensais garder contact avec mes collègues. Je n''ai jamais eu de nouvelles. J''ai été très déçue.','parcours'),
(1, 'B 573', 'J''ai eu des entretiens mais sans aucun résultat, je me suis aperçue que tout avait changé et je ne maîtrisé pas la bureautique.','parcours'),
(1, 'B 560', 'Je ne voulais plus exercer ce metier, je voulais changer et être utile. Je voulais m''occuper des personnes âgées. Je me suis donc adressée à la mairie de mon quartier pour récolter les renseignements nécessaires et j''ai trouvé mon emploi.','parcours'),
(1, 'B 547', 'Je travaille dans ce metier depuis 4 ans et aujourd''hui j''ai décidé de reprendre des cours en bureautique.','parcours'),
(1, 'B 534', 'Depuis quelques mois j''ai repris des cours en bureautique dans un centre de formation. Je me suis arrangée avec les formateurs pour pouvoir suivre les cours en travaillant. ','parcours'),
(1, 'B 521', 'L''ordinateur est toujours utile pour le travail mais aussi pour tous les jours. C''est indispensable de connaître Internet de nos jours.','parcours'),
(2, 'B 551', 'J''ai eu une enfance très difficile avec une mère pas très cool et un beau père pas très cool non plus. Il y avait beaucoup de violences.','parcours'),
(2, 'B 524', 'J''étais un peu perdu, je fuguais. Au début au collège cela se passait bien et puis tous les problèmes…j''ai laissé tomber. J''ai arrêté le collège en quatrième.','parcours'),
(2, 'B 550', 'Je devais avoir 15-16 ans. Je voulais travailler dans la restauration. J''ai fait un contrat d''apprentissage mais quand j''ai été dedans ça ne m''a pas plu du tout.','parcours'),
(2, 'B 537', 'Je faisais 40 à 45 heures par semaines. J''étais un peu exploité…J''ai arrêté mon contrat d''apprentissage. Je suis resté dans la galère quelque mois.','parcours'),
(2, 'B 563', 'Alors j''ai fait une formation, une sorte de définition de projet. Je voulais avoir du contact humain, aussi je voulais être fleuriste soit travailler dans la vente. J''ai fait plusieurs stages dans la vente, et je me suis aperçu que le contact humain ce n''était pas trop ça non plus. C''était plutôt "bonjour Mme, je peux vous aider"…Fleuriste ça me plaisait bien, mais j''ai eu quelques petits problèmes avec le patron, je ne vais pas trop détailler là-dessus. Et après j''ai arrêté la formation.','parcours'),
(2, 'B 576', 'Après re-galère. Je ne faisais rien, je traînais, je sortais avec mes amis, j''en profitais encore un petit peu. A cette époque là je vivais chez  mes parents, ma mère m''a forcé un peu. "retourne en restauration, tu es fait pour ça". Alors pour lui faire plaisir comme elle me prenait la tête, j''ai envoyé des courriers j''ai trouvé un CDD de deux mois.','parcours'),
(2, 'B 602', 'Après je suis parti à Paris. La folle vie parisienne je travaillais sur deux emplois. La vente et la restauration, je ne savais faire que ça et en fin de compte j''au eu un mi-temps en prêt à porter, l''autre dans un café. C''était un petit peu trop lourd.','parcours'),
(2, 'B 589', 'Je suis revenu sur Lille. Il fallait que je me débrouille tout seul. J''ai été saisonnier aussi sur la côte d''Opale, serveur en salle c''était des fruits de mer.','parcours'),
(2, 'B 615', 'Après être tombé gravement malade, je suis retourné à la Mission Locale, mon correspondant m''a trouvé une formation : une DIP (définition à l''insertion professionnelle)','parcours'),
(2, 'B 628', 'La formation s''est très bien passée, j''ai fait des stages en maison de retraite qui se sont bien passés.','parcours'),
(2, 'B 641', 'Une formation d''auxiliaire allait débuter, je me suis dit que je n''allais pas réussir comme d''habitude, j''avais beaucoup de problèmes en français. Mais j''ai été accepté pour une formation d''auxiliaire de gérontologie.','parcours'),
(2, 'B 666', 'J''avais un contrat d''un an et j''étais considéré comme aide-soignant, et j''avais 35 résidents à ma charge. Il y a eu démission du directeur, la nouvelle directrice est arrivée et au bout d''un an, elle a dit stop, votre contrat n''est pas renouvelé.','parcours'),
(2, 'B 654', 'Mais je me suis refait, j''ai attendu deux mois pour me reposer, mais pendant mon repos j''ai démarché plusieurs maisons de retraite, et j''ai postulé.','parcours'),
(2, 'B 678', 'Au début c''était un CDD d''un mois et après elle m''a embauché tout de suite en disant : Vous le méritez, j''ai pensé à vous, on vous embauche tout de suite.','parcours'),
(2, 'B 690', 'Je suis toujours intervenant en définition de projet professionnel. Je le fais en bénévolat.','parcours'),
(2, 'B 700', 'J''ai envie encore d''évoluer un petit peu plus. Je serais capable de reprendre des cours, passer un D.A.E.U, retourner à la Fac, rentrer à l''école d''infirmier(es).','parcours'),
(2, 'B 707', 'Je fais du shoping, je vais au cinéma de temps en temps, et puis des balades.','parcours'),
(2, 'B 713', 'Je passe des soirées entre amis. Je vais voir ma sœur parce que j''ai plus qu''elle pour l''instant. Et puis je vais dans ma belle famille quand ils font des fêtes, des repas de famille.','parcours'),
(3, 'B 684', 'Mon père était mécanicien poids lourd. J''ai un frère, il est boucher','parcours'),
(3, 'B 672', 'Mon père est content de ce que je fais. C''est  moi qui lui donnais un coup de main.','parcours'),
(3, 'B 647', 'En troisième je voulais faire un CAP, ils m''ont mis en classe de rattrapage. En fait je voulais aller travailler pour aider mes parents. Comme je n''ai pas trouvé d''emploi, je ne suis rentrée qu''en octobre.','parcours'),
(3, 'B 660', 'Je ne suis pas restée longtemps, j''ai trouvé rapidement un travail à la municipalité. J''ai soigné les personnes âgées pendant deux ans. Et puis je ne voulais plus j''avais plus le cœur. ','parcours'),
(3, 'B 634', 'Alors j''ai été porteur dans les champs ; les femmes plus âgées ramassaient, moi je portais la récolte. Le midi je travaillais à la friterie.','parcours'),
(3, 'B 621', 'J''ai aussi été employée comme agent de production sur ligne semi-automatique, ils m''ont formée sur le tas.','parcours'),
(3, 'B 595', 'A près j''ai fait la formation de carrossier/carrossière. Là en formation je n''ai pas eu de problème mais en stage en entreprise…Au début cela ne s''est pas bien passé, les gars me disaient, « vas faire ta vaisselle ». Je rentrais à la maison je pleurais.','parcours'),
(3, 'B 608', 'J''ai joué à quitte ou double. J''ai montré mon caractère, je ne me suis pas laissée faire. Je suis allée jusqu''au bout du stage. J''ai validé ma formation, je suis sortie 3ème de promo.','parcours'),
(3, 'B 582', 'Néanmoins après je n''arrivais pas à trouver d''emploi. Ils ne veulent pas de femmes.','parcours'),
(3, 'B 569', 'J''ai fait un stage en agent de sécurité incendie. J''aime aider les gens. J''ai mon ERP1.','parcours'),
(3, 'B 543', 'Un jour mon beau frère a été embauché ici comme mécanicien et le patron lui a dit j''ai besoin d''un carrossier vous ne connaissez personne. Il a dit si je connais quelqu''un mais c''est une carrossière.','parcours'),
(3, 'B 556', 'J''aime bien mon travail. En formation on n''apprend pas tout alors j''apprends encore, je demande conseils aux collègues. Ils me montrent et puis j''essaye.','parcours'),
(3, 'B 530', 'Cela fait de longues journées, le garage est loin de notre habitation. Le soir quand je rentre, pour nous les femmes, la journée n''est pas finie mais je suis tellement contente de ne plus être au RMI.','parcours'),
(3, 'B 517', 'C''est un travail d''avenir, je n''espère pas les accidents pour personne mais des tôles froissées y''en a toujours. Mécanicien c''est pas pareil avec l''électronique aujourd''hui.','parcours');