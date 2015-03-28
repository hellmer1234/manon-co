<?php

require_once ("initPage.php");

ob_start();
if(isset($_GET['section']))
{    $section=$_GET['section']; }
else
{    $section = 'index';}

$controleur_file = dirname(__FILE__).'/Controleurs/Controleur_'.$section.'.php';

//echo $controleur_file;

if(is_file($controleur_file))
{
    include $controleur_file;
    $controleur='Controleur'.$section;
}
if(class_exists($controleur))
{
    $c=new $controleur($smarty);
    if(isset($_GET['action'])){
        $action=$_GET['action'];
        if(method_exists($c,$action)){
            $c->$action();
        }
    }else{
        $c->defaultView();
    }
}
else
{
    include_once dirname(__FILE__) . '/Controleurs/Controleur_index.php';
    $controleur = 'ControleurIndex';
    $c = new $controleur($smarty);
    $c->defaultView();
}
echo ob_get_clean();



?>