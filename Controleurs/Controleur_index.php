<?php

require_once 'Controleurs/controleur.php';

class Controleurindex implements ControleurMet
{

    private $_template;
    private $_smarty;

    public function __construct($smarty)
    {

        $this->_template = "./templates/index.tpl";
        $this->_smarty =$smarty;
    }

    /*
     * Définition de la vue par défaut
     */
    public function defaultView()
    {

        if (isset($_SESSION["idclient"]))
        {
            $_SESSION['id_commande'] = 0;
            $client = ClientQuery::create()->findPk($_SESSION["idclient"]);
            foreach($client->getCommandes() as $commande)
            {
                if ($commande->getEtatcommande() != "Payee")
                {
                    $_SESSION['id_commande'] = $commande->getIdcommande();

                }
            }

        }

        $articles = ArticleQuery::create()->limit(5)->find();
        $tabArticles = array();
        foreach ($articles as $myArticle)
        {
            $tabArticles[count($tabArticles)] = array("id" => $myArticle->getIdarticle(), "libelle" => $myArticle->getLibellearticle(), "ref" => $myArticle->getReferencearticle(), "prix" => $myArticle->getPrixht());
        }
        $this->_smarty->assign("Articles" , $tabArticles);

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
                        $tabArticlesPromotion[count($tabArticlesPromotion)] = array("id" => $myArticlePromotion->getIdarticle(), "libelle" => $myArticlePromotion->getLibellearticle(), "ref" => $myArticlePromotion->getReferencearticle(), "prix" => $myArticlePromotion->getPrixht());
                    }
                }
            }
        }
        $this->_smarty->assign("ArticlesPromotion" , $tabArticlesPromotion);

        $this->_smarty->display($this->_template);

    }

}