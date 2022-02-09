<?php
$DSN = 'mysql:host=berlin.iut.local;dbname=dbbamalea';
$USER = 'bamalea';
$PASS = 'achanger';


//gen
$rep=__DIR__.'/../';

// liste des modules à inclure

//$dConfig['includes']= array('controleur/Validation.php');

//Vues

$vues['erreur']='Vue/VueErreur.php';
$vues['article']='Vue/Article.php';
$vues['connection']='Vue/vueConnection.php';
$vues['principale']='Vue/vuePrincipale.php';
$vues['commentaire']='Vue/AjoutCom.php';
$vues['articleAdmin']='Vue/VueAdm/ArticleAdm.php';
$vues['principaleAdmin']='Vue/VueAdm/VuePrincipalAdm.php';
$vues['ajouterArticle']='Vue/VueAdm/AjoutArticle.php';
$vues['ajouterAdmin']='Vue/VueAdm/AjoutAdmin.php';