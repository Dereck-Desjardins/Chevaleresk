<?php

class Joueurs
{
    public $Id;
    public $Alias;
    public $Prenom;
    public $Nom;
    public $Solde;
    public $Niveau;
    public $EstAdmin;
    private $MotDePasse;

    public $Courriel;

    public function __construct($email) {
        try {
            DB::Connection();
            
            $result = DB::TrouverJoueur($email);
            
          
            foreach($result as $row) {
                $this->Id = $row['id'];
                $this->Alias = $row['alias'];
                $this->Prenom = $row['prenom'];
                $this->Nom = $row['nom'];
                $this->Courriel = $row['courriel'];
                $this->Niveau = $row['niveau'];
                $this->EstAdmin = $row['estAdmin'];
                $this->Solde = $row['solde'];
            }
            $connection = null;
          }
          catch(PDOException $e) {
          }
    }

    public static function CreatePlayer($prenom, $nom, $alias, $motdepasse, $courriel){
        DB::Connection();
        DB::CreerJoueur();
    }
    
    public function getId(){
        return $this->Id;
    }
    public function getAlias(){
        return $this->Alias;
    }
    public function getNom(){
        return $this->Nom;
    }
    public function getPrenom(){
        return $this->Prenom;
    }
    public function getSolde(){
        return $this->Solde;
    }
    public function getNiveau(){
        return $this->Niveau;
    }
    public function getCourriel(){
        return $this->Courriel;
    }

    //quand on creer un compte, call la procedure stocké de la db pour creer un compte et lui passer en 
    //parameteres les infos
}
