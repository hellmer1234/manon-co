<div class="blockconnexion">
    <h4>Compte client</h4>
    {if !$connected}
    <form action="index.php?section=user&amp;action=connexion" method="post">
    	<label for="login">Identifiant : </label><br /><input type="email" class="form-control input-md" name="login" id="login" required /><br />
    	<label for="mdp">Mot de passe : </label><br /><input type="password" class="form-control input-md" name="mdp" id="mdp" required /><br />
    	<input class="btn btn-primary" type="submit" value="Se connecter" />
    	<a href="index.php?section=user&amp;action=inscription" class="btn btn-default">S'inscrire</a>
    </form>
    {else}
    <h5>Bonjour {$smarty.session.prenom} {$smarty.session.nom}</h5>
        {if {$smarty.session.id_commande} ne 0}
            <a href="index.php?section=panier&amp;id_commande={$smarty.session.id_commande}" class="btn btn-default">Votre panier</a>
        {/if}
        <a href="index.php?section=user&amp;action=deconnexion" class="btn btn-default">Se déconnecter</a>
    {/if}
    
</div>