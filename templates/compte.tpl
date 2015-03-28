{extends file="parent.tpl"}
{block name="content"}

<div class="col-xs-12 col-sm-6 col-md-6 col-lg-7">
    <form method="POST" action="index.php?section=user&amp;action=modifierCompte">
    	<fieldset>

    		<legend>Résumé du compte</legend>

    		<div class="row">

    			<div id="erreur_catch" class="col-md-5  col-md-offset-4"  >

    			</div>
    		</div>

    		<div class="row">
    			<label class="col-md-4 control-label" for="textinput_email">Email</label>
    			<div class="col-md-8">
    				<input id="textinput_email" name="textinput_email" type="email" placeholder="" class="form-control input-md" value="{$Compte.login}" required readonly>

    			</div>
    		</div>

    		<div class="row">
    			<label class="col-md-4 control-label" for="passwordinput_saisie">Mot de passe actuel</label>
    			<div class="col-md-8">
    				<input id="passwordinput_saisie" name="passwordinput_saisie" type="password" placeholder="" class="form-control input-md" required>

    			</div>
    		</div>

    		<div class="row">
    			<label class="col-md-4 control-label" for="newpasswordinput_saisie">Nouveau mot de passe</label>
    			<div class="col-md-8">
    				<input id="newpasswordinput_saisie" name="newpasswordinput_saisie" type="password" placeholder="" class="form-control input-md">

    			</div>
    		</div>

    		<div class="row">
    			<label class="col-md-4 control-label" for="passwordinput_confirm">Confirmer le mot de passe</label>
    			<div class="col-md-8">
    				<input id="passwordinput_confirm" name="passwordinput_confirm" type="password" placeholder="confirmation" class="form-control input-md">

    			</div>
    		</div>

    		<div class="row">
    			<label class="col-md-4 control-label" for="textinput_nom">Nom</label>
    			<div class="col-md-8">
    				<input id="textinput_nom" name="textinput_nom" type="text" placeholder="" value="{$Compte.Nom}" class="form-control input-md">

    			</div>
    		</div>

    		<div class="row">
    			<label class="col-md-4 control-label" for="textinput_prenom">Prénom</label>
    			<div class="col-md-8">
    				<input id="textinput_prenom" name="textinput_prenom" type="text" placeholder="" value="{$Compte.Prenom}" class="form-control input-md">

    			</div>
    		</div>

    		<div class="row">
    			<label class="col-md-4 control-label" for="telephone">Numero de téléphone</label>
    			<div class="col-md-8">
    				<div class="input-group">
    					<input id="telephone" name="telephone" class="form-control" placeholder="numéro de téléphone" type="tel" value="{$Compte.Telephone}">
    				</div>
    			</div>
    		</div>

    		<div class="row">
    			<label class="col-md-4 control-label" for="button_annuler"></label>
    			<div class="col-md-8">
    				<button id="button_modifier" name="button_modifier" class="btn btn-success">Modifier</button>
    			</div>
    		</div>

    	</fieldset>
    </form>
</div>

{/block}

{block name="left"}
	{include file="paramcompte.tpl"}
{/block}

{block name="right_haut"}
	{include file="connexion.tpl"}
{/block}

{block name="right_bas"}
	{include file="news.tpl"}
{/block}