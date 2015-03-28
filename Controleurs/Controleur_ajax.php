<?php
require_once 'Controleurs/controleur.php';

class Controleurajax implements ControleurMet
{

    private $_template;
    private $_smarty;

    public function __construct($smarty)
    {

        $this->_template = "./templates/ajax.tpl";
        $this->_smarty =$smarty;
    }

    public function defaultView()
    {
        $this->displayData("testLMR");
    }

    public function action()
    {
        
    }

    public function ajoutPanier(){
        $qte = $_POST['qte'];
        $id_article = $_POST['id_article'];
        $id_client = $_POST['id_client'];


        /*if($_SESSION['panier'] == 0){
            $_SESSION['panier'] = array('id' => $article, 'qte' => $qte);
        }*/

        $client = ClientQuery::create()->findPk($id_client);
        $id_commande = 0;
        foreach($client->getCommandes() as $commande)
        {
            if ($commande->getEtatcommande() != "Payee")
            {
                $id_commande = $commande->getIdcommande();

            }
        }
        if ($id_commande == 0)
        {
            $commandeToCreateOrUpdate = new Commande();
            $commandeToCreateOrUpdate->setIdclient($id_client);
            $commandeToCreateOrUpdate->setEtatcommande("Panier");
            $commandeToCreateOrUpdate->save();

            $panierToCreateOrUpdate = new Panier();
            $panierToCreateOrUpdate->setCommande($commandeToCreateOrUpdate);
            $panierToCreateOrUpdate->setIdarticle($id_article);
            $panierToCreateOrUpdate->setQuantite($qte);
            $panierToCreateOrUpdate->save();
        }
        else
        {
            $commandeToCreateOrUpdate = CommandeQuery::create()->findPk($id_commande);
            $panierToCreateOrUpdate = PanierQuery::create()->filterByIdarticle($id_article)
                ->filterByIdcommande($id_commande)->findOne();

            if (is_null($panierToCreateOrUpdate))
            {
                $panierToCreateOrUpdate = new Panier();
                $panierToCreateOrUpdate->setCommande($commandeToCreateOrUpdate);
                $panierToCreateOrUpdate->setIdarticle($id_article);
                $panierToCreateOrUpdate->setQuantite($qte);
            }
            else
            {
                $panierToCreateOrUpdate->setQuantite($panierToCreateOrUpdate->getQuantite() + $qte);
            }



            $panierToCreateOrUpdate->save();

        }

        $_SESSION['id_commande'] = $commandeToCreateOrUpdate->getIdcommande();


        $this->displayData("ajout_ok");
    }

    public function displayData($data)
    {
        $this->_smarty->assign("data" , $data);
        $this->_smarty->display($this->_template);
    }


}