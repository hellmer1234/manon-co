<?php

require("initPage.php");

$articles = ArticleQuery::create()->limit(5)->find();
$tabArticles = array();
foreach ($articles as $myArticle)
{
    $tabArticles[count($tabArticles)] = array("id" => $myArticle->getIdarticle(), "libelle" => $myArticle->getLibellearticle(), "ref" => $myArticle->getReferencearticle());
}
$smarty->assign("Articles" , $tabArticles);

$articlesPromotion = ArticleQuery::create()->limit(5)->find();
$tabArticlesPromotion = array();
foreach ($articlesPromotion as $myArticlePromotion)
{
    $applipromos = $myArticlePromotion->getApplicationpromotions();
    foreach ($applipromos as $applipromo)
    {
        if (!is_null($applipromo->getIdpromo()))
        {
            $promo = $applipromo->getPromotion();
            if( ( $promo->getDatedebut("Y-m-d") < date("Y-m-d") ) && ( $promo->getDatefin("Y-m-d") > date("Y-m-d")) )
            {
                $tabArticlesPromotion[count($tabArticlesPromotion)] = array("id" => $myArticlePromotion->getIdarticle(), "libelle" => $myArticlePromotion->getLibellearticle(), "ref" => $myArticlePromotion->getReferencearticle());
            }
        }
    }


}
$smarty->assign("ArticlesPromotion" , $tabArticlesPromotion);

$smarty->display("./templates/index.tpl");

?>