<div class="w3-padding-64">
	<!-- Barre de tri -->
	<div class="w3-content w3-container w3-round-large w3-padding-16 w3-red" style="margin-bottom:32px;">
		
	</div>
	<!------------------------------------- -->
	
	<!-- Articles -->
	<div class="w3-row w3-grayscale w3-container">
	<?php
	for($i=0;$i<8;$i++)
	{
		?>
		<div class="w3-quarter">
			<div class="w3-container">
				<div class="w3-display-container w3-hover-shadow">
					<img src="images/sac.jpg" style="width:100%">
					<div class="w3-display-middle w3-display-hover">
						<form method="POST" action="index.php?page=cible">
							<button class="w3-button w3-black w3-hover-black">Ajouter au panier <i class="fa fa-shopping-cart"></i></button>
						<form>
					</div>
				</div>
				<p>Sac à bandouillères<br><b>20.00€</b></p>
			</div>
		</div>
		<?php
	}
	?>
	</div>
	<!------------------------------------- -->
</div>