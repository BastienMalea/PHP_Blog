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
  <h1>Blog Admin</h1>
  <a href="index.php?action=deconnection" class="btn btn-primary" role="button">Se déconnecter</a>
  <a href="?action=SeConnecter" class="btn btn-primary">Accueil</a>
  <a href="#" class="btn btn-primary">Ajouter un article</a>
</div>

<form action="?action=insererAdmin" method="post">
   <p><label for="login">Pseudo :</label><br/>
   <input type="text" name="login" id="login" /></p>
   <p><label for="mdp">Mot de passe : </label><br/>
   <input type="text" name="mdp" id="mdp" /></p>
    <button type="submit">Ajouter</button>
</form>

</body>
</html>