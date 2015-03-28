<?php
require ("initPage.php");

$login = htmlspecialchars($_POST['login']);
$mdp = htmlspecialchars($_POST['mdp']);

$client = ClientQuery::create()->findOneByLogin($login);

if($client == NULL){
    echo "Le compte ou le mot de passe est erroné";
    exit;
}

if($client->GetMDP() != $mdp){
    echo "Le compte ou le mot de passe est erroné";
    exit;
}
//var_dump($client);

$_SESSION['idclient'] = $client->getIdClient();
$_SESSION['login'] = $client->getLogin();

header("Location: index_old.php");

?>