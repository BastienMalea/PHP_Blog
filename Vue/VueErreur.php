<!DOCTYPE html>
<html>
<body>
<head>
  <title>Accueil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>


<div class="jumbotron text-center">
  <h1>Erreur</h1>
  <a href="index.php?action=connection" class="btn btn-primary" role="button">Se connecter</a>
  <ul class="menu">
        <a href="?" class="btn btn-primary" >Accueil</a>
</ul>
</div>
<?php

foreach ($vueErreur as $er) {
    echo($er.'<br/>');
}
?>
