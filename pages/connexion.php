<?php
if(isset($_POST['formconnexion']))
{
	$email = $_POST['mailaddress'];
	$mdp = $_POST['pass'];
	$manager = new ClientManager($db);
	$client = $manager->getClient($email, $mdp);
	if($client != null)
	{
		$_SESSION['email'] = $client->email;
		$_SESSION['id'] = $client->id_client;
		print "<meta http-equiv=\"refresh\": Content=\"0;URL=index.php?page=accueil\">";
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
	<div class="w3-container w3-content " style="max-width : 550px">
		<h2 class="txtGras w3-center w3-padding-32">Connectez-vous à votre compte</h2>
		<div class="w3-border w3-shadow padding-form">
			<form method="POST">
				<div class="w3-row-padding">
					<p class="w3-col">
						<label class="w3-text-dark-gray">E-mail</label>
						<input style="border:none;background-color:#f1f1f1" class="w3-input w3-round" value="<?php if(isset($email)) {echo $email; }?>" type="email" required name="mailaddress"/>
					</p>
				</div>
				<div class="w3-row-padding">
					<p class="w3-col">
						<label class="w3-text-dark-gray">Mot de passe</label>
						<input style="border:none;background-color:#f1f1f1" class="w3-input w3-round" type="password" required name="pass"></input>
					</p>
				</div>
				<div class="w3-row-padding">
					<p class="w3-col">
					<button class="w3-input w3-section txtGras w3-button w3-red w3-hover-red w3-hover-shadow" type="submit" name="formconnexion">SE CONNECTER</button>
					</p>
				</div>
			</form>
			<div class="w3-row-padding w3-center w3-border-top w3-border-gray">
				<p class="w3-col w3-hover-text-red w3-small"><a href="index.php?page=inscription" class="noDeco">Pas encore de compte ? Inscrivez-vous !</a></p>
			</div>
		</div>
	</div>
</div>

<!-- Modal échec -->
<div id="id01" class="w3-modal">
	<div class="w3-modal-content w3-round-large">
		<header class="w3-container w3-black"> 
			<span onclick="id01.style.display='none'" class="w3-closebtn w3-hover-text-red">&times;</span>
			<h6><i class="fa fa-check-circle"></i> Echec d'authentification</h6>
		</header>
		<div class="w3-container">
			<p>Cette combinaison e-mail / mot de passe n'existe pas.<br/>Pensez à vous inscrire si vous ne l'êtes pas !</p>
		</div>
	</div>
</div>
<!------------------------------------- -->