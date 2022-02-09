<?php

class GatewayCommentaire{
    private $con;
    
    public function __construct(Connection $con){
    $this->con=$con;
    }

    public function insert(string $pseudo,string $contenu,int $id_art):int
    {   
        $query='INSERT INTO Commentaire (auteur,contenu,moment,id_ART) VALUES(:aut, :cont, NOW(),:id)';
        $this->con->executeQuery($query, array(':aut'=>array($pseudo, PDO::PARAM_STR), ':cont'=>array($contenu, PDO::PARAM_STR),':id'=>array($id_art, PDO::PARAM_INT)));
        return	$this->con->lastInsertId();
    }
    public function deleteArt(string $id_art)
    {
        $query='DELETE FROM Commentaire WHERE id_ART=:id';
        $this->con->executeQuery($query, array(':id'=>array($id_art, PDO::PARAM_INT)));
    }
    public function deleteCom(string $id)
    {
        $query='DELETE FROM Commentaire WHERE id_Commentaire=:id';
        $this->con->executeQuery($query, array(':id'=>array($id, PDO::PARAM_INT)));
    }
    public function update (string $cont,int $id){
        $query='UPDATE Commentaire SET contenu=:con WHERE id_Commentaire=:id_co';
        $this->con->executeQuery($query, array(':con'=>array($cont, PDO::PARAM_STR),':id_co'=>array($id, PDO::PARAM_INT)));
    }
        //Fonction qui récupère tout les commentaires
    public function getCommentaires(int $id_art):array
    {
        $tabCom=[];
        $query='SELECT * FROM Commentaire WHERE id_ART=:id_at ORDER BY moment';
        $this->con->executeQuery($query, array(':id_at'=>array($id_art, PDO::PARAM_INT)));
        $res=$this->con->getResults();
        foreach ($res as $resultat) 
        {
            $tabCom[]=new Commentaire($resultat['auteur'], $resultat['contenu'],$resultat['id_Commentaire'],$resultat['id_ART'],$resultat['moment']);
        }
        return $tabCom;
    }

    public function nbCommentaire():int
    {
        $query='SELECT COUNT(*) FROM Commentaire';
        $this->con->executeQuery($query);
        $res=$this->con->getResults();
        return $res[0]['COUNT(*)'];
    }
}

?>