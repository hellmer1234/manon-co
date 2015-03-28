<?php

require ("initPage.php");

$listeArticles = array();

if(empty($_GET) || intval($_GET['categorie']) == 0){
	$listeArticles = ArticleQuery::create()->find();
} else {
	$idCategorie = intval($_GET['categorie']);
	$listeCat = CatalogueQuery::create()->findByIdCategorie($idCategorie);
	foreach($listeCat as $cat){
		$article = ArticleQuery::create()->findPk($cat->getIdArticle());
		array_push($listeArticles, $article);
	}
}
$catalogue = array();
$categories = array();

foreach ($listeArticles as $article) {
	$catalogue[count($catalogue)] = array("id" => $article->getIdArticle(), "nom" => $article->GetLibelleArticle(), "desc" => $article->getDescriptionArticle(), "prix" =>$article->getPrixHT());
}

$smarty->assign('catalogue', $catalogue);

$smarty->display("./templates/catalogue.tpl");

?>