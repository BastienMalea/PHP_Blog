<?php

class GateWayArticle{
    private $con;
    
    public function __construct(Connection $con){
    $this->con=$con;
    }

    public function insert(string $titre, string $contenu) :int
    {
        $query='INSERT INTO Article (titre,contenu,moment) VALUES(:art, :cont, NOW())';
        $this->con->executeQuery($query, array(':art'=>array($titre, PDO::PARAM_STR), ':cont'=>array($contenu, PDO::PARAM_STR)));
        return	$this->con->lastInsertId();
    }

    //Fonction qui récupère un article 
    public function getArticle(int $id):article
    {
        $query='SELECT * FROM Article WHERE id_Article=:id';
        $this->con->executeQuery($query, array(":id"=>array($id, PDO::PARAM_INT)));
        $res=$this->con->getResults();
        return new Article($res[0]['moment'],$res[0]['contenu'],$res[0]['titre'],$res[0]['id_Article']);
    }

    //Fonction qui récupère tout les articles
    public function getArticles():array
    {
        $tabArticle=[];
        $query='SELECT titre,contenu,moment,id_Article FROM Article ORDER BY moment';
        $this->con->executeQuery($query);
        $res=$this->con->getResults();
        foreach ($res as $resultat) {
            $tabArticle[]=new Article($resultat['moment'], $resultat['contenu'], $resultat['titre'], $resultat['id_Article']);
        }
        return $tabArticle;
    }

    public function delete(int $id)
    {
        $query='DELETE FROM Article WHERE id_Article=:id';
        $this->con->executeQuery($query, array(":id"=>array($id, PDO::PARAM_INT)));
    }
        
    public function nbArticles():int
    {
        $query='SELECT COUNT(*) FROM Article';
        $this->con->executeQuery($query);
        $res=$this->con->getResults();
        return $res[0]['COUNT(*)'];
    }

    public function articlePage(int $pre, int $par):array
    {
        $tabArticle=[];

        $query='SELECT titre,contenu,moment,id_Article FROM Article ORDER BY moment LIMIT :premier, :parPage';

        $this->con->executeQuery($query, array(':premier'=>array($pre, PDO::PARAM_INT), ':parPage'=>array($par, PDO::PARAM_INT)));
        $res=$this->con->getResults();
        foreach ($res as $resultat) {
            $tabArticle[]=new Article($resultat['moment'], $resultat['contenu'], $resultat['titre'], $resultat['id_Article']);
        }
        return $tabArticle;
    }

    public function articleByDate($date):array{
        $tabArticle=[];
        $query='SELECT titre,contenu,moment,id_Article FROM Article where moment=:mom ORDER BY moment DESC';
        $this->con->executeQuery($query, array(":mom"=>array($date, PDO::PARAM_STR)));
        $res=$this->con->getResults();
        foreach ($res as $resultat) {
            $tabArticle[]=new Article($resultat['moment'], $resultat['contenu'], $resultat['titre'], $resultat['id_Article']);
        }
        return $tabArticle;
    }
}

?>