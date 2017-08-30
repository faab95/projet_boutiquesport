<?php
$id_type = 6;
$manager = new ArticleManager($db);
$article = $manager->getAllArticles($id_type);
$nbr = count($article);
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
				<div class="w3-display-container">
					<img class="w3-hover-shadow" src="images/homme/short/<?php echo $article[$i]->image?>" style="width:80%">
					<div class="w3-display-middle w3-display-hover">
						<form method="POST" action="index.php?page=cible">
							<button class="w3-button w3-black w3-hover-black">Ajouter au panier <i class="fa fa-shopping-cart"></i></button>
						<form>
					</div>
				</div>
					<p><?php echo $article[$i]->nom?><br><b><?php echo $article[$i]->prix?>€</b></p>
			</div>
		</div>
		<?php
	}
	?>
	</div>
	<!------------------------------------- -->
</div>