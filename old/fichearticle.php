<?php

require ("initPage.php");

$idarticle = intval($_GET["article"]); // Intval permet d'être sur d'avoir une valeur entière. Si convertion impossible, retourne 0

$article = ArticleQuery::create()->findPk($idarticle);

$smarty->assign("refarticle", $article->GetReferenceArticle());
$smarty->assign("nom", $article->GetLibelleArticle());
$smarty->assign("description",$article->GetDescriptionArticle());
$smarty->assign("prixht",number_format($article->getPrixHT(), 2));
$smarty->assign("stock",$article->getQqteStock());

$listeAvis = AvisQuery::create()->findByIdArticle($idarticle);
$tabAvis = array();
echo '<pre>';
foreach($listeAvis as $avis){
	$tabAvis[count($tabAvis)] = array("redacteur" => $avis->getRedacteur(), "note" => $avis->getNote(), "contenu" => $avis->getDescriptionAvis());
}
echo '</pre>';
$smarty->assign("listeavis", $tabAvis);

$smarty->display("./templates/fichearticle.tpl");

?>