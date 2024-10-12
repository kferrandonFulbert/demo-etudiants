<?php 
include_once "Planete.php";
include_once "Carousel.php";
class Systeme{

    private string $_nom;
    private array $_desPlanetes;

    public function __construct(string $unNom){
        $this->_nom = $unNom;
        $this->_desPlanetes = [];
    }

    public function addPlanete(Planete $unePlanete){
        array_push($this->_desPlanetes, $unePlanete);
      //  $this->_desPlanetes[] = $unePlanete;
    }

    public function afficheSysteme(){
        echo "<h1>$this->_nom</h1>";
        foreach ($this->_desPlanetes as $planete) {
            $planete->affichageCard("col-sm-12 col-md-4");
        }
    }
        public function afficheSystemeCaroussel(){
        $slide = new Carousel();
        //var_dump($slide);
        $slide->render($this->_desPlanetes);
    }
}