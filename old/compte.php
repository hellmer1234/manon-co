<?php
require ("initPage.php");

$smarty->assign("ListeMenus", array("libelle" => "MonCompte"));

$smarty->display("./templates/compte.tpl");

?>