<!-- DEBUT TEST CONNEXION -->
<?php
SESSION_start();
if(!empty($_SESSION['loginCnx']) && !empty($_SESSION['pwdCnx']))
{
	$login = $_SESSION['loginCnx'];
	$passw = $_SESSION['pwdCnx'];
}
else
{
	$login = "";
	$passw = "";
}
?>

<html>
	<head>		
		<link rel="stylesheet" href="css/style.css" />
		<?php require('fonctions/fonctions.php'); ?>
	</head>
	<body class="bodyPrincipal">		
			<div class="en_tete">
				<?php include("pages/en_tete.php"); ?>
			</div>
			
			<div class="contenu"><?php
				if(empty($login) && empty($passw))
				{
					include("pages/accueil.php");
				}
				else 
				{
					echo "<p> BIENVENUE SUR VOTRE ESPACE !! </p>";
					?>
					<FORM action="pages/Fdeconnexion.php" method=POST>
						<INPUT Type=SUBMIT Value="Déconnexion">
					</FORM>
					<?php
				}
				?>
			</div>			
	</body>
</html>















<?php 
// dans la div contenu : 
/*
				

				*/
?>