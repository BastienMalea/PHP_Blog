<?php

class Article
{
    private $date;
    protected $cont;
    private $titre;
    private $id;

    /**
     * @param $date
     * @param $cont
     * @param $titre
     * @param $id
     */
    public function __construct($date, $cont, $titre, $id)
    {
        $this->date = $date;
        $this->cont = $cont;
        $this->titre = $titre;
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getCont()
    {
        return $this->cont;
    }

    public function getContDebut()
    {
        return substr($this->cont, 0,50)." . . .";
    }

    /**
     * @param mixed $contenu
     */
    public function setCont($contenu): void
    {
        $this->cont = $contenu;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre): void
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }


}