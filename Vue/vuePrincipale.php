<!DOCTYPE html>
<html>
<body font-family: 'Noto Sans JP', sans-serif;>
<head>
  <title>Accueil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<div class="jumbotron text-center">
  <h1>Accueil Blog</h1>
  <a href="index.php?action=connection" class="btn btn-primary" role="button">Se connecter</a>
  <a href="?" class="btn btn-primary">Accueil</a>
  <?php
    echo("<br>");
    echo ("nombre de commentaire sur le site : ");
    echo ($nbcom);
    echo("<br>");
    echo ("nombre de commentaire personnelle sur le site : ");
    echo ($nbComPerso);
  ?>
<form action="?action=rechercher" method="post">
  <label for="Rechercher">Rechercher par date</label>
  <input type="date" id="date" name="date">
  <input type="submit" value="Rechercher">
</form>
 

</div>
<?php
  foreach($article as $articles): ?>
  <h2><?=$articles->getTitre()?></h2>
  <p><?=$articles->getDate()?></p>
  <p><?=$articles->getContDebut()?></p>
  <a href="?action=article&id=<?=$articles->getId()?>">Lire la suite</a>
  <?php endforeach;?> 

  <nav>
    <ul class="pagination">
<!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
      <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
        <a href="./?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
      </li>
      <?php for($page = 1; $page <= $pages; $page++): ?>
<!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
      <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
      <a href="./?page=<?= $page ?>" class="page-link"><?= $page ?></a>
      </li>
    <?php endfor ?>
<!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
  <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
  <a href="./?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
  </li>
  </ul>
</nav>


</body>
</html>