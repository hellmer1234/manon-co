<div style="background-color:skyblue;">
    <h4>Informations</h4>

    {if $panierOK eq '1'}
        Prix total : {$totalPanier} € TTC <br />
        Nombre d'articles : {$nbArticles} <br />

        {if $idCommande neq '-1'}
            {if $idEtat gt '-2'}
            <form action="index.php?section=panier&amp;action=payer&amp;id_commande={$idCommande}" method="post">
                <input type="hidden" class="form-control input-md" name="id_commande" id="id_commande"  value="{$idCommande}" required />
                <input type="hidden" class="form-control input-md" name="montant" id="montant"  value="{$totalPanier}" required />
                <input class="btn btn-primary" type="submit" value="Payer" />
            </form>
            {/if}
        {/if}

        {if $idEtat le '-2'}
            La commande {$idCommande} a été payée. <br />
        {/if}
        {if $idEtat le '-3'}
        La référence de la transaction est : <br />
        {$refTransaction}
        {/if}
    {else}

        <br />

    {/if}

</div>