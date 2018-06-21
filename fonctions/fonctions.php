<?php
/* Permet de savoir si on a entrer un numéro de téléphone ou un email */
function testNumeroOuMail($NumeroMail)
{
	if(ctype_digit($NumeroMail))
	{	return "numero"; }
	else
	{	return "mail";	 }
}

/* Fonction permettant de vérifier si le Numéro/Mail existe déjà ou non 
 * Si oui, on ne le re-créer pas
 * Si non, on créer le nouveau compte */
function testNumeroMail($NumeroMail, $typeLogin)
{
	include("fonctions/connexionBDD.php");
		$requete = 'SELECT prenom,nom,"'.$typeLogin.'" FROM inscrits WHERE "'.$typeLogin.'"="'.$NumeroMail.'"; ';

		$reponse = $bdd->query($requete);
		$donnees = $reponse->fetch();
		
		if($NumeroMail == $donnees["'.$typeLogin.'"])
		{	return 1;	}
		else
		{	return 0;	}
	
	$reponse->closeCursor(); // Termine le traitement de la requête
	include("fonctions/deconnexionBDD.php");
}

/* Permet de vérifier si la personne possède déjà un compte avec les informations minimum necessaire 
 * qui sont : "prenom", "nom", et "mail ou numero" */
function verifInscription($prenom, $nom, $NumeroMail, $typeLogin)
{
	include("fonctions/connexionBDD.php");
	$requete = 'SELECT prenom,nom,'.$typeLogin.' FROM inscrits WHERE prenom="'.$prenom.'"; ';
	$reponse = $bdd->query($requete);
	$donnees = $reponse->fetch();

	if($prenom == $donnees['prenom'] && $nom == $donnees['nom'] && $NumeroMail == $donnees["$typeLogin"])
	{	return 1;	}
	else
	{	return 0;	}

	$reponse->closeCursor(); // Termine le traitement de la requête
	include("fonctions/deconnexionBDD.php");
}

/* Permet d'ajouter les nouveaux inscrits dans la base de données */ 
function sinscrire($prenom, $nom, $sexe, $NumeroMail, $pwd, $dateDeNaissance, $typeLogin)
{
	include("fonctions/connexionBDD.php");
	$requete = "INSERT INTO inscrits(nom, prenom, dateNaiss, sexe, $typeLogin, pass, dateYMDheure) VALUES(?,?,?,?,?,?,NOW())"; 
	$req_prepare = $bdd->prepare($requete);

	try
	{
		$req_prepare->execute(array($nom, $prenom, $dateDeNaissance, $sexe, $NumeroMail, $pwd));
		echo "<p id='reponseBtn'> Inscription réussi ! </p>";
	}
	catch (Exception $e) 
	{
		echo 'Une exception a été lancée. Message d\'erreur : ', $e->getMessage();
		echo "Votre inscription n'a pas été pris en compte. ";
		echo "Veuillez ré-essayer !";
	}
	include("fonctions/deconnexionBDD.php");
}

/* Permet de vérifier si le identifiants (mail ou numéro puis mot de passe) sont correct ou non */
function verifCnx($login, $pass, $typeLogin)
{
	include("fonctions/connexionBDD.php");
	$requete = 'SELECT '.$typeLogin.',pass FROM inscrits WHERE '.$typeLogin.'="'.$login.'"; ';
	$reponse = $bdd->query($requete);
	$donnees = $reponse->fetch();

	if($login == $donnees["$typeLogin"] && $pass == $donnees['pass'])
	{	return 1;	}
	else
	{	return 0;	}

	$reponse->closeCursor(); // Termine le traitement de la requête
	include("fonctions/deconnexionBDD.php");
}

/* Permet de vérifier si le "login" (mail ou numéro) existe déjà ou non */
function testLogin($login, $typeLogin)
{
	$nb = 0;
	
	include("fonctions/connexionBDD.php");
	$requete = 'SELECT '.$typeLogin.' FROM inscrits WHERE '.$typeLogin.'="'.$login.'"; ';
	$reponse = $bdd->query($requete);
	$donnees = $reponse->fetch();
	
	if($requete != null)
	{
		$requete = 'SELECT pass FROM inscrits WHERE '.$typeLogin.'="'.$login.'"; ';
		$reponse = $bdd->query($requete);
		$donnees = $reponse->fetch();
		$nb = 1;
	}
	
	$reponse->closeCursor();
	include("fonctions/deconnexionBDD.php");
	return $nb;	
}

?>