<?php

namespace   App\entities;

class Categorie 
{
   
    private $nom;
    private $discription;
    private $dat;

    public function __construct($nom,$discription,$dat){
     
        $this->nom = $nom;
        $this->discription = $discription;
        $this->dat = $dat;
    }

    public function getName(){
        return $this->nom;
    }
    public function getDiscription(){
        return $this->discription;
    }
    public function getDat(){
        return $this->dat;
    }


    public function setId($id){
        $this->id = $id;
    }
    public function setname($nom){
        $this->nom = $nom;
    }
    public function setDiscription($discription){
        $this->discription = $discription;
    }
    public function setDat($dat){
        $this->dat = $dat;
    }
}
?>