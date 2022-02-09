<?php

class ControleurAdmin
{
    function __construct(){
        global $rep, $vues;
        $mdl=new ModeleAdmin();
        $admin=$mdl->isAdmin();
        $action=$_GET['action'];
        if($action== null){
            $vueErreur []="Veuillez vous connecter avant de faire ".$action;
            require_once($rep.$vues['erreur']);
        }
        try {
            $action = $_REQUEST['action'];
            switch ($action) {      
                case "deconnection":
                    $this->deconnection();
                    break;
                case "articleAdmin":
                    $this->article();
                    break;
                case "ajouterArticle":
                    $this->ajouterArticle();
                    break;
                case "publier":
                    $this->publier();
                    break;
                case "supprimerArticle":
                    $this->supprimerArticle();
                    break;
                case "supprimerCommentaire":
                    $this->supprimerCommentaire();
                    break;
                case "ajouterAdmin":
                    $this->ajouterAdmin();
                    break;
                case "insererAdmin":
                    $this->insererAdmin();
                    break;
                default:
                    $vueErreur[] = "Erreur d'appel php";
                    require($rep.$vues['erreur']);
                    break;
            }
        } catch (PDOException $e) {
            $vueErreur[] = "Erreur inattendue!!! ";
            require($rep.$vues['erreur']);
        } catch (Exception $e2) {
            $vueErreur[] = "Erreur inattendue!!! ";
            require($rep.$vues['erreur']);
        }
    }
    function deconnection(){
        global $rep, $vues;
        $mdl=new ModeleAdmin();
        $mdl->deconnexion();
        new FrontControleur();
    }

    function ajouterAdmin(){
        global $rep, $vues;
        require_once($rep.$vues['ajouterAdmin']);
    }

    function insererAdmin(){
        global $rep, $vues;
        $vueErreur=Validation::verifChamp($_POST['login'],$_POST['mdp']);
        $login=Validation::is_string($_POST['login']);
        $mdp=Validation::is_string($_POST['mdp']);
        if(count($vueErreur)==0)
        {
            $mdlAdmin=new ModeleAdmin();
            $mdl=new Modele();
            $mdlAdmin->insert($login,$mdp);
            $currentPage = 1;
            $nbArticleTotal=$mdl->nbArticles();
            // On détermine le nombre d'articles par page
            $parPage = 10;

            // On calcule le nombre de pages total
            $pages = ceil($nbArticleTotal/$parPage);

            // Calcul du 1er article de la page
            $premier = ($currentPage * $parPage) - $parPage;    
            $article=$mdl->articlePage($premier,$parPage);

            require_once($rep.$vues['principaleAdmin']);
        }
        else{
            require($rep.$vues['erreur']);
        }
    }


    function article()
    {
        global $rep, $vues;
        $gta=new Modele();
        $id=$_GET['id'];
        if($id==NULL || $id < 0 )
        {
            $vueErreur[]="Id d'article non valide";
            require($rep.$vues['erreur']);
        }
        else{
            $article=$gta->getArticle($id);
            $com=$gta->getCommentaires($id);
            require_once($rep.$vues['articleAdmin']);
        }

    }

    function ajouterArticle(){
        global $rep, $vues;
        require_once($rep.$vues['ajouterArticle']);
    }

    function publier(){
        {
            global $rep, $vues;
            $vueErreur=Validation::verifChamp($_POST['titre'],$_POST['Contenu']);
            $commentaire=Validation::is_string($_POST['commentaire']);
            $auteur=Validation::is_string($_POST['auteur']);
            if(count($vueErreur)==0){
                $mdl=new Modele();
                $id=$mdl->insertA($_POST['titre'],$_POST['Contenu']);
                $article=$mdl->getArticle($id);
                $com=$mdl->getCommentaires($id);
                require_once($rep.$vues['articleAdmin']);
            }
            else{
                require($rep.$vues['erreur']);
            }
        }
    }

    function supprimerArticle(){
        global $rep, $vues;
        $mdl=new Modele();
        $id=$_GET['id'];
        $mdl->deleteCA($id);// supprime tout les commentaires d'un article
        $mdl->deleteA($id); // supprime l'article
        $currentPage = 1;
        $nbArticleTotal=$mdl->nbArticles();
        // On détermine le nombre d'articles par page
        $parPage = 10;

        // On calcule le nombre de pages total
        $pages = ceil($nbArticleTotal/$parPage);

        // Calcul du 1er article de la page
        $premier = ($currentPage * $parPage) - $parPage;    
        $article=$mdl->articlePage($premier,$parPage);

        require_once($rep.$vues['principaleAdmin']);
    }


    function supprimerCommentaire(){
        global $rep, $vues;
        $idcom=$_GET['idcom'];
        $mdl=new Modele();
        $mdl->deleteC($idcom); //supprime le commentaire
        $idart=$_GET['idart'];
        $article=$mdl->getArticle($idart);
        $com=$mdl->getCommentaires($idart);
        require_once($rep.$vues['articleAdmin']);
    }
}
