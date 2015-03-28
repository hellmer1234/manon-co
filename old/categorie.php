<?php

require("./vendor/smarty/smarty/libs/Smarty.class.php"); // On inclut la classe Smarty


$smarty = new Smarty();

include('conf.inc.php');
try{
	$dsn = "mysql:host=localhost;port=3306;dbname=$db";
	
	$pdo = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
} catch (PDOException $e){
	die('Erreur : ' . $e->getMessage());
}

$catalogue = array();
$categories = array();

$request = "SELECT * FROM categorie";

$stmt = $pdo->query($request);
while($row = $stmt->fetch()) {
	$categories[$row['idcategorie']] = array('id' => $row['idcategorie'], 'nom' => $row['libellecategorie']);
}

if(empty($_POST) || $_POST['categorie'] == 0)
{
	$request = "SELECT referencearticle as ref, libellearticle as nom, descriptionarticle as `desc`, prixht FROM article";
} else {
	$request = "SELECT referencearticle as ref, libellearticle as nom, descriptionarticle as `desc`, prixht FROM article WHERE idarticle IN (SELECT idarticle FROM catalogue WHERE idcategorie = " . $_POST['categorie'] . ")";
}

$stmt = $pdo->query($request);
while($row = $stmt->fetch()) {
	$catalogue[$row['ref']] = array('nom' => $row['nom'], 'desc' => $row['desc'], 'prix' => number_format($row['prixht'], 2) . ' € HT');
}

$smarty->assign('catalogue', $catalogue);

$smarty->assign('categories', $categories);

$smarty->display("./templates/catalogue.tpl");

?>