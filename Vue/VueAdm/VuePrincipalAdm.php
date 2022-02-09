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
  <a href="?action=ajouterArticle" class="btn btn-primary">Ajouter un article</a>
  <a href="?action=ajouterAdmin" class="btn btn-primary">Ajouter un administrateur</a>
</div>
<?php
  foreach($article as $articles): ?>
  <h2><?=$articles->getTitre()?></h2>
  <p><?=$articles->getDate()?></p>
  <p><?=$articles->getContDebut()?></p>
  <a href="?action=articleAdmin&id=<?=$articles->getId()?>">Lire la suite</a>
  <br/>
  <a href="?action=supprimerArticle&id=<?=$articles->getId()?>" class="btn btn-primary" role="button">Supprimer</a>

  <?php endforeach;?> 

  <nav>
    <ul class="pagination">
<!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
      <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
        <a href="?action=SeConnecter&page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
      </li>
      <?php for($page = 1; $page <= $pages; $page++): ?>
<!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
      <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
      <a href="?action=SeConnecter&page=<?= $page ?>" class="page-link"><?= $page ?></a>
      </li>
    <?php endfor ?>
<!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
  <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
  <a href="?action=SeConnecter&page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
  </li>
  </ul>
</nav>


</body>
</html>