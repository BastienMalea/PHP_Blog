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

<form action="?action=publier" method="post">
   <p><label for="titre">Titre :</label><br/>
   <input type="text" name="titre" id="titre" /></p>
   <p><label for="Contenu">Contenu : </label><br/>
   <textarea name="Contenu" id="Contenu" cols="50" rows="15"></textarea></p>
    <button type="submit">Publier</button>
</form>

</body>
</html>