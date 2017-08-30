<?php
$id_type = 8;
$manager = new ArticleManager($db);
$article = $manager->getAllArticles($id_type);
$nbr = count($article);
if(isset($_POST['formcible']))
{
	$id = $_POST['id'];
	$id_article = $article[$id]->id_article;
	$art = $manager->getArticle($id_article);
	print $art->nom;
}
?>

<div class="w3-padding-64">
	<!-- Barre de tri -->
	<div class="w3-content w3-container w3-round-large w3-padding-16 w3-red" style="margin-bottom:32px;">
		
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
				<form method="POST">
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