/*--- Base de Donnée --- */

DROP DATABASE IF EXISTS InscriptionConnexion;

CREATE DATABASE InscriptionConnexion;
USE InscriptionConnexion;


DROP TABLE IF EXISTS inscrits;
CREATE TABLE inscrits
(
	id int NOT NULL auto_increment,
	nom varchar(50),
	prenom varchar(50),
	dateNaiss DATE,
	sexe char,
	mail varchar(50),
	numero int ZEROFILL,
	pass varchar(50) NOT NULL,
	dateYMDheure datetime NOT NULL, #format: 'YYYY-MM-DD HH:MM:SS'
	
	PRIMARY KEY (id)
);

	
	
	
	
	
	
	
	
	
	
	
	
	


