<?php

class Commentaire
{
    private $Auteur;
    private $text;
    private $id_Commentaire;
    private $id_ART;
    private $moment;

    /**
     * @param $Auteur
     * @param $text
     */
    public function __construct($Auteur, $text,$id_Commentaire,$id_ART,$moment)
    {
        $this->Auteur = $Auteur;
        $this->text = $text;
        $this->id_Commentaire=$id_Commentaire;
        $this->id_ART=$id_ART;
        $this->moment=$moment;
    }
    
    

    /**
    * @return mixed
    */
   public function getMoment()
   {
       return $this->moment;
   }

       /**
     * @param mixed $Auteur
     */
    public function setMoment($moment): void
    {
        $this->moment = $moment;
    }


    /**
     * @return mixed
     */
    public function getId_Commentaire()
    {
        return $this->id_Commentaire;
    }    
    
    /**
    * @return mixed
    */
   public function getId_ART()
   {
       return $this->id_ART;
   }

       /**
     * @param mixed $Auteur
     */
    public function setId_ART($id_ART): void
    {
        $this->id_ART = $id_ART;
    }
     /**
     * @param mixed $Auteur
     */
    public function setId_Commentaire($id_Commentaire): void
    {
        $this->id_Commentaire = $id_Commentaire;
    }

    /**
     * @return mixed
     */
    public function getAuteur()
    {
        return $this->Auteur;
    }

    /**
     * @param mixed $Auteur
     */
    public function setAuteur($Auteur): void
    {
        $this->Auteur = $Auteur;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text): void
    {
        $this->text = $text;
    }


}