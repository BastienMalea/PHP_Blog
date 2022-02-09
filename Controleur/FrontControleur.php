<?php

class FrontControleur
{   
    function __construct(){
        global $rep,$vues;
        $actionAdmin=array('deconnection','ajouterArticle','supprimerArticle','supprimerCommentaire','articleAdmin','publier','ajouterAdmin','insererAdmin');
        try {
            $mdl=new ModeleAdmin();
            $admin=$mdl->isAdmin();
            $action=$_GET['action'];
            if(in_array($action,$actionAdmin)){
                if(!$admin){
                    require_once($rep.$vues['connection']);
                }
                else{
                    new ControleurAdmin();
                }
            }else
            {
                new Controleur();
            }
        } catch (PDOException $e) {
            $VueEreur[] = "Erreur inattendue!!! ";
            require($rep.$vues['erreur']);
        } catch (Exception $e2) {
            $VueEreur[] = "Erreur inattendue!!! ";
            require($rep.$vues['erreur']);
        }
    }
}