<?php
if(isset($_POST['formcontact']))
{
	$nom = $_POST['name'];
	$adresse = $_POST['mail'];
	$sujet = $_POST['sujet'];

	//=====Déclaration de l'adresse de destination.
	$mail = 'fabian.collier0@gmail.com'; 
	//=====

	//=====Création du header de l'e-mail.
	$headers ='From:'. $nom .'<'. $adresse .'>'."\n";
	$headers .='Reply-To:'. $nom .'<'. $adresse .'>'."\n";
	$headers .='Content-Type: text/plain; charset="iso-8859-1"'."\n";
	$headers .='Content-Transfer-Encoding: 8bit';
	//=====

	//=====Création du message.
	$message = $_POST['message'];
	//=====

	//=====Envoi de l'e-mail.
	$verif = mail($mail,$sujet,$message,$headers);
	//=====
	
	//=====Test de réussite de l'envoi.
	if($verif == true)
	{
		?>
		<script type="text/javascript">
		$( document ).ready(function() 
		{
		document.getElementById("id01").style.display = "block";
		});
		</script>	
		<?php
	}
	else
	{
		?>
		<script type="text/javascript">
		$( document ).ready(function() 
		{
		document.getElementById("id02").style.display = "block";
		});
		</script>	
		<?php
	}
	//=====
}
?>

<!-- Formulaire -->
<div class="paddingTop">
	<div class="w3-container w3-content">
		<h3 class="w3-wide w3-center">CONTACTEZ-NOUS</h3>
		<p class="w3-opacity w3-center txtItalic">Une question ? Envoyez votre message !</p>
		<div class="w3-row w3-padding-32">
			<div class="w3-col m6 w3-large w3-margin-bottom">
				<i class="fa fa-map-marker" style="width:30px"></i> Mons, Belgique<br>
				<i class="fa fa-phone" style="width:30px"></i> Tel : +32 070895<br>
				<i class="fa fa-envelope" style="width:30px"> </i> Email : info@sport.be<br>
			</div>
			<div class="w3-col m6">
				<form method="POST">
					<select class="w3-input w3-border w3-margin-bottom" placeholder="Nom" required name="sujet">
						<option selected label class="w3-text-gray">Choisir votre catégorie</option>
						<option>Réclamation sur un article</option>
						<option>Information sur un article</option>
						<option>Paiement / Remboursement</option>
						<option>Divers</option>
					</select> 
					<div class="w3-row-padding w3-margin-bottom" style="margin:0 -16px 8px -16px">
						<div class="w3-half">
							<input class="w3-input w3-border" type="text" placeholder="Nom" required name="name">
						</div>
						<div class="w3-half">
							<input class="w3-input w3-border" type="email" placeholder="Email" required name="mail">
						</div>
					</div>
					<textarea class="w3-input w3-border" placeholder="Message" required name="message"></textarea>
					<button class="txtGras w3-button w3-red w3-section w3-right w3-hover-red w3-hover-shadow" type="submit" name="formcontact"><i class="fa fa-paper-plane"></i> ENVOYER</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!------------------------------------- -->

<!-- Modal confirmation -->
<div id="id01" class="w3-modal">
	<div class="w3-modal-content w3-round-large">
		<header class="w3-container w3-teal"> 
			<span onclick="id01.style.display='none'" class="w3-closebtn">&times;</span>
			<h6><i class="fa fa-check-circle"></i> Confirmation de l'envoi</h6>
		</header>
		<div class="w3-container">
			<p>Votre mail a bien été envoyé.<br/>Notre équipe vous remercie, nous vous répondrons dès que possible.</p>
		</div>
	</div>
</div>
<!------------------------------------- -->
<!-- Modal échec -->
<div id="id02" class="w3-modal">
	<div class="w3-modal-content w3-round-large">
		<header class="w3-container w3-teal"> 
			<span onclick="id02.style.display='none'" class="w3-closebtn">&times;</span>
			<h6><i class="fa fa-exclamation-triangle"></i> Echec de l'envoi</h6>
		</header>
		<div class="w3-container">
			<p>Votre mail n'a pu être envoyé.<br/>Notre équipe s'occupe de ce problème, merci de votre patiente.</p>
		</div>
	</div>
</div>
<!------------------------------------- -->

<!-- Google Maps -->
<div class="paddingBottom">
	<div id="googleMap" class="w3-grayscale-min"></div>
	<script src="lib/js/function_map"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPcGQaY5NCJu3kK5kFKUWr8ZAVRdvwCEE&callback=myMap"></script>
</div>
<!------------------------------------- -->