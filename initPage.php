<?php
session_start();
// Inclusion de Propel
require './vendor/autoload.php';

require_once './vendor/propel/propel1/runtime/lib/Propel.php';
// Initialisation de Propel avec le fichier de configuration
Propel::init("./propel/build/conf/lempiredesvis-conf.php");
// Rajout des classes générées dans le include path
set_include_path(dirname(__FILE__)."/Controleurs/" . PATH_SEPARATOR ."./propel/build/classes/" . PATH_SEPARATOR . get_include_path());

require("./vendor/smarty/smarty/libs/Smarty.class.php"); // On inclut la classe Smarty

$smarty = new Smarty();

$categories = CategorieQuery::create()->find();
$tabcategories = array();
foreach ($categories as $myCategorie)
{
    $tabcategories[count($tabcategories)] = array("id" => $myCategorie->getIdcategorie(), "libelle" => $myCategorie->getLibellecategorie());
}
$smarty->assign("Categories" , $tabcategories);
$smarty->assign(array("nbCategories" => count($categories)));

if(isset($_SESSION['idclient'])) {
	$smarty->assign("connected", true);
} else {
	$smarty->assign("connected", false);
}
?>