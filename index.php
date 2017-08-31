<?php
session_start();
ini_set("display_errors",0);error_reporting(0);
include ('./lib/php/liste_include.php');
$db = Connexion::getInstance($dsn, $user, $pass);
?>

<!DOCTYPE html>
<html>

	<head>
		<title>Boutique Sport</title>
		<link rel="icon" href="images/favicon.ico"/>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="lib/css/style.css">
		<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	</head>

	<body>
		<!-- HEADER ---------------------------------------------------------------->
		<div class="w3-black w3-container">
			<div class="w3-right">
				<div class="w3-dropdown-hover">
					<button class="w3-button w3-black w3-hover-black" style="background-color:#fafafa">Mon compte <i class="fa fa-caret-down"></i></button>
					<div class="w3-dropdown-content w3-bar-block w3-card-4" style="background-color:#fafafa;">
						<a id="buttonCo" class="w3-bar-item w3-button" href="index.php?page=connexion" ><i class="fa fa-sign-in"></i> Se connecter</a>
						<a id="buttonAccount" class="w3-bar-item w3-button" href="index.php?page=account" ><i class="fa fa-user"></i> Mon compte</a>
						<a id="buttonDeco" class="w3-bar-item w3-button" href="index.php?page=deconnexion"><i class="fa fa-sign-out"></i> Déconnexion</a>
					</div>
				</div>
				<a href="index.php?page=panier"><i class="fa fa-shopping-cart fa-lg"></i><span class="w3-badge w3-red w3-small"><?php if(isset($_SESSION['panier'])){print $_SESSION['panier'];}else{print 0;} ?></span> </a>
			</div>
		</div>
		<div class="w3-padding-16">
			<h1 class="txtGras txtOmbre w3-center w3-hide-small w3-xxxlarge"><a href="index.php?page=accueil" class="noDeco"><span style="color:red">BOUTIQUE</span>SPORT</a></h1>
			<h2 class="txtGras txtOmbre w3-center w3-hide-medium w3-hide-large w3-xxlarge"><a href="index.php?page=accueil" class="noDeco"><span style="color:red">BOUTIQUE</span>SPORT</a></h2>
		</div>
		<!-- Barre de navigation pour large screen -->
		<div class="w3-container w3-padding-16 w3-center boxOmbre" style="background-color:#fafafa;">
			<a class="w3-hide-medium w3-hide-large w3-opennav w3-center w3-transparent w3-hover-text-red" href="javascript:void(0)" onclick="w3_open()"><i class="fa fa-bars fa-lg"></i></a>
			<div class="w3-dropdown-hover w3-hide-small">
				<button class="txtGras w3-button w3-hover-shadow w3-round-large" style="background-color:#fafafa">HOMMES <i class="fa fa-caret-down"></i></button>
				<div class="w3-dropdown-content w3-bar-block w3-card-4" style="background-color:#fafafa;">
					<a href="index.php?page=pull" class="w3-bar-item w3-button">Pull</a>
					<a href="index.php?page=tshirt" class="w3-bar-item w3-button">T-shirt</a>
					<a href="index.php?page=polo" class="w3-bar-item w3-button">Polo</a>
					<a href="index.php?page=debardeur" class="w3-bar-item w3-button">Débardeur</a>
					<a href="index.php?page=training" class="w3-bar-item w3-button">Training</a>
					<a href="index.php?page=short" class="w3-bar-item w3-button">Short</a>
				</div>
			</div>
			<a href="index.php?page=chaussures" class="txtGras w3-button w3-round-large w3-hover-shadow w3-transparent w3-hide-small">CHAUSSURES</a>
			<a href="index.php?page=accessoires" class="txtGras w3-button w3-round-large w3-hover-shadow w3-transparent w3-hide-small">ACCESSOIRES</a>
			<a href="index.php?page=contact" class="txtGras w3-button w3-round-large w3-hover-shadow w3-transparent w3-hide-small"><i class="fa fa-envelope"></i> CONTACT</a>
		</div>
		<!-- Barre de navigation pour small screen -->
		<div class="w3-hide-medium w3-hide-large">
		<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top w3-border boxOmbre" style="width:250px" id="mySidebar">
			<div class="w3-display-container">
				<i onclick="w3_close()" class="fa fa-remove w3-button w3-display-topright w3-red"></i>
			</div>
			<div class="w3-padding-48 w3-large txtGras">
				<a onclick="fct_accordion()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">Hommes <i class="fa fa-caret-down"></i></a>
				<div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
					<a href="index.php?page=pull" class="w3-bar-item w3-button w3-text-dark-grey">Pull</a>
					<a href="index.php?page=tshirt" class="w3-bar-item w3-button w3-text-dark-grey">T-shirt</a>
					<a href="index.php?page=polo" class="w3-bar-item w3-button w3-text-dark-grey">Polo</a>
					<a href="index.php?page=debardeur" class="w3-bar-item w3-button w3-text-dark-grey">Débardeur</a>
					<a href="index.php?page=training" class="w3-bar-item w3-button w3-text-dark-grey">Training</a>
					<a href="index.php?page=short" class="w3-bar-item w3-button w3-text-dark-grey">Short</a>
				</div>
				<a href="index.php?page=chaussures" class="w3-bar-item w3-button">Chaussures</a>
				<a href="index.php?page=accessoires" class="w3-bar-item w3-button">Accessoires</a>
			</div>
			<a href="index.php?page=contact" class="txtGras w3-bar-item w3-button w3-padding"><i class="fa fa-envelope"></i> Contact</a> 
		</nav>
		</div>
		<!-------------------------------------------------------------------------->
		
		
		<!-- CONTENT --------------------------------------------------------------->
		<?php
		if (!isset($_SESSION['page'])) 
		{
			$_SESSION['page'] = "accueil";
		}
		if (isset($_GET['page'])) 
		{
			$_SESSION['page'] = $_GET['page'];
		}
		$chemin = './pages/' . $_SESSION['page'] . '.php';
		if (file_exists($chemin)) 
		{
			include ($chemin);
		}
		else 
		{
			?>
			<div class="w3-padding-32">
				<div class="w3-container w3-content w3-center">
					<span class="txtGras w3-text-red  w3-xlarge">Oups.. La page demandée n'existe pas !</span>
				</div>
			</div>
			<?php
		}
		?>               
		<!-------------------------------------------------------------------------->
		
		
		<!-- FOOTER ---------------------------------------------------------------->
		<div class="w3-row-padding w3-center w3-padding-16 boxOmbre" style="background-image: url('images/footer.png')">
				<h1 class="txtGras w3-padding-32 w3-xxxlarge w3-text-white"><a href="index.php?page=accueil" class="noDeco w3-topbar w3-bottombar"><span style="color:red">B</span>S</a></h1>
				<div class="w3-small txtGras txtGray">
					<p>© COPYRIGHT 2017 Fabian</p>
					<p>Tous droits réservés</p>
				</div>
				<div class="w3-large w3-padding-16 txtGray">
					<a href="https://fr-fr.facebook.com/" target="_blank"><i class="fa fa-facebook-official w3-hover-text-indigo"></i></a>
					<a href="https://www.instagram.com/?hl=fr" target="_blank"><i class="fa fa-instagram w3-hover-text-purple"></i></a>
					<a href="https://www.snapchat.com/l/fr-fr/" target="_blank"><i class="fa fa-snapchat w3-hover-text-yellow"></i></a>
					<a href="https://twitter.com/?lang=fr" target="_blank"><i class="fa fa-twitter w3-hover-text-light-blue"></i></a>
				</div>
				<div class="w3-right">
					<button id="topButton" title="Vers le haut" onclick="topFunction()"><i class="fa fa-chevron-circle-up w3-hover-opacity"></i></button>
				</div>
		</div>
		<!-------------------------------------------------------------------------->
		
		<script src="lib/js/function_carousel" type="text/javascript"></script>
		<script src="lib/js/function_accordion" type="text/javascript"></script>
		<script src="lib/js/function_open" type="text/javascript"></script>
		<script src="lib/js/function_scroll" type="text/javascript"></script>
		
	</body>
</html>
