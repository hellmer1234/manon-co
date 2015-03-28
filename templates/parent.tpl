<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>L'empire des vis - Accueil</title>

		<script type="text/javascript" src="./resources/jquery/js/jquery.min.js"></script>
		<script type="text/javascript" src="./resources/bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src="./resources/js/global.js"></script>

		<link rel="stylesheet" href="./resources/jquery/css/jquery.min.css">
		<link rel="stylesheet" href="./resources/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="./resources/css/web.css">

	</head>
	<body>

	<div class="container">

		<header class="row" style="border:1px solid #ddd;">
			<div style="height:90px;">
				<h1><a href="index.php"><img src="Pictures/Banniere_bleue.jpg" alt="L'Empire des Vis"/> </a></h1>
			</div>
		</header>

		<nav class="navbar navbar-default" role="navigation">
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<form class="navbar-form navbar-left" role="search" action="index.php?section=catalogue&amp;action=recherche" method="POST">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Rechercher" name="recherche" id="recherche">
					</div>
					<button type="submit" class="btn btn-default glyphicon glyphicon-search"> Rechercher...</button>
				</form>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.php">Accueil</a></li>
					<li><a href="index.php?section=catalogue">Catalogue</a></li>
					{if $connected}
					<li><a href="index.php?section=user&amp;action=compte">Compte</a></li>
					{else}
					<li><a href="#">Panier</a></li>
					{/if}
					<li><a href="#">L'Empire des Vis</a></li>
					<li><a href="#">Contactez nous</a></li>

				</ul>
			</div>
		</nav>

		<div class="row" style="border:1px solid #ddd;">
			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
				{block name="left"}
					{$smarty.block.child}
				{/block}

				{block name="left_bas"}
					{$smarty.block.child}
				{/block}

			</div>

			{block name="content"}
				{$smarty.block.child}
			{/block}

			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
				{block name="right_haut"}
					{$smarty.block.child}
				{/block}


				{block name="right_bas"}
					{$smarty.block.child}
				{/block}

			</div>

		</div>

		<footer class="row" style="border:1px solid #ddd;">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-lg-offset-0"
				 style="background-color:rgb(230,230,230);height:100px;">
				<h6>Site réalisé par Louis-Marie RICHARD et Eloïse FAUST</h6>
			</div>
		</footer>

	</div>

	</body>
</html>