<?php 
include_once "Card.php";

class Planete{

    private string $_nom;
    private string $_info;
    private string $_img;


    public function __construct(string $unNom, string $uneInfo, string $uneImg="")
    {
        $this->_nom = $unNom;
        $this->_info = $uneInfo;
        $this->_img = $uneImg;
    }

    /**
     * Get the value of _nom
     */ 
    public function get_nom()
    {
        return $this->_nom;
    }

    /**
     * Set the value of _nom
     *
     * @return  self
     */ 
    public function set_nom($_nom)
    {
        $this->_nom = $_nom;

        return $this;
    }

    /**
     * Get the value of _info
     */ 
    public function get_info()
    {
        return $this->_info;
    }

    /**
     * Set the value of _info
     *
     * @return  self
     */ 
    public function set_info($_info)
    {
        $this->_info = $_info;

        return $this;
    }

    /**
     * Get the value of _img
     */ 
    public function get_img()
    {
        return $this->_img;
    }

    /**
     * Set the value of _img
     *
     * @return  self
     */ 
    public function set_img($_img)
    {
        $this->_img = $_img;

        return $this;
    }

    public function affichageCard(string $taille = "col-12"){
        $card = new Card($this->_nom, $this->_info, $this->_img);
        $card->render($taille);
    }
}