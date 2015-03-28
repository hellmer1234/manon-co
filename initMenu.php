<?php
$tabMenu = array();
$tabMenu[count($tabMenu)] = array("libelle" => "Mon compte" , "action" => "compte");
$tabMenu[count($tabMenu)] = array("libelle" => "Mes commandes" , "action" => "commande");
$tabMenu[count($tabMenu)] = array("libelle" => "Mes adresses" , "action" => "adresses");
$this->_smarty->assign("ListeMenus", $tabMenu);

$this->_smarty->assign("menuOK" , 1);