<?php

require("./vendor/smarty/smarty/libs/Smarty.class.php"); // On inclut la classe Smarty

$smarty = new Smarty();

$smarty->display("./templates/inscription.tpl");

?>