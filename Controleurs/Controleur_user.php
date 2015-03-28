<?php
require_once 'Controleurs/controleur.php';

class Controleuruser implements ControleurMet
{

	private $_template;
	private $_smarty;

	public function __construct($smarty)
	{

		$this->_template = "./templates/compte.tpl";
		$this->_smarty =$smarty;
	}

	/*
	 * Définition de la vue par défaut
	 */
	public function defaultView()
	{
		$this->compte();
	}

	public function inscription()
	{
		$this->_template = "./templates/inscription.tpl";
		$this->_smarty->display($this->_template);
	}

	public function validerInscription()
	{
		$client = new Client();
		$adresse = new Adresse();
		$client->setLogin($_POST['textinput_email']);
		$client->setMDP($_POST['passwordinput_saisie']);
		$client->setNom($_POST['textinput_nom']);
		$client->setPrenom($_POST['textinput_prenom']);
		$client->setNumTelephone($_POST['telephone']);

		$adresse->setNumeroRue($_POST['textinput_numrue']);
		$adresse->setRue($_POST['textinput_adresse']);
		$adresse->setCodePostal($_POST['textinput_codePostal']);
		$adresse->setVille($_POST['textinput_ville']);
		$adresse->setTypeAdresse("Facturation");

		$client->addAdresse($adresse);
		$client->save();

		$this->connexion($_POST['textinput_email'], $_POST['passwordinput_saisie']);
	}

	public function connexion($identifiant = "", $pass = "")
	{
		if($identifiant == "" && $pass == ""){
			$login = htmlspecialchars($_POST['login']);
			$mdp = htmlspecialchars($_POST['mdp']);
		} else {
			$login = $identifiant;
			$mdp = $pass;
		}

		$client = ClientQuery::create()->findOneByLogin($login);

		if($client == NULL){
			echo "Le compte ou le mot de passe est erroné";
			exit;
		}

		if($client->GetMDP() != $mdp){
			echo "Le compte ou le mot de passe est erroné";
			exit;
		}

		$_SESSION['idclient'] = $client->getIdClient();
		$_SESSION['login'] = $client->getLogin();
		$_SESSION['nom'] = $client->getNom();
		$_SESSION['prenom'] = $client->getPrenom();
		$_SESSION['panier'] = 0;
        $_SESSION['id_commande'] = 0;

        foreach($client->getCommandes() as $commande)
        {
            if ($commande->getEtatcommande() != "Payee")
            {
                $_SESSION['id_commande'] = $commande->getIdcommande();

            }
        }

		header("Location: index.php");
	}

	public function deconnexion()
	{
		$_SESSION['idclient'] = "";
		$_SESSION['login'] = "";
		$_SESSION['nom'] = "";
		$_SESSION['prenom'] = "";
		session_destroy();

		header("Location: index.php");
	}

	public function compte()
	{
		include "initMenu.php";

		$client = ClientQuery::create()->findPk($_SESSION['idclient']);
		$this->_smarty->assign("ListeMenus", $tabMenu);
		$compte = array(
			"login" => $client->getLogin(),
			"Nom" => $client->getNom(), 
			"Prenom" => $client->getPrenom(), 
			"Telephone" => $client->getNumTelephone()
		);
		$this->_smarty->assign("Compte", $compte);
		$this->_smarty->assign("panierOK" , 0);
		$this->_smarty->assign("menuOK" , 1);
		$this->_template = "./templates/compte.tpl";
		$this->_smarty->display($this->_template);
	}

	public function modifierCompte()
	{
		$login = htmlspecialchars($_POST['textinput_email']);
		$client = ClientQuery::create()->findOneByLogin($login);
		$client->setLogin($_POST['textinput_email']);
		if($_POST['newpasswordinput_saisie'] != "")
			$client->setMDP($_POST['newpasswordinput_saisie']);
		$client->setNom($_POST['textinput_nom']);
		$client->setPrenom($_POST['textinput_prenom']);
		$client->setNumTelephone($_POST['telephone']);
		$client->save();

		header("Location: index.php?section=user&action=compte");
	}

	public function commande()
	{
		include "initMenu.php";
        $commandes = array();
		$client = ClientQuery::create()->findPk($_SESSION['idclient']);
		$commandesClient = $client->getCommandes();
		foreach ($commandesClient as $cmde) {
			$commandes[count($commandes)] = array('numCommande' => $cmde->getIdCommande(), 'etatCommande' => $cmde->getEtatCommande());
		}
		$this->_smarty->assign('Commandes', $commandes);
		$this->_template = "./templates/commandes.tpl";
		$this->_smarty->display($this->_template);
	}

	public function consulterCommande()
	{
		include "initMenu.php";
		$idCommande = intval($_GET['commande']);
		$panier = PanierQuery::create()->findByIdCommande($idCommande);
		$produits = array();
		foreach ($panier as $panierItem) {
			$produit = ArticleQuery::create()->findPk($panierItem->getIdArticle());
			$produits[$panierItem->getIdArticle()] = array('id' => $panierItem->getIdArticle(), 'libelle' => $produit->getLibelleArticle(), 'prixht' => number_format($produit->getPrixHt(), 2), 'qte' => $panierItem->getQuantite(), 'prixtotal' => number_format($panierItem->getQuantite() * $produit->getPrixHt(), 2));
		}
		$this->_smarty->assign('Produits', $produits);
		$this->_template = "./templates/detailCommande.tpl";
		$this->_smarty->display($this->_template);
	}

	public function adresses(){
		include "initMenu.php";
		$client = ClientQuery::create()->findPk($_SESSION['idclient']);
		$adressesClient = $client->getAdresses();

		$adresses = array();

		foreach ($adressesClient as $adr) {
			$adresses[$adr->getIdAdresse()] = array('id' => $adr->getIdAdresse(), 'type' => $adr->getTypeAdresse(), 'adresse' => $adr->getNumeroRue() . " " . $adr->getRue() . " " . $adr->getCodePostal() . " " . $adr->getVille());
		}

		$this->_smarty->assign('Adresses', $adresses);
		$this->_template = "./templates/adresses.tpl";
		$this->_smarty->display($this->_template);
	}


	public function consulterAdresse(){
		include "initMenu.php";
		$idAdresse = intval($_GET['adresse']);
		$adresse = AdresseQuery::create()->findPk($idAdresse);
		$adr = array('id' => $adresse->getIdAdresse(), 'numrue' => $adresse->getNumeroRue(), 'rue' => $adresse->getRue(), 'codepostal' => $adresse->getCodePostal(), 'ville' => $adresse->getVille());
		$this->_smarty->assign('Adresse', $adr);
		$this->_template = "./templates/modifierAdresse.tpl";
		$this->_smarty->display($this->_template);
	}

	public function modifierAdresse(){
		$idAdresse = intval($_POST['idadresse']);
		$adresse = AdresseQuery::create()->findPk($idAdresse);
		$adresse->setNumeroRue($_POST['numerorue']);
		$adresse->setRue($_POST['rue']);
		$adresse->setCodePostal($_POST['codepostal']);
		$adresse->setVille($_POST['ville']);
		$adresse->save();
		header("Location: index.php?section=user&action=adresses");
	}
}