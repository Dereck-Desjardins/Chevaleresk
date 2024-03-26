<?php

class Armure extends Items
{
    public $Taille;
    public $Matiere;

    public function __construct(){
        $this->Id = 0;
        $this->Nom = "";
        $this->QuantiteStock = 0;
        $this->TypeItem = "";
        $this->Prix = 0;
        $this->Photo = "";
        $this->Taille = "";
        $this->Matiere = "";
    }

    public Function setTaille($taille){
        $this->Taille = $taille; 
    }

    public Function setMatiere($matiere){
        $this->Matiere = $matiere; 
    }
}