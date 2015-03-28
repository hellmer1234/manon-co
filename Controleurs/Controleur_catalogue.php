<?php
require_once 'Controleurs/controleur.php';

class Controleurcatalogue implements ControleurMet
{

    private $_template;
    private $_smarty;

    public function __construct($smarty)
    {

        $this->_template = "./templates/catalogue.tpl";
        $this->_smarty =$smarty;
        if (isset($_SESSION) and isset($_SESSION['idclient']))
        {
            $this->_smarty->assign('id_client', $_SESSION['idclient']);
        }

    }

    /*
     * Définition de la vue par défaut
     */
    public function defaultView(){

        $listeArticles = array();

        if(empty($_GET) || (isset($_GET['categorie']) && intval($_GET['categorie'])) == 0){
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

        $this->_smarty->assign('catalogue', $catalogue);

        $this->_smarty->display($this->_template);

    }

    public function filtre(){

        $listeArticles = array();

        if(empty($_POST) || (isset($_POST['categorie']) && intval($_POST['categorie'])) == 0){
            $listeArticles = ArticleQuery::create()->find();
        } else {
            $idCategorie = intval($_POST['categorie']);
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

        $this->_smarty->assign('catalogue', $catalogue);

        $this->_smarty->display($this->_template);

    }

    public function recherche()
    {

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

        $ids = array();

        foreach ($listeArticlesNom as $article)
        {
            if (!is_null($article))
            {
                if (!in_array($article->getIdArticle(), $ids))
                {
                    $ids[count($ids)] = $article->getIdArticle();
                    $catalogue[count($catalogue)] = array("id" => $article->getIdArticle(), "nom" => $article->GetLibelleArticle(), "desc" => $article->getDescriptionArticle(), "prix" =>$article->getPrixHT());
                }
            }

        }

        foreach ($listeArticlesDesc as $article)
        {
            if (!is_null($article))
            {
                if (!in_array($article->getIdArticle(), $ids))
                {
                    $ids[count($ids)] = $article->getIdArticle();
                    $catalogue[count($catalogue)] = array("id" => $article->getIdArticle(), "nom" => $article->GetLibelleArticle(), "desc" => $article->getDescriptionArticle(), "prix" =>$article->getPrixHT());
                }
            }
        }

        foreach ($listeArticlesRef as $article)
        {
            if (!is_null($article))
            {
                if (!in_array($article->getIdArticle(), $ids))
                {
                    $ids[count($ids)] = $article->getIdArticle();
                    $catalogue[count($catalogue)] = array("id" => $article->getIdArticle(), "nom" => $article->GetLibelleArticle(), "desc" => $article->getDescriptionArticle(), "prix" =>$article->getPrixHT());
                }
            }
        }

        $this->_smarty->assign('catalogue', $catalogue);
        $this->_smarty->assign('recherche', $recherche);

        $this->_smarty->display("./templates/recherche.tpl");
    }

    public function viewArticle(){

        $idarticle = intval($_GET["article"]); // Intval permet d'être sur d'avoir une valeur entière. Si conversion impossible, retourne 0

        $article = ArticleQuery::create()->findPk($idarticle);
        $this->_smarty->assign("id", $article->GetIdArticle());
        $this->_smarty->assign("refarticle", $article->GetReferenceArticle());
        $this->_smarty->assign("nom", $article->GetLibelleArticle());
        $this->_smarty->assign("description",$article->GetDescriptionArticle());
        $this->_smarty->assign("prixht",number_format($article->getPrixHT(), 2));
        $this->_smarty->assign("stock",$article->getQqteStock());

        $listeAvis = AvisQuery::create()->findByIdArticle($idarticle);
        $tabAvis = array();
        /*echo '<pre>';
        foreach($listeAvis as $avis){
            $tabAvis[count($tabAvis)] = array("redacteur" => $avis->getRedacteur(), "note" => $avis->getNote(), "contenu" => $avis->getDescriptionAvis());
        }
        echo '</pre>';*/
        $this->_smarty->assign("listeavis", $tabAvis);

        $this->_template = "./templates/fichearticle.tpl";

        $this->_smarty->display($this->_template);

    }

    public function action(){}
}