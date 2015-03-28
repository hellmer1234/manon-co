{extends file="parent.tpl"}
{block name="content"}

<div class="col-xs-12 col-sm-6 col-md-6 col-lg-7" id="catalogue">
	<h4>Catalogue</h4>

	<div class="row catalogue-filters">
		<form action="?section=catalogue&amp;action=filtre" method="post">
			<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
				<label for="categorie">Catégorie</label>
				<select name="categorie" id="categorie" class="form-control">
						<option value="0">Tout</option>
					{foreach $Categories as $Categorie}
						<option value="{$Categorie.id}">{$Categorie.libelle}</option>
					{/foreach}
				</select>
			</div>
			<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
				
			</div>
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
				<input type="submit" value="Filtrer" class="btn" />
			</div>
		</form>
	</div>
	
		
	
	{foreach from=$catalogue item=produit}
	<div class="row catalogue-item">
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
			<p><a class="item-titre" href="index.php?section=catalogue&amp;action=viewArticle&amp;article={$produit.id}">{$produit.nom}</a><br />
			{$produit.desc}</p>
		</div>
		<div class="col-xs-12 col-sm-5 col-md-5 col-lg-4">
			<p class="item-prix">{$produit.prix} € HT</p>

            {if $connected}
            <p>
	            <input type="number" size="5" min="0" name="qte{$produit.id}" id="qte{$produit.id}" value="0" class="input-number-panier"/>
				<a href="javascript:addItemToBasket({$id_client}, {$produit.id})" class="btn btn-primary">Panier</a>
			</p>
                {/if}

		</div>
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