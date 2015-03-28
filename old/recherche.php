<?php

require("initPage.php");

$recherche = $_POST['recherche'];
$listeArticlesNom = array();
$listeArticlesDesc = array();
$listeArticlesRef = array();

if(isset($_POST['categorie'])){
	$idCategorie = intval($_POST['categorie']);
	$listeCat = CatalogueQuery::create()->findByIdCategorie($idCategorie);
	foreach($listeCat as $cat){
		$article = ArticleQuery::create()->filterByLibelleArticle("*$recherche*")->findPk($cat->getIdArticle());
		array_push($listeArticlesNom, $article);
		$article = ArticleQuery::create()->filterByDescriptionArticle("*$recherche*")->findPk($cat->getIdArticle());
		array_push($listeArticlesDesc, $article);
		$article = ArticleQuery::create()->filterByReferenceArticle("*$recherche*")->findPk($cat->getIdArticle());
		array_push($listeArticlesRef, $article);
	}
} else {
	$listeArticlesNom = ArticleQuery::create()->filterByLibelleArticle("*$recherche*")->find();
	$listeArticlesDesc = ArticleQuery::create()->filterByDescriptionArticle("*$recherche*")->find();
	$listeArticlesRef = ArticleQuery::create()->filterByReferenceArticle("*$recherche*")->find();

	$listeArticlesRef = ArticleQuery::create()->filterByReferenceArticle("*$recherche*")->find();
}
$catalogue = array();
$categories = array();

foreach ($listeArticlesNom as $article) {
	$catalogue[$article->getIdArticle()] = array("id" => $article->getIdArticle(), "nom" => $article->GetLibelleArticle(), "desc" => $article->getDescriptionArticle(), "prix" =>$article->getPrixHT());
}

foreach ($listeArticlesDesc as $article) {
	$catalogue[$article->getIdArticle()] = array("id" => $article->getIdArticle(), "nom" => $article->GetLibelleArticle(), "desc" => $article->getDescriptionArticle(), "prix" =>$article->getPrixHT());
}

foreach ($listeArticlesRef as $article) {
	$catalogue[$article->getIdArticle()] = array("id" => $article->getIdArticle(), "nom" => $article->GetLibelleArticle(), "desc" => $article->getDescriptionArticle(), "prix" =>$article->getPrixHT());
}

$smarty->assign('catalogue', $catalogue);
$smarty->assign('recherche', $recherche);

$smarty->display("./templates/recherche.tpl");

?>