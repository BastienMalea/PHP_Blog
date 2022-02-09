<?php


class Controleur
{
    function __construct()
    {
        global $rep, $vues;
        try {
            $action = $_REQUEST['action'];
            switch ($action) {
                case NULL:
                    $this->Reinit();
                    break;
                case "connection":
                    $this->connection();
                    break;
                case "article":
                    $this->article();
                    break;
                case "commentaire":
                    $this->commentaire();
                    break;
                case "ajoutCom":
                    $this->ajoutCom();
                    break;
                case "SeConnecter":
                    $this->SeConnecter();
                    break;
                case "rechercher":
                    $this->rechercher();
                    break;               
                default:
                    $vueErreur[] = "Erreur d'appel php";
                    require($rep.$vues['erreur']);
                    break;
            }
        } catch (PDOException $e) {
            $vueErreur[] = "Erreur inattendue!!! ";
            $vueErreur[]= $e->getMessage();
            require($rep.$vues['erreur']);
        } catch (Exception $e2) {
            $vueErreur[] = "Erreur inattendue!!! ";
            require($rep.$vues['erreur']);
        }
    }

    function Reinit()
    {

        $gta=new Modele();
        global $rep, $vues;
        $nbArticleTotal=$gta->nbArticles();
        // On détermine le nombre d'articles par page
        $parPage = 10;

        // On calcule le nombre de pages total
        $pages = ceil($nbArticleTotal/$parPage);

        $currentPage=$_GET['page'];
        if($currentPage == NULL || $currentPage>$pages || $currentPage<=0){
            $currentPage = 1;
        }

        // Calcul du 1er article de la page
        $premier = ($currentPage * $parPage) - $parPage;
        
        //On récupère les 10 premiers article


        $article=$gta->articlePage($premier,$parPage);
        $nbcom=$gta->nbCommentaire();
        $nbComPerso=$gta->getCompteur();
        require_once($rep.$vues['principale']);
    }
    function connection()
    {
        global $rep, $vues;
        require_once($rep.$vues['connection']);
    }
    function article()
    {
        global $rep, $vues;
        $gta=new Modele();
        $id=$_GET['id'];
        if($id==NULL || $id < 0)
        {
            $vueErreur[]="Id d'article non valide";
            require($rep.$vues['erreur']);
        }
        else{
            $article=$gta->getArticle($id);
            $com=$gta->getCommentaires($id);
            require_once($rep.$vues['article']);
        }

    }
    function commentaire()
    {
        global $rep, $vues;
        $id=$_GET['id'];
        $pseudo=$_SESSION['pseudo'];
        require_once($rep.$vues['commentaire']);
    }
    function ajoutCom()
    {
        global $rep, $vues;
        $vueErreur=Validation::verifChamp($_POST['auteur'],$_POST['commentaire']); 
        $commentaire=Validation::is_string($_POST['commentaire']); 
        $auteur=Validation::is_string($_POST['auteur']);
        if(count($vueErreur)==0){
            $id=$_GET['id'];
            $mdl=new Modele();
            $mdl->insertC($auteur,$commentaire,$id);
            $this->article();
            if (isset($_COOKIE['nbCom'])) {
                    $nbCom = $mdl->getCompteur();
                    setcookie("nbCom", $nbCom+1, time()+365243600);
                }
            else { setcookie("nbCom", 1, time()+365243600);}
            $_SESSION['pseudo']=$auteur;
            
        }
        else{
            require($rep.$vues['erreur']);
        }
    }
    function SeConnecter(){
        global $rep, $vues;
        $mdl=new ModeleAdmin();
        if($mdl->isAdmin()){
            $gta=new Modele();
            global $rep, $vues;
    
            
            $nbArticleTotal=$gta->nbArticles();
            // On détermine le nombre d'articles par page
            $parPage = 10;
    
            // On calcule le nombre de pages total
            $pages = ceil($nbArticleTotal/$parPage);
            $currentPage=$_GET['page'];
            if($currentPage == NULL || $currentPage>$pages || $currentPage<=0){
                $currentPage = 1;
            }
            // Calcul du 1er article de la page
            $premier = ($currentPage * $parPage) - $parPage;    
            $article=$gta->articlePage($premier,$parPage);
    
            require_once($rep.$vues['principaleAdmin']);
        }
        else{
 
        $psd=Validation::is_string($_POST['pseudo']); 
        $mdp=Validation::is_string($_POST['mdp']);
       
        $vueErreur=$mdl->connection($psd,$mdp);
        if(!empty($vueErreur)){
            require($rep.$vues['erreur']);
        }
        else{
        if($mdl->isAdmin() == false){
            $this->connection();
        }else{
            $gta=new Modele();
            global $rep, $vues;
    
            $currentPage = 1;
            $nbArticleTotal=$gta->nbArticles();
            // On détermine le nombre d'articles par page
            $parPage = 10;
    
            // On calcule le nombre de pages total
            $pages = ceil($nbArticleTotal/$parPage);
    
            // Calcul du 1er article de la page
            $premier = ($currentPage * $parPage) - $parPage;    
            $article=$gta->articlePage($premier,$parPage);
    
            require_once($rep.$vues['principaleAdmin']);
        }
    }
    }
    }
    
    function rechercher(){
        global $rep, $vues;
        $date=$_POST['date'];
        $gta=new Modele();
        
        $article=$gta->articleByDate($date);
        $nbcom=$gta->nbCommentaire();
        $nbComPerso=$gta->getCompteur();
        require_once($rep.$vues['principale']);
    }
}