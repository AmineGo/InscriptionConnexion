# InscriptionConnexion

#Présentation des différents fichiers : 

/BaseDeDonnees/AlimBDD.sql  => Contient un "insert" pour pouvoir faire un test de connexion sans passé obligatoirement par le formulaire d'inscription.

/BaseDeDonnees/BaseDeDonnees.sql => Contient le script sql de la base de données. La Base de données est composé d'une seul table.

/css/style.css => Contient toute la mise en forme des pages web.

/fonctions/connexionBDD.php => Contient le code permettant de se connecter à la base de données.

/fonctions/deconnexionBDD.php => Contient le code permettant de se déconnecter de la base de données.

/fonctions/fonctions.php => Contient toutes les fonctions nécessaires au bon fonctionnement du site web.

/pages/accueil.php	=> Correspond au contenu principal, c'est à dire le formulaire d'inscription lors du premier lancement.

/pages/en_tete.php => Contient l'en-tete de la page (haut de la page web) et comporte le formulaire de connexion.

/pages/Fdeconnexion.php => Contient le code pour se déconnecter de son compte. (Ne pas confondre avec la déconnexion de la base de données)

index.php => Correspond à la page principale, par laquelle tout est réalisé.

#Procédure : 

Il faut modifier 2 fichiers pour tout faire fonctionner correctement.

Etape 1 : 
/fonctions/connexionBDD.php
    => Il faut renseigner la machine (host)
    => Il faut renseigner la base de données (dbname)
    => Il faut renseigner l'identifiant de la base de données
    => Il faut renseigner le mot de passe de la base de données
    

