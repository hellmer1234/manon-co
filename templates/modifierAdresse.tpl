{extends file="parent.tpl"}
{block name="content"}

<div class="col-xs-12 col-sm-6 col-md-6 col-lg-7">
	<form method="POST" action="index.php?section=user&amp;action=modifierAdresse">
		<fieldset>

			<legend>Modification d'une adresse</legend>

            <input type="hidden" name="idadresse" value="{$Adresse.id}" />

			<div class="row">
				<label class="col-md-4 control-label" for="numerorue">Numéro de rue</label>
				<div class="col-md-8">
					<input id="numerorue" name="numerorue" type="number" placeholder="N° de rue" class="form-control input-md" value="{$Adresse.numrue}" required>

				</div>
			</div>

			<div class="row">
				<label class="col-md-4 control-label" for="rue">Rue</label>
				<div class="col-md-8">
					<input id="rue" name="rue" type="text" placeholder="Rue" class="form-control input-md" value="{$Adresse.rue}" required>

				</div>
			</div>

			<div class="row">
				<label class="col-md-4 control-label" for="codepostal">Code postal</label>
				<div class="col-md-8">
					<input id="codepostal" name="codepostal" type="text" placeholder="Code Postal" value="{$Adresse.codepostal}" class="form-control input-md">

				</div>
			</div>

			<div class="row">
				<label class="col-md-4 control-label" for="ville">Ville</label>
				<div class="col-md-8">
					<input id="ville" name="ville" type="text" placeholder="" value="{$Adresse.ville}" class="form-control input-md">

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