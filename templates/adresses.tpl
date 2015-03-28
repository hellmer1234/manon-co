{extends file="parent.tpl"}
{block name="content"}

<div class="col-xs-12 col-sm-6 col-md-6 col-lg-7">
		<h4>Mes adresses</h4>

	<div id="listeAdresses">

		<div class="row">
			<div class="col-xs12 col-sm-3 col-md-3 col-lg-3">
				Type de l'adresse
			</div>
			<div class="col-xs12 col-sm-6 col-md-6 col-lg-6">
				Adresse
			</div>
		</div>

		{foreach $Adresses as $adr}
		<div class="row">
			<div class="col-xs12 col-sm-3 col-md-3 col-lg-3">
				{$adr.type}
			</div>
			<div class="col-xs12 col-sm-6 col-md-6 col-lg-6">
				{$adr.adresse}
			</div>
			<div class="col-xs12 col-sm-3 col-md-3 col-lg-3">
			<a href="index.php?section=user&amp;action=consulterAdresse&amp;adresse={$adr.id}" class="btn btn-default">Modifier l'adresse</a>
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
