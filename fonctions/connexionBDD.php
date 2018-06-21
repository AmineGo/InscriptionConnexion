<?php
try
{
	// Connexion a la Base de donnée
	// Il faut informer le nom du poste "host" (si on travail en local alors "localhost"), 
	// le nom de la base de donnée "dbname", 
	// l'utilisateur, 
	// et le mot de passe de la base de données
	$bdd = new PDO('mysql:host=;dbname=;charset=utf8', '', '');
	// echo 'Connexion réussie';
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
