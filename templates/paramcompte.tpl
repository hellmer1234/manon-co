
<div class="blockinfocompte">
    <h4>Informations</h4>

    {if $menuOK eq '1'}
        <ul>
            {foreach $ListeMenus as $Menu}
                <li><a href="index.php?section=user&amp;action={$Menu.action}">{$Menu.libelle}</a></li>
            {/foreach}

        </ul>
    {else}

        <br />


    {/if}

</div>