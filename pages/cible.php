<?php
if(isset($_POST['id_article'])&&isset($_POST['id_type']))
{
	$id_article = $_POST['id_article'];
	$id_type = $_POST['id_type'];

	$path;

	$manager = new ArticleManager($db);
	$article = $manager->getArticle($id_article);
	$manager = new TailleManager($db);
	$taille = $manager->getAllTailles($id_type);
	$nbr = count($taille);
}


if(isset($_POST['formpanier']))
{
	$cpt = $_SESSION['panier'];
	$cpt++;
	$_SESSION['panier'] = $cpt;
	print "<meta http-equiv=\"refresh\": Content=\"0;URL=index.php?page=accueil\">";
}
?>

<div class="w3-padding-64">
	<div class="w3-container w3-content w3-center">
		<div class="w3-half w3-container">
			<?php
			switch($id_type)
			{
				case 1:
					$path = 'homme/pull/';
					break;
				case 2:
					$path = 'homme/tshirt/';
					break;
				case 3:
					$path = 'homme/polo/';
					break;
				case 4: 
					$path = 'homme/debardeur/';
					break;
				case 5: 
					$path = 'homme/training/';
					break;
				case 6:
					$path = 'homme/short/';
					break;
				case 7: 
					$path = 'chaussures/';
					break;
				case 8: 
					$path = 'accessoires/';
					break;
			}
			?>
			<img src="images/<?php print $path."".$article->image ?>" style="width:80%">
		</div>
		<div class="w3-half w3-left-align w3-container">
			<div class="w3-section">
				<h3 class="txtGras"> <?php print $article->marque ?></h3>
				<h4> <?php print $article->nom ?></h4>
				<h4 class="txtGras"> <?php print $article->prix ?>€ <span class="w3-text-gray w3-small" >TVA incluse</span></h4>
			</div>
			<div class="w3-section">
				<p class="w3-tiny">Tailles françaises</p>
				<select class="w3-input w3-border" placeholder="Nom" required name="sujet">
					<option selected label class="w3-text-gray">Votre taille</option>
					<?php
					for($i=0;$i<$nbr;$i++)
					{
						?><option><?php print $taille[$i]->taille ?></option><?php
					}
					?>
				</select> 
			</div>
			<div class="w3-section">
				<p class="txtGras w3-small"> <?php if($article->stock>0){print '<span class="w3-text-green">PRODUIT EN STOCK ('.$article->stock.')</span>';}else{print '<span class="w3-text-red">RUPTURE DE STOCK</span>';}?></p>
			</div>
			<form method="POST">
				<button class="txtGras w3-button w3-input w3-red w3-section w3-hover-red w3-hover-shadow" type="submit" name="formpanier"><i class="fa fa-shopping-cart"></i> AJOUTER AU PANIER</button>
			</form>
		</div>
	</div>
</div>