
<div class="blockcategorie">
    <h4>Catégories ({$nbCategories})</h4>


    <ul class="listecategorie">
        {foreach $Categories as $Categorie}
        <li><a href="index.php?section=catalogue&amp;categorie={$Categorie.id}">{$Categorie.libelle}</a></li>
        {/foreach}

    </ul>

</div>