<?php

class Potion extends Items
{
    public $Duree;
    public $Effet;
    public $TypePotion;


    public function __construct(){
        $this->Id = 0;
        $this->Nom = "";
        $this->QuantiteStock = 0;
        $this->TypeItem = "";
        $this->Prix = 0;
        $this->Photo = "";
        $this->Duree = 0;
        $this->Effet = "";
        $this->TypePotion = "";        
    }

    public Function setDuree($duree){
        $this->Duree = $duree; 
    }
    public Function setEffet($effet){
        $this->Effet = $effet; 
    }
    public Function setTypePotion($typePotion){
        $this->TypePotion = $typePotion; 
    }
}