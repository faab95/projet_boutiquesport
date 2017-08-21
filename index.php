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
		<div class="w3-padding w3-black"></div>
		<div class="w3-padding-16 w3-container">
			<h1 class="txtGras txtOmbre w3-center"><a href="index.php?page=accueil" class="noDeco"><span style="color:red">BOUTIQUE</span>SPORT</a></h1>
		</div>
		<!-- Barre de navigation pour large screen -->
		<div class="w3-container w3-padding-16 w3-center boxOmbre" style="background-color:#fafafa;">
			<a class="w3-hide-medium w3-hide-large w3-opennav w3-center w3-transparent w3-hover-text-red" href="javascript:void(0)" onclick="w3_open()"><i class="fa fa-bars fa-2x"></i></a>
			<div class="w3-dropdown-hover w3-hide-small">
				<button href="#description" class="txtGras w3-button w3-hover-shadow w3-round-large" style="background-color:#fafafa">HOMMES <i class="fa fa-caret-down"></i></button>
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
		<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="width:250px" id="mySidebar">
			<div class="w3-display-container">
				<i onclick="w3_close()" class="fa fa-remove w3-button w3-display-topright"></i>
			</div>
			<div class="w3-padding-48 w3-large txtGras">
				<a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">Hommes <i class="fa fa-caret-down"></i></a>
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
		?>               
		<!-------------------------------------------------------------------------->
		
		
		<!-- FOOTER ---------------------------------------------------------------->
		<div class="w3-row w3-black w3-center">
			<h1 class="txtGras w3-padding-32 w3-xxxlarge"><a href="index.php?page=accueil" class="noDeco w3-topbar w3-bottombar"><span style="color:red">B</span>S</a></h1>
			<div class="w3-small w3-text-gray txtGras">
				<p>© COPYRIGHT 2017 Fabian</p>
				<p>Tous droits réservés</p>
			</div>
			<div class="w3-text-gray w3-large w3-padding-16">
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
		
		
	</body>
	<script>
var slideIndex = 1;
showDivs(slideIndex);

var myIndex = 0;
carousel();

function carousel() 
{
	var i;
	var x = document.getElementsByClassName("mySlides");
	var dots = document.getElementsByClassName("slides");
	for (i = 0; i < x.length; i++) 
	{
		x[i].style.display = "none";  
	}
	myIndex++;
	if (myIndex > x.length) 
	{
		myIndex = 1
	}    
	x[myIndex-1].style.display = "block";
	for (i = 0; i < dots.length; i++) 
	{
		dots[i].className = dots[i].className.replace(" w3-white", "");
	}
	dots[myIndex-1].className += " w3-white";
	setTimeout(carousel, 4000);    
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("slides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  
  for (i = 0; i < x.length; i++) 
  {
     x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) 
  {
     dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-white";
}

// Accordion 
function myAccFunc() {
    var x = document.getElementById("demoAcc");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}

// Click on the "Jeans" link on page load to open the accordion for demo purposes
document.getElementById("myBtn").click();

function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() 
{
	scrollFunction()
};

function scrollFunction() 
{
    if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) 
	{
        document.getElementById("topButton").style.display = "block";
    } 
	else 
	{
        document.getElementById("topButton").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0; // For Chrome, Safari and Opera 
    document.documentElement.scrollTop = 0; // For IE and Firefox
}
</script>

</html>
