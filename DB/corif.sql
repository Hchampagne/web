/* Drop database corif;*/
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
foreign key (id_metiers) references metier(id)
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
	date_connexion datetime

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


