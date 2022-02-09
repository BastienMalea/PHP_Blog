<!DOCTYPE html>
<html>
<body>
<head>
  <title>Article</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<div class="jumbotron text-center">
  <h1><?=$article->getTitre()?></h1>
  <a href="index.php?action=connection" class="btn btn-primary" role="button">Se connecter</a>
  <ul class="menu">
        <a href="?" class="btn btn-primary" >Accueil</a>
</ul>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-1">
    </div>
    <div style="background-color:lavender" class="col-sm-10">
      <h3></h3>
      <h2 style="text-align:center"><?=$article->getCont()?></h2>
    </div>
    <div class="col-sm-1">
    </div>
  </div>
  <div>
<?php
  foreach($com as $comment): ?>
    <h2><?=$comment->getMoment()?></h2>
    <p><?=$comment->getAuteur()?></p>
    <p><?=$comment->getText()?></p>
    <?php endforeach;?> 
    </div>
        <a href="?action=commentaire&id=<?=$article->getId()?>">Ajouter Commentaire</a>
</html>