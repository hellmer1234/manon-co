{extends file="parent.tpl"}
{block name="content"}

    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-7" id="panier">
        <h4>Panier</h4>



        <div class="row panier-item">
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-6">
                <p>Désignation du produit</p>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
                <p>Prix unitaire</p>
            </div>
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                <p>Quantité</p>

            </div>
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                <p>Prix total</p>

            </div>
        </div>


        {foreach from=$Items item=produit}
            <div class="row panier-item">
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-6">
                    <p><a class="item-titre" href="index.php?section=catalogue&amp;action=viewArticle&amp;article={$produit.id_article}">{$produit.nom}</a><br />
                        {$produit.desc}</p>
                </div>
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
                    <p>{$produit.prix} € HT / <br />
                        {$produit.prixTTC} € TTC
                    </p>
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                    <p>{$produit.qte}</p>

                </div>
                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                    <p>{$produit.total}</p>

                </div>
            </div>
        {/foreach}
    </div>

{/block}

{block name="left"}
    {include file="paramcompte.tpl"}
{/block}

{block name="left_bas"}
    {include file="categories.tpl"}
{/block}


{block name="right_haut"}
    {include file="panier.tpl"}
{/block}
