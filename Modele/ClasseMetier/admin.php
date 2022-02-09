<?php

class Admin
{
    private $mdp;
    private $pseudo;
    /**
     * @param $mdp
     * @param $pseudo
     */
    public function __construct($pseudo,$mdp)
    {
        $this->pseudo=$pseudo;
        $this->mdp = $mdp;
    }

    /**
     * @return mixed
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @param mixed $mdp
     */
    public function setMdp($mdp): void
    {
        $this->mdp = $mdp;
    }
    

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }
        /**
     * @param mixed $pseudo 
     */
    public function setPseudo($pseudo): void
    {
        $this->pseudo=$pseudo;
    }
}