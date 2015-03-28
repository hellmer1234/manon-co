{extends file="parent.tpl"}
{block name="content"}

<div class="col-xs-12 col-sm-6 col-md-6 col-lg-7">
	<h4>Mes commandes</h4>

	<div id="listeCommandes">

		<div class="row">
			<div class="col-xs12 col-sm-3 col-md-3 col-lg-3">
				Libellé du produit
			</div>
			<div class="col-xs12 col-sm-3 col-md-3 col-lg-3">
				Prix H.T.
			</div>
			<div class="col-xs12 col-sm-3 col-md-3 col-lg-3">
				Quantité
			</div>
			<div class="col-xs12 col-sm-3 col-md-3 col-lg-3">
				Prix Total H.T.
			</div>
		</div>

		{foreach $Produits as $prdt}
		<div class="row">
			<div class="col-xs12 col-sm-3 col-md-3 col-lg-3">
				<a href="index.php?section=catalogue&amp;action=viewArticle&amp;article={$prdt.id}">{$prdt.libelle}</a>
			</div>
			<div class="col-xs12 col-sm-3 col-md-3 col-lg-3">
				{$prdt.prixht} €
			</div>
			<div class="col-xs12 col-sm-3 col-md-3 col-lg-3">
				{$prdt.qte}
			</div>
			<div class="col-xs12 col-sm-3 col-md-3 col-lg-3">
				{$prdt.prixtotal} €
			</div>
		</div>
		{/foreach}
	</div>

	<div class="row">
		<a href="index.php?section=user&amp;action=commande" class="btn btn-default">« Retour aux commandes</a>
	</div>

</div>

{/block}

{block name="left"}
	{include file="paramcompte.tpl"}
{/block}

{block name="right_haut"}
	{include file="connexion.tpl"}
{/block}
