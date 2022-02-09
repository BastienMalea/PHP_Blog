<?php
//chargement config
require_once(__DIR__.'/config/config.php');

//chargement autoloader pour autochargement des classes
require_once(__DIR__.'/config/autoloader.php');
Autoload::charger();
session_start();
error_reporting(E_ALL & ~E_NOTICE);

$cont=new FrontControleur();

?>