<?php
require 'vendor/autoload.php';
$app = new \Slim\Slim();

$app->get('/transaction/:id',  'getTransaction');
$app->get('/transaction/:id/:montant',  'payTransaction');

function getTransaction($id)
{
    echo $id ;
}

function payTransaction($id, $montant)
{
    echo $id . "-" . (100 * $montant) . "-" . date("Y-m-d");
}


$app->run();