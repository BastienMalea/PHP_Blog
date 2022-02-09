<?php
class Modele
{

    
    public function getCompteur():int{
        if(isset($_COOKIE['nbCom']))
        {
            return $_COOKIE['nbCom'];
        }
        $this->resetCookie();
        return 0;

    }
    public function resetCookie(){
        setcookie("nbCom",0,time()-3600);
        setcookie("nbCom",0,time()+365*3600);
    }

    //Fonction pour la gateway Article :

    function articleByDate($date):array{
        global $DSN,$PASS,$USER;
        $co=new Connection($DSN, $USER, $PASS);
        $gwa=new GateWayArticle($co);
        return $gwa->articleByDate($date);
    }
    function insertA(string $titre, string $contenu):int
    {
        global $DSN,$PASS,$USER;
        $co=new Connection($DSN, $USER, $PASS);
        $gwa=new GateWayArticle($co);
        return $gwa->insert($titre, $contenu);
    }

    function getArticle(int $id):article
    {
        global $DSN,$PASS,$USER;
        $co=new Connection($DSN, $USER, $PASS);
        $gwa=new GateWayArticle($co);
        return $gwa->getArticle($id);
    }

    function getArticles(int $id):array
    {
        global $DSN,$PASS,$USER;
        $co=new Connection($DSN, $USER, $PASS);
        $gwa=new GateWayArticle($co);
        return $gwa->getArticles();
    }

    function deleteA(int $id)
    {
        global $DSN,$PASS,$USER;
        $co=new Connection($DSN, $USER, $PASS);
        $gwa=new GateWayArticle($co);
        $gwa->delete($id);
    }

    function nbArticles():int
    {
        global $DSN,$PASS,$USER;
        $co=new Connection($DSN, $USER, $PASS);
        $gwa=new GateWayArticle($co);
        return $gwa->nbArticles();
    }

    function articlePage(int $premier, int $parPage):array
    {

        global $DSN,$PASS,$USER;
        $co=new Connection($DSN, $USER, $PASS);

        $gwa=new GateWayArticle($co);

        return $gwa->articlePage($premier, $parPage);
    }

    //Fonction pour la gateway Commentaire :

    function insertC(string $pseudo,string $contenu,int $id_art):int
    {
        global $DSN,$PASS,$USER;
        $co=new Connection($DSN, $USER, $PASS);
        $gwc=new GatewayCommentaire($co);
        return $gwc->insert($pseudo, $contenu, $id_art);
    }

    function deleteC(string $id_com)
    {
        global $DSN,$PASS,$USER;
        $co=new Connection($DSN, $USER, $PASS);
        $gwc=new GatewayCommentaire($co);
        $gwc->deleteCom($id_com);
    }
    function deleteCA(string $id_art)
    {
        global $DSN,$PASS,$USER;
        $co=new Connection($DSN, $USER, $PASS);
        $gwc=new GatewayCommentaire($co);
        $gwc->deleteArt($id_art);
    }

    function update(string $cont,int $id){
        global $DSN,$PASS,$USER;
        $co=new Connection($DSN, $USER, $PASS);
        $gwc=new GatewayCommentaire($co);
        $gwc->delete($cont, $id);
    }

    function getCommentaires(int $id_art):array
    {
        global $DSN,$PASS,$USER;
        $co=new Connection($DSN, $USER, $PASS);
        $gwc=new GatewayCommentaire($co);
        return $gwc->getCommentaires($id_art);
    }

    function nbCommentaire():int{
        global $DSN,$PASS,$USER;
        $co=new Connection($DSN, $USER, $PASS);
        $gwc=new GatewayCommentaire($co);
        return $gwc->nbCommentaire();
    }

}