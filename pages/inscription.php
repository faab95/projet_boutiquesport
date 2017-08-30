<?php
if(isset($_POST['forminscription']))
{
	$nom = $_POST['name'];
	$prenom = $_POST['surname'];
	$rue = $_POST['road'];
	$num = $_POST['number'];
	$ville = $_POST['town'];
	$cp = $_POST['postcode'];
	$email = $_POST['mailaddress'];
	$mdp = $_POST['pass'];
	
	$client = new Client
	([
		'nom' => $nom,
		'prenom' => $prenom,
		'rue' => $rue,
		'num' => $num,
		'cp' => $cp,
		'ville' => $ville,
		'email' => $email,
		'mdp' => $mdp
	]);
	
	$manager = new ClientManager($db);
	$verif = $manager->add($client);
	
	//=====Test de réussite
	if($verif == 1)
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
	else if($verif == -1)
	{
		?>
		<script type="text/javascript">
		$( document ).ready(function() 
		{
		document.getElementById("id03").style.display = "block";
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

<div class="paddingBottom">
	<div class="w3-container w3-content">
		<h2 class="txtGras w3-center w3-padding-32">Créer un compte</h2>
		<div class="w3-border w3-shadow padding-form">
			<form method="POST">
				<div class="w3-row-padding">
					<p class="w3-col w3-small w3-hover-text-red"><a href="index.php?page=connexion" class="noDeco">Vous avez déjà un compte ? Connectez-vous !</a></p>
				</div>
				<div class="w3-row-padding">
					<p class="w3-half">
						<label class="w3-text-dark-gray">Nom</label>
						<input style="border:none;background-color:#f1f1f1" class="w3-input w3-round" value="<?php if(isset($nom)) {echo $nom; }?>" type="text" required name="name"/>
					</p>
					<p class="w3-half">
						<label class="w3-text-dark-gray">Prénom</label>
						<input style="border:none;background-color:#f1f1f1" class="w3-input w3-round" value="<?php if(isset($prenom)) {echo $prenom; }?>" type="text" required name="surname"/>
					</p>
				</div>
				<div class="w3-row-padding">
					<p class="w3-threequarter">
						<label class="w3-text-dark-gray">Rue</label>
						<input style="border:none;background-color:#f1f1f1" class="w3-input w3-round" value="<?php if(isset($rue)) {echo $rue; }?>" type="text" required name="road"/>
					</p>
					<p class="w3-quarter">
						<label class="w3-text-dark-gray">N°</label>
						<input style="border:none;background-color:#f1f1f1" class="w3-input w3-round" value="<?php if(isset($num)) {echo $num; }?>" type="number" required name="number"/>
					</p>
				</div>
				<div class="w3-row-padding">
					<p class="w3-threequarter">
						<label class="w3-text-dark-gray">Ville</label>
						<input style="border:none;background-color:#f1f1f1" class="w3-input w3-round" value="<?php if(isset($ville)) {echo $ville; }?>" type="text" required name="town"/>
					</p>
					<p class="w3-quarter">
						<label class="w3-text-dark-gray">Code postal</label>
						<input style="border:none;background-color:#f1f1f1" class="w3-input w3-round" value="<?php if(isset($cp)) {echo $cp; }?>" type="number" required name="postcode"/>
					</p>
				</div>
				<div class="w3-row-padding">
					<p class="w3-col">
						<label class="w3-text-dark-gray">E-mail</label>
						<input style="border:none;background-color:#f1f1f1" class="w3-input w3-round" type="email" required name="mailaddress"/>
					</p>
				</div>
				<div class="w3-row-padding">
					<p class="w3-col">
						<label class="w3-text-dark-gray">Mot de passe</label>
						<input style="border:none;background-color:#f1f1f1" class="w3-input w3-round" type="password" required name="pass"/>
					</p>
				</div>
				<div class="w3-row-padding">
					<p class="w3-col">
						<button class="w3-input w3-section txtGras w3-button w3-red w3-hover-red w3-hover-shadow" type="submit" name="forminscription">S'INSCRIRE</button>
					</p>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal confirmation -->
<div id="id01" class="w3-modal">
	<div class="w3-modal-content w3-round-large">
		<header class="w3-container w3-black"> 
			<span onclick="id01.style.display='none'" class="w3-closebtn w3-hover-text-red">&times;</span>
			<h6><i class="fa fa-check-circle"></i> Confirmation de l'inscription</h6>
		</header>
		<div class="w3-container">
			<p>Merci de votre inscription.<br/>Notre équipe vous remercie et vous souhaite un bon shopping !</p>
		</div>
	</div>
</div>
<!------------------------------------- -->
<!-- Modal échec -->
<div id="id02" class="w3-modal">
	<div class="w3-modal-content w3-round-large">
		<header class="w3-container w3-black"> 
			<span onclick="id02.style.display='none'" class="w3-closebtn w3-hover-text-red">&times;</span>
			<h6><i class="fa fa-exclamation-triangle"></i> Echec de l'inscription</h6>
		</header>
		<div class="w3-container">
			<p>Votre inscription n'a pu être confirmée.<br/>Notre équipe s'occupe de ce problème, merci de votre patiente.</p>
		</div>
	</div>
</div>
<!------------------------------------- -->
<!-- Modal échec déjà inscrit-->
<div id="id03" class="w3-modal">
	<div class="w3-modal-content w3-round-large">
		<header class="w3-container w3-black"> 
			<span onclick="id03.style.display='none'" class="w3-closebtn w3-hover-text-red">&times;</span>
			<h6><i class="fa fa-exclamation-triangle"></i> Echec de l'inscription</h6>
		</header>
		<div class="w3-container">
			<p>Votre inscription n'a pu être confirmée.<br/>Un compte existe déjà avec cette adresse mail.</p>
		</div>
	</div>
</div>
<!------------------------------------- -->