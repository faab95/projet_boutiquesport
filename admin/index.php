<?php
include ('../lib/php/liste_include.php');
$db = Connexion::getInstance($dsn, $user, $pass);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>BACK-OFFICE</title>
		<link rel="icon" href="../images/favicon.ico" />
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>
	</head>
	<style>
	textarea 
	{
		height : 150px;
		resize: none;
	}
	</style>
	<body>
		<!-- HEADER ---------------------------------------------------------------->
		<div class="w3-padding" style="background-color:#f9de51"></div>
		<div class="w3-container w3-padding" style="background-color:#37464d"> 
			<h3 class="w3-left w3-text-white" style="font-weight:bold"><span style="color:#f9de51">BACK</span>OFFICE</h3>
		</div>
		<div class="w3-container w3-padding-32 w3-center" style="background-color:#41535d;box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);">
				<a href="#client" class="w3-button w3-round-large w3-opacity w3-section w3-hover-shadow" style="width:150px;font-weight:bold">CLIENT</a>
				<a href="#article" class="w3-button w3-round-large w3-opacity w3-section w3-hover-shadow" style="width:150px;font-weight:bold">ARTICLE</a>
		</div>
		<!-------------------------------------------------------------------------->
		
		<!-- CONTENT --------------------------------------------------------------->
		<div class="w3-content w3-padding-64">
		
			<!-- CLIENT ---------------------------------------------------------->
			<?php
			if(isset($_POST['formclient']))
			{
				$id = $_POST['id_client'];
				$manager = new ClientManager($db);
				$client = $manager->getClientById($id);
				if($client != null)
				{
					$verif = $manager->del($id);
					if($verif == 1)
					{
						?>
						<script type="text/javascript">
						alert("Client supprimé avec succès !");
						</script>	
						<?php
					}
					else
					{
						?>
						<script type="text/javascript">
						alert("Erreur lors de la suppression du client !");
						</script>	
						<?php
					}
				}
				else
				{
					?>
						<script type="text/javascript">
						alert("Ce client n'existe pas !");
						</script>	
						<?php
				}
			}
			
			?>
			<div class="w3-padding-32">
				<header id="client" class="w3-container w3-round w3-text-white" style="background-color:#41535d">
					<h3>CLIENT</h3>
				</header>
				<div class="w3-margin-top">
					
					<form method="POST">
						<input class="w3-input w3-border" placeholder="ID du client à supprimer" type="text" name="id_client" value=""/>
						<br/>
						<button class="w3-block w3-section w3-button w3-round" style="font-weight:bold" type="submit" name="formclient" ><i class="fa fa-trash"></i> SUIVANT</button>
					</form>
				</div>
			</div>
			<!-------------------------------------------------------------------------->
			
			<!-- ARTICLE ---------------------------------------------------------->
			<?php
			if(isset($_POST['formarticle']))
			{
				$id = $_POST['id_article'];
				$manager = new ArticleManager($db);
				$article = $manager->getArticle($id);
				if($article != null)
				{
					$verif = $manager->del($id);
					if($verif == 1)
					{
						?>
						<script type="text/javascript">
						alert("Article supprimé avec succès !");
						</script>	
						<?php
					}
					else
					{
						?>
						<script type="text/javascript">
						alert("Erreur lors de la suppression de l'article !");
						</script>	
						<?php
					}
				}
				else
				{
					?>
						<script type="text/javascript">
						alert("Cet article n'existe pas !");
						</script>	
						<?php
				}
			}
			
			?>
			<div class="w3-padding-32">
				<header id="article" class="w3-container w3-round w3-text-white" style="background-color:#41535d">
					<h3>ARTICLE</h3>
				</header>
				<div class="w3-margin-top">
					<form method="POST">
						<input class="w3-input w3-border" placeholder="ID de l'article à supprimer" type="text" name="id_article" value=""/>
						<br/>
						<button class="w3-block w3-section w3-button w3-round" style="font-weight:bold" type="submit" name="formarticle" ><i class="fa fa-trash"></i> SUIVANT</button>
					</form>
				</div>
			</div>
			<!-------------------------------------------------------------------------->
			
		</div>
		<!-------------------------------------------------------------------------->
		<footer class="w3-container w3-padding-32 w3-black w3-center">
			<a href="../index.php?page=accueil">Accès au site</a>
		</footer>
	</body>
</html>