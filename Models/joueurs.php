<?php
include 'Models/panier.php';
include_once "MySql/db_connection.php";
class Joueurs
{
    public $Id;
    public $Alias;
    public $Prenom;
    public $Nom;
    public $Solde;
    public $Niveau;
    public $EstAdmin;
    public $MotDePasse;

    public $Courriel;

    public $Panier;
    public $Experience;


    public function __construct($email, $mp)
    {
        $this->Panier = new Panier();

        $result = DB::TrouverJoueur($email, $mp);

        if ($result) {
            $this->Id = $result[0]['idJoueur'];
            $this->Alias = $result[0]['alias'];
            $this->Prenom = $result[0]['prenom'];
            $this->Nom = $result[0]['nom'];
            $this->Courriel = $result[0]['courriel'];
            $this->Niveau = $result[0]['niveau'];
            $this->EstAdmin = $result[0]['estAdmin'];
            $this->Solde = $result[0]['solde'];
            $this->MotDePasse = $result[0]['motdepasse'];
            $this->Experience = $result[0]['exp'];
        } else {
            throw new Exception('');
        }
    }
    public function getId()
    {
        return $this->Id;
    }
    public function getAlias()
    {
        return $this->Alias;
    }
    public function getNom()
    {
        return $this->Nom;
    }
    public function getPrenom()
    {
        return $this->Prenom;
    }
    public function getSolde()
    {
        return $this->Solde;
    }
    public function setSolde($newSolde){
        return $this->Solde = $newSolde;
    }
    public function setExp(){
        $this->Experience =$this->Experience + 1;
        if( $this->Experience == 3){
            DB::NiveauAlchi($this->Id,'debutant',3);
        }elseif ( $this->Experience == 6){
            DB::NiveauAlchi($this->Id,'intermediaire',6);
        }
        elseif ( $this->Experience == 9){
            DB::NiveauAlchi($this->Id,'expert',9);
        }
    }
    public function getNiveau()
    {
        return $this->Niveau;
    }
    public function getCourriel()
    {
        return $this->Courriel;
    }
    public function getPanier()
    {
        return $this->Panier;
    }

}
