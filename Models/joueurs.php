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
    private $MotDePasse;

    public $Courriel;

    public $Panier;


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
