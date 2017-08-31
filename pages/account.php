<?php

if(isset($_SESSION['id']))
{
	$id = $_SESSION['id'];
	$manager = new ClientManager($db);
	$client = $manager->getClientById($id);
}

if(isset($_POST['formaccount']))
{
	if($_POST['pass'] == $client->mdp)
	{
		$nom = $_POST['name'];
		$prenom = $_POST['surname'];
		$rue = $_POST['road'];
		$num = $_POST['number'];
		$ville = $_POST['town'];
		$cp = $_POST['postcode'];
		$email = $_POST['mailaddress'];
		if(!empty($_POST['newpass']))
		{
			$mdp = $_POST['newpass'];
		}
		else
		{
			$mdp = $_POST['pass'];
		}
		
		
		$client = new Client
		([
			'id_client' => $id,
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
		$verif = $manager->update($client);
		if($verif=1)
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
	}
	else
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
}
?>


<div class="paddingBottom">
	<div class="w3-container w3-content">
		<h2 class="txtGras w3-center w3-padding-32">Vos informations personnelles</h2>
		<div class="w3-border w3-shadow padding-form">
			<form method="POST">
				<div class="w3-row-padding">
					<p class="w3-half">
						<label class="w3-text-dark-gray">Nom</label>
						<input style="border:none;background-color:#f1f1f1" value="<?php if(isset($client)) {echo $client->nom; }?>" name="name" type="text" class="w3-input w3-round"></input>
					</p>
					<p class="w3-half">
						<label class="w3-text-dark-gray">Prénom</label>
						<input style="border:none;background-color:#f1f1f1" value="<?php if(isset($client)) {echo $client->prenom; }?>" name="surname" type="text" class="w3-input w3-round"></input>
					</p>
				</div>
				<div class="w3-row-padding">
					<p class="w3-threequarter">
						<label class="w3-text-dark-gray">Rue</label>
						<input style="border:none;background-color:#f1f1f1" value="<?php if(isset($client)) {echo $client->rue; }?>" name="road" type="text" class="w3-input w3-round"></input>
					</p>
					<p class="w3-quarter">
						<label class="w3-text-dark-gray">N°</label>
						<input style="border:none;background-color:#f1f1f1" value="<?php if(isset($client)) {echo $client->num; }?>" name="number" type="number" class="w3-input w3-round"></input>
					</p>
				</div>
				<div class="w3-row-padding">
					<p class="w3-threequarter">
						<label class="w3-text-dark-gray">Ville</label>
						<input style="border:none;background-color:#f1f1f1" value="<?php if(isset($client)) {echo $client->ville; }?>" name="town" type="text" class="w3-input w3-round"></input>
					</p>
					<p class="w3-quarter">
						<label class="w3-text-dark-gray">Code postal</label>
						<input style="border:none;background-color:#f1f1f1" value="<?php if(isset($client)) {echo $client->cp; }?>" name="postcode" type="number" class="w3-input w3-round"></input>
					</p>
				</div>
				<div class="w3-row-padding">
					<p class="w3-col">
						<label class="w3-text-dark-gray">E-mail</label>
						<input style="border:none;background-color:#f1f1f1" value="<?php if(isset($client)) {echo $client->email; }?>" name="mailaddress" type="email" class="w3-input w3-round"></input>
					</p>
				</div>
				<div class="w3-row-padding">
					<p class="w3-col">
						<label class="w3-text-dark-gray">Mot de passe</label>
						<input style="border:none;background-color:#f1f1f1" name="pass" type="password" required class="w3-input w3-round"></input>
					</p>
				</div>
				<div class="w3-row-padding">
					<p class="w3-col">
						<label class="w3-text-dark-gray">Nouveau mot de passe</label>
						<input style="border:none;background-color:#f1f1f1" name="newpass" type="password" class="w3-input w3-round"></input>
					</p>
				</div>
				<div class="w3-row-padding">
					<p class="w3-col">
					<button class="w3-input w3-section txtGras w3-button w3-red w3-hover-red w3-hover-shadow" type="submit" name="formaccount">SAUVEGARDER</button>
					</p>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal échec mauvais password -->
<div id="id01" class="w3-modal">
	<div class="w3-modal-content w3-round-large">
		<header class="w3-container w3-black"> 
			<span onclick="id01.style.display='none'" class="w3-closebtn w3-hover-text-red">&times;</span>
			<h6><i class="fa fa-check-circle"></i> Echec d'authentification</h6>
		</header>
		<div class="w3-container">
			<p>Ce mot de passe est incorrect.<br/>Réessayez s'il vous plait.</p>
		</div>
	</div>
</div>
<!------------------------------------- -->

<!-- Modal échec-->
<div id="id02" class="w3-modal">
	<div class="w3-modal-content w3-round-large">
		<header class="w3-container w3-black"> 
			<span onclick="id03.style.display='none'" class="w3-closebtn w3-hover-text-red">&times;</span>
			<h6><i class="fa fa-exclamation-triangle"></i> Echec de la mise à jour</h6>
		</header>
		<div class="w3-container">
			<p>Votre modifications n'ont pas pu être enregistrées.<br/>Notre équipe s'occupe de ce problème, merci de votre patiente.</p>
		</div>
	</div>
</div>
<!------------------------------------- -->

<!-- Modal réussite-->
<div id="id03" class="w3-modal">
	<div class="w3-modal-content w3-round-large">
		<header class="w3-container w3-black"> 
			<span onclick="window.location.href='index.php?page=accueil'" class="w3-closebtn w3-hover-text-red">&times;</span>
			<h6><i class="fa fa-exclamation-triangle"></i> Mise à jour effectuée</h6>
		</header>
		<div class="w3-container">
			<p>La mise à jour a été effectuée avec succès.</p>
		</div>
	</div>
</div>
<!------------------------------------- -->