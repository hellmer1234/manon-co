{extends file="parent.tpl"}
{block name="content"}

<div class="col-xs-12 col-sm-6 col-md-6 col-lg-7">
	<h4>{$nom}</h4>

	<input type="hidden" id="idarticle" value="{$id}" />

	<div class="row">
		
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-8">
			<div class="row">
				{$description}
			</div>
			<div class="row">
				En stock : <span id="stock">{$stock}</span> pièces
			</div>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
			<div class="row">
				<p class="prixarticle">{$prixht} € HT</p>
			</div>
		</div>

	</div>

	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 col-lg-offset-8 col-md-offset-6 col-sm-offset-6">

            {if $connected}
                <input type="number" size="5" min="0" name="qte{$id}" id="qte{$id}" value="0" class="input-number-panier"/>
                <a href="javascript:addItemToBasket({$id_client}, {$id})" class="btn btn-primary">Panier</a>
            {/if}

        </div>
	</div>

	{foreach from=$listeavis item=avis}
	<div class="row avis">
		<div class="infosAvis">Rédacteur : {$avis.redacteur}<br />
		Note : {$avis.note}</div>
		<p>{$avis.contenu}</p>
	</div>
	{/foreach}
</div>

{/block}

{block name="left"}
    {include file="categories.tpl"}
{/block}

{block name="right_haut"}
    {include file="connexion.tpl"}
{/block}

{block name="right_bas"}
    {include file="news.tpl"}
{/block}
