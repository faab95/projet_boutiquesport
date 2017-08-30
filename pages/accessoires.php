<?php
$id_type = 8;
$manager = new ArticleManager($db);
$article = $manager->getAllArticles($id_type);
$nbr = count($article);

if(isset($_POST['formcible']))
{
	$id = $_POST['id'];
	$id_article = $article[$id]->id_article;
	//$art = $manager->getArticle($id_article);
}
?>

<div class="w3-padding-64">
	<!-- Barre de tri -->
	<div class="w3-content w3-container w3-padding w3-round-small w3-dark-gray" style="margin-bottom:32px;">
		<div class="w3-container-display w3-row">
			<span class="w3-display-left">Il y a <?php print $nbr; ?> articles.</span>
			<div class="w3-display-right">
				<select class="w3-input w3-border" placeholder="Nom" required name="sujet">
					<option>Nom</option>
					<option>Prix décroissant</option>
					<option>Prix croissant</option>
				</select> 
			</div>
		</div>
	</div>
	<!------------------------------------- -->
	
	<!-- Articles -->
	<div class="w3-row w3-container">
	<?php
	for($i=0;$i<$nbr;$i++)
	{
		?>
		<div class="w3-quarter">
			<div class="w3-container w3-center">
				<form method="POST" action="index.php?page=cible">
					<div class="w3-display-container">
						<img class="w3-hover-shadow" src="images/accessoires/<?php echo $article[$i]->image?>" style="width:80%">
						<div class="w3-display-middle w3-display-hover">
							<button class="w3-button w3-black w3-hover-black" type="submit" name="formcible">Ajouter au panier <i class="fa fa-shopping-cart"></i></button>
						</div>
					</div>
					<p><?php echo $article[$i]->nom?><br/><span class="txtGras"><?php echo $article[$i]->prix?>€</span></p>
					<input style="display:none;"value="<?php print $i ;?>" name="id"/>
				</form>
			</div>
		</div>
		<?php
	}
	?>
	</div>
	<!------------------------------------- -->
</div>