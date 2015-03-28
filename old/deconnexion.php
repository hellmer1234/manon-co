<?php
require ("initPage.php");

$_SESSION['idclient'] = "";
$_SESSION['login'] = "";

session_destroy();

header("Location: index_old.php");

?>