	<head>
		<title>Inscription - Connexion</title>
		<link rel="stylesheet" href="../css/style.css" media=all />
				
	</head>
		<div class="FinscriptionCnxBase">
			<div id="textTitreInscCnx"><b> Inscription </b></div>
			<div id="textTitreInscCnx2"><b> C'est gratuit (et cela le restera toujours)</b></div>
			<form id="formInsc" action="#" method="POST">
				<table id="tabInscrire">
					<tr><td id="tdPrenom"> <input type="text" name="prenom" placeholder="Prénom*" required> </td> <td id="tdNom"> <input type="text" name="nom" placeholder="Nom de famille*" required> </td> </tr>
					<tr><td id="tdNumeroMail" colspan="2"><input id="inputNumeroMail" type="text" name="NumeroMail" placeholder="Numéro de mobile ou e-mail*" required> </td><br />	</tr>
					<tr><td id="tdNumeroMailConfirmation" colspan="2"> <input id="inputNumeroMailConfirmation" type="text" name="NumeroMailConfirmation" placeholder="Confirmer numéro de mobile ou e-mail**" required> </td><br />	</tr>
					<tr><td id="tdPassword" colspan="2"> <input id="inputPassword" type="password" name="pwd" placeholder="Nouveau mot de passe*" required> </td><br />	</tr>
				</table>	
				<br />

					<!-- La date n'est pas totalement correct. Le fuseau horaire par défaut est +0000 
							Une petite amélioration est à faire. -->
					<div id="textDateDeNaissance"><b> Date de naissance </b></div>
					<SELECT name="Jour" size="1">
						<option selected=selected>Jours <?php
						for($i=1 ; $i<=31 ; $i++)
						{?>
							<OPTION value="<?php echo $i ?>"><?php echo $i ?>
						<?php 
						} ?>
					</SELECT>

					<SELECT name="Mois" size="1">
						<option selected=selected>Mois <?php
						for($i=1 ; $i<=12 ; $i++)
						{?>
							<OPTION value="<?php echo $i ?>"><?php echo $i ?>
						<?php 
						} ?>
					</SELECT>

					<SELECT name="Annee" size="1">
						<option selected=selected>Années <?php
						for($i=1973 ; $i<=date('Y') ; $i++)
						{?>
							<OPTION value="<?php echo $i ?>"><?php echo $i ?>
						<?php 
						} ?>
					</SELECT>
					<br /><br />
					<input type="radio" name="sexe" value="F" >	<label>Femme</label>
					<input type="radio" name="sexe" value="H" > <label>Homme</label>

					<br /><br />
					<input class="boutonInsc" type="submit" value="Inscription" > <br />
			</form>	
			
			<?php
			if(isset($_POST['Jour']) && isset($_POST['Mois']) && isset($_POST['Annee'])) 
			{
				if($_POST['Jour']=="Jours" || $_POST['Mois']=="Mois" || $_POST['Annee']=="Années")
				{
					echo "<p id='reponseBtn'> Complétez votre date de naissance ! </p>";
				}
			}
			/* Problème lors de la vérification de la selection du sexe de la personne 
				* Le message d'erreur apparait dès le premier chargement de la page */
			if(!isset($_POST['sexe']))
			{
				echo "<p id='reponseBtn'> Complétez votre sexe ! </p>";
			}
			if(isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['NumeroMail']) && isset($_POST['NumeroMailConfirmation']) && isset($_POST['pwd']) && $_POST['Jour'] != "Jours" && $_POST['Mois'] != "Mois" && $_POST['Annee'] != "Années")
			{
				/*
				echo $_POST['prenom'].'<br />';
				echo $_POST['nom'].'<br />';
				echo $_POST['NumeroMail'].'<br />';
				echo $_POST['NumeroMailConfirmation'].'<br />';
				echo $_POST['pwd'].'<br />';
				echo $_POST['sexe'].'<br />';
				echo $_POST['Jours'].'<br />';
				echo $_POST['Mois'].'<br />';
				echo $_POST['Annee'].'<br />';
				*/

				$typeLogin = testNumeroOuMail($_POST['NumeroMail']);
				echo $dateDeNaissance = $_POST['Annee']."/".$_POST['Mois']."/".$_POST['Jour'];
				
				
				if($_POST['NumeroMail'] != $_POST['NumeroMailConfirmation'])
				{
					echo "<p id='reponseBtn'> Il y a eu une erreur dans la confirmation de votre numéro/mail ! </p>";
				}
				else if(testNumeroMail($_POST['NumeroMail'], $typeLogin)==1)
				{
					echo "<p id='reponseBtn'> Numéro ou Mail déjà utilisée ! </p>";
				}
				else if(verifInscription($_POST['prenom'], $_POST['nom'], $_POST['NumeroMail'], $typeLogin) == 1)
				{
					echo "<p id='reponseBtn'> Vous êtes déjà inscrit Mr.".$_POST['nom']." ! <br> Nom déjà utilisé ! <br> Connectez-vous ! </p>";
				}
				else
				{
					sinscrire($_POST['prenom'], $_POST['nom'], $_POST['sexe'], $_POST['NumeroMail'], MD5($_POST['pwd']), $dateDeNaissance, $typeLogin);
				}
			}
			?>
		</div>