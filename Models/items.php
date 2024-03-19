<?php

class Items 
{
    public $Id;
    public $Nom;
    public $QuantiteStock;
    public $TypeItem;
    public $Prix;
    public $Photo;

    public function __construct(){
        $this->Id = 0;
        $this->Nom = "";
        $this->QuantiteStock = 0;
        $this->TypeItem = "";
        $this->Prix = 0;
        $this->Photo = "";
    }

    public Function setNom($nom){
        $this->Nom = $nom; 
    }

    public Function setQuantiteStock($quantiteStock){
        $this->Nom = $quantiteStock; 
    }
    public Function setTypeItem($typeItem){
        $this->Nom = $typeItem; 
    }
    public Function setPrix($prix){
        $this->Nom = $prix; 
    }
    public Function setPhoto($photo){
        $this->Nom = $photo; 
    }
}
