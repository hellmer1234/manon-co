{extends file="parent.tpl"}
{block name="content"}

<div class="container col-xs-12 col-sm-9 col-md-9 col-lg-6"
     style="background-color:orange;">
    <h3>Articles</h3>

    - <strong>{$ma_variable}</strong> <br />


    - {$une_variable} <br />
    - {$une_autre_variable}


    <div class="container col-xs-12 col-sm-3 col-md-3 col-lg-11 col-lg-offset-0"
         style="background-color:indianred;">
        <h4>Promotions en cours</h4>

        <div style="background-color:greenyellow;height:20px;">Article 1
        </div>
        <div style="background-color:yellowgreen;height:20px;">Article 2
        </div>
        <div style="background-color:greenyellow;height:20px;">Article 3
        </div>
    </div>

    <div class="container col-xs-12 col-sm-3 col-md-3 col-lg-11 col-lg-offset-1"
         style="background-color:skyblue;">
        <h4>Récemment ajoutés</h4>

        <div style="background-color:yellowgreen;height:20px;">Article 1
        </div>
        <div style="background-color:greenyellow;height:20px;">Article 2
        </div>
        <div style="background-color:yellowgreen;height:20px;">Article 3
        </div>
    </div>
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