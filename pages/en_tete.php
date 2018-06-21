<html>
	<head>
		<link rel="stylesheet" href="../css/style.css" />		
	</head>
	<body>

		<div id="connexionBEnT">
			<?php
			if(empty($login) && empty($passw))
			{ 	?>
				<form id="formCnx" action="#" method="POST">
					<table id="tabConnexion">
						<tr>
							<td><label id="labelLoginCnx">Adresse email ou mobile</label></td>
							<td><label id="labelMdpCnx">Mot de passe</label></td>
						</tr>
						<tr>
							<td id="tdLoginCnx"> <input id="inputNumeroMailConfirmation" type="text" name="loginCnx" placeholder="Votre login*" required> </td>
							<td id="tdPwdCnx"> <input id="inputPassword" type="password" name="pwdCnx" placeholder="Votre mot de passe*" required> </td>	
							<td><input class="boutonCnx" type="submit" value="Connexion"> </td>
						</tr>
					</table>
				</form>
				<?php

				$NumeroOuMail = testNumeroOuMail($_POST['loginCnx']);

				if(!empty($_POST['loginCnx']) && !empty($_POST['pwdCnx']))
				{
					$testCorrectCnx = verifCnx($_POST['loginCnx'], MD5($_POST['pwdCnx']), $NumeroOuMail);

					$testlogin = testLogin($_POST['loginCnx'], $NumeroOuMail);
					echo $testlogin.'<br />';

					if($testCorrectCnx == 1)
					{
						$_SESSION['loginCnx'] = $_POST['loginCnx'];
						$_SESSION['pwdCnx'] = $_POST['pwdCnx'];
						?>
						<META http-equiv="refresh" content="0;url=index.php">
						<?php
					}
					else
					{
						if($testlogin==1)
						{
							echo "Login ou Mot de passe incorrect ! <br>";
						}
						else
						{
							echo "Non inscrit ! <br>";
						}						
					}
				}
			}
			else
			{
				?><title>Connecté</title><?php
				echo "<text id='textBienvenue'> Bienvenue ".$login." </text>";
			}
			?>
		</div>
	</body>
</html>