<?php

class Element extends Items
{
    public $Rarete;
    public $Dangerosite;

    public function __construct(){
        $this->Id = 0;
        $this->Nom = "";
        $this->QuantiteStock = 0;
        $this->TypeItem = "";
        $this->Prix = 0;
        $this->Photo = "";
        $this->Rarete = "";
        $this->Dangerosite = "";
    }

    public Function setRarete($rarete){
        $this->Rarete = $rarete; 
    }

    public Function setDangerosite($dangerosite){
        $this->Dangerosite = $dangerosite; 
    }
}