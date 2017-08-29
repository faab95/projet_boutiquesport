<?php
if(isset($_POST['formtest']))
{
	$_nom = 'Collier';
	$_prenom = 'Fabian';
	$_rue = 'Rue Achille Delattre';
	$_num = '408';
	$_cp = '7390';
	$_ville = 'Quaregnon';
	$_mail = 'david@hotmail.com';
	$_mdp = 'mymdp';
	
	$client = new Client
	([
		'nom' => $_nom,
		'prenom' => $_prenom,
		'rue' => $_rue,
		'num' => $_num,
		'cp' => $_cp,
		'ville' => $_ville,
		'mail' => $_mail,
		'mdp' => $_mdp
	]);
	
	$manager = new ClientManager($db);
	$cli = $manager->getClient(2);
	print $cli[0]->prenom;
	
	//$manager->add($client);
}
?>

<div class="w3-padding-64">
	<div class="w3-content w3-container w3-center">
		<form method="POST">
			<button class="txtGras w3-button w3-red w3-hover-red w3-hover-shadow" type="submit" name="formtest">TEST</button>
		</form>
	</div>
</div>