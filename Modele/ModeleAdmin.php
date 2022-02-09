<?php

class ModeleAdmin
{
    //Les gws à partir du modele
    public function insert(string $pseudo,string $mdp)
    {
        global $DSN,$PASS,$USER;
        $co=new Connection($DSN, $USER, $PASS);
        $gwa = new GateWayAdmin($co);
        
        $pseudo=(password_hash($pseudo,PASSWORD_DEFAULT));
        
        $gwa->insert($pseudo,$mdp);
    }
    public function delete(string $pseudo)
    {
        global $DSN,$PASS,$USER;
        $co=new Connection($DSN, $USER, $PASS);
        $gwa = new GateWayAdmin($co);
        $gwa->delete($pseudo);
    }
    public function	deconnexion(){
        session_unset();
        session_destroy();
        $_SESSION=array();
    }
    public function connection($login,$mdp):array{
        $VueErreur=array();
        global $DSN,$PASS,$USER;
    
        filter_var($login, FILTER_SANITIZE_STRING);
        filter_var($mdp, FILTER_SANITIZE_STRING);
        $co=new Connection($DSN, $USER, $PASS);
        $gwa = new GatewayAdmin($co);
        if(!$gwa->isAdmin($login,$mdp)){
            $VueErreur[]="mot de passe ou pseudo incorrecte veuillez réessayer";
        }
        else{
            $_SESSION['role']='admin';
            $_SESSION['login']=$login;
        }
        return $VueErreur;
    }
    public function isAdmin(){
        if(isset($_SESSION['login']) && (isset($_SESSION['role'])))
        {
            return true;
        }
        else{
            return false;
        }
    }
}