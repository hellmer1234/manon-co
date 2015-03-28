<?php
require_once 'Controleurs/controleur.php';

class Controleurpanier implements ControleurMet
{

    private $_template;
    private $_smarty;

    public function __construct($smarty)
    {

        $this->_template = "./templates/panier_full.tpl";
        $this->_smarty =$smarty;
    }

    /*
     * Définition de la vue par défaut
     */
    public function defaultView(){

        if (isset($_GET["id_commande"]))
        {
            $id = $_GET["id_commande"];
        }
        else
        {
            $id = null;
        }
        $this->composePanier($id);

        include "initMenu.php";

        $this->_smarty->assign("idCommande" , $id);


        $this->_smarty->display($this->_template);

    }

    public function payer()
    {
        $commande = CommandeQuery::create()->findPk($_POST["id_commande"]);

        if ($commande->getEtatcommande() != "Payee")
        {

        $contexte =  explode('/' , $_SERVER["REQUEST_URI"] );

        $url = "http://".$_SERVER["SERVER_NAME"].":". $_SERVER["SERVER_PORT"] ."/" . $contexte[1] . "/slim_webservice.php/transaction/";
        $url = $url . $_POST["id_commande"] ."/" . $_POST["montant"];
        $data = "";
        $opts = array(
            'http'=>array(
                'method'=>"GET",
                'header'=>"User-Agent:Client RestFul\r\n",
                'header'=>"Content-Type: multipart/form-data\r\n",
                "Content-length: " . strlen($data)."\r\n",
                'content'=>$data
            )
        );
        $context = stream_context_create($opts);
        $fp = fopen($url, 'r', false, $context);
        $res = fread($fp, 512);



        $this->_smarty->assign("myUrl" , $url);

        $commande->setEtatcommande("Payee");
        $commande->save();
        }
        else
        {
            $res = "Commande déja payée";
        }

        $this->composePanier($_POST["id_commande"]);
        $this->_smarty->assign("panierOK" , 1);
        $this->_smarty->assign("refTransaction" , $res);
        $this->_smarty->assign("idCommande" , $_POST["id_commande"]);
        $this->_smarty->assign("idEtat" , "-3");

        $_SESSION['id_commande'] = 0;

            $this->_smarty->display($this->_template);
    }

    public function composePanier($id_commande)
    {


        $id = $id_commande;
        $paniers = (!is_null($id_commande) ? PanierQuery::create()->findByIdcommande($id) : array());


        $tabpaniers = array();
        $total_panier = 0;
        $nb_articles = 0;
        foreach ($paniers as $item)
        {
            $id_article = $item->getIdarticle();
            $article = ArticleQuery::create()->findPk($id_article);
            $qte = $item->getQuantite();
            $prixTTC = $article->getPrixht() * (1 +$article->getTauxtva()->getTauxtva());
            $prixTotal = $qte * $prixTTC;
            $total_panier = $total_panier + $prixTotal;
            $nb_articles = $nb_articles + $qte;
            $tabpaniers[count($tabpaniers)] = array("qte" => $qte, "id_article" => $id_article,
                "prix" => $article->getPrixht(), "ref"=> $article->getReferencearticle(),
                "desc"=> $article->getDescriptionarticle(), "nom"=> $article->getLibellearticle(),
                "prixTTC" => $prixTTC, "total" => $prixTotal);
        }

        include "initMenu.php";

        $this->_smarty->assign("panierOK" , 1);
        $this->_smarty->assign("totalPanier" , $total_panier);
        $this->_smarty->assign("nbArticles" , $nb_articles);

        $commande = CommandeQuery::create()->findPk($id_commande);
        if ($commande->getEtatcommande() == "Payee")
        {
            $this->_smarty->assign("idEtat" , "-2");
        }
        else
        {
            $this->_smarty->assign("idEtat" , "0");
        }



        $this->_smarty->assign("Items" , $tabpaniers);
    }


}