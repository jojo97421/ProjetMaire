<?php
	require('config.php');
	// Initialiser la session
	session_start();
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["username"])){
		header("Location: login.php");
		exit(); 
	}

	$query = "SELECT rang FROM Utilisateurs WHERE pseudo = '".$_SESSION['username']."' ";
	$result = mysqli_query($conn,$query) ;
	$row =  mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<div class="sucess">
			<h1>Bienvenue <?php echo $_SESSION['username']; ?>!</h1>
			<p>C'est votre tableau de bord.</p>
			<a href="logout.php">Déconnexion</a>
			</br>
			<!--<a href="mdpvérification.php">Changer de mot de passe</a>-->
			</br>
			
			<?php if($row['rang'] == 'A'){ ?>
				<a href="../PHP_TP6_MVC/">Afficher</a> 
			</br>
				<a href="../PHP_TP6_MVC/?action=affichertuteurs&val=">Liaison des CV au Tuteur</a>
			<?php } ?>

			<?php if($row['rang'] == 'T'){ ?>
				<a href="../PHP_TP6_MVC/?action=affichertuteurs&val=">Afficher données</a>
			</br>
				<a href="../PHP_TP6_MVC/?action=TuteurInfo&val=">Information</a>
			</br>
				<a href="../PHP_TP6_MVC/?action=Clientperso&val=">Mes Demandes</a>


				<?php } ?>
		</div>
	</body>
</html>