<?php

class GateWayAdmin{
    private $con;
    
    public function __construct(Connection $con){
    $this->con=$con;
    }

    public function insert(string $pseudo,string $mdp)
    {   
        
        //var_dump($password_hash($pseudo,PASSWORD_DEFAULT));
        $query='INSERT INTO Administrateur (pseudo,mdp) VALUES(:pdo, :mp)';
        $this->con->executeQuery($query, array(':pdo'=>array( $pseudohash, PDO::PARAM_STR), ':mp'=>array($mdp, PDO::PARAM_STR)));
        
    }


    public function delete(string $pseudo){
        $query='DELETE FROM Administrateur WHERE pseudo=:psd';
        $this->con->executeQuery($query, array(':psd'=>array($pseudo, PDO::PARAM_STR)));
    }
    public function isAdmin(string $pseudo,string $mdp)
    {
        $query='SELECT COUNT(*) FROM Administrateur WHERE pseudo=:psd';
        $this->con->executeQuery($query, array(':psd'=>array($pseudo, PDO::PARAM_STR)));
        $res=$this->con->getResults();
        if($res[0]['COUNT(*)'] == 1){
            $query='SELECT mdp FROM Administrateur WHERE pseudo=:psd';
            $this->con->executeQuery($query, array(':psd'=>array($pseudo, PDO::PARAM_STR)));
            $res=$this->con->getResults();
            return password_verify($mdp,$res[0]['mdp']);
        }
        else{
            return false;
        }

    }
}
?>