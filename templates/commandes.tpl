{extends file="parent.tpl"}
{block name="content"}

<div class="col-xs-12 col-sm-6 col-md-6 col-lg-7">
	<h4>Mes commandes</h4>

	<div id="listeCommandes">

		<div class="row">
			<div class="col-xs12 col-sm-4 col-md-4 col-lg-4">
				Numéro de commande
			</div>
			<div class="col-xs12 col-sm-4 col-md-4 col-lg-4">
				État de la commande
			</div>
		</div>

		{foreach $Commandes as $cmde}
		<div class="row">
			<div class="col-xs12 col-sm-4 col-md-4 col-lg-4">
				{$cmde.numCommande}
			</div>
			<div class="col-xs12 col-sm-4 col-md-4 col-lg-4">
				{$cmde.etatCommande}
			</div>
			<div class="col-xs12 col-sm-4 col-md-4 col-lg-4">
			<a href="index.php?section=user&amp;action=consulterCommande&amp;commande={$cmde.numCommande}" class="btn btn-default">Consulter</a>
			</div>
		</div>
		{/foreach}
	</div>

</div>

{/block}

{block name="left"}
	{include file="paramcompte.tpl"}
{/block}

{block name="right_haut"}
	{include file="connexion.tpl"}
{/block}
