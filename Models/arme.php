<?php

class Arme extends Items
{
    public $Description;
    public $Efficacite;
    public $Genre;


    public function __construct(){
        $this->Id = 0;
        $this->Nom = "";
        $this->QuantiteStock = 0;
        $this->TypeItem = "";
        $this->Prix = 0;
        $this->Photo = "";
        $this->Description = "";
        $this->Efficacite = "";
        $this->Genre = "";        
    }

    public Function setDescription($description){
        $this->Description = $description; 
    }
    public Function setEfficacite($efficacite){
        $this->Efficacite = $efficacite; 
    }
    public Function setGenre($genre){
        $this->Genre = $genre; 
    }
}