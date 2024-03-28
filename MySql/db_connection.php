<?php
class DB
{
    public static function Connection()
    {
        try {
            $mybd = new 
            PDO('mysql:host=167.114.152.54;dbname=dbchevalersk6;charset=utf8', 'chevalier6', 'hx843s4s');
            return $mybd;
        } catch (PDOException $e) {
            echo 'Erreur de connexion : ' . $e->getMessage();
            exit();
        }
    }
    public static function InsertJoueur($alias, $nom, $prenom, $Niveau, $admin, $mp, $courriel)
    {
        try {
            $mybd = self::Connection();
            $sql = $mybd->prepare("CALL ajouterJoueurs(?, ?, ?, ?, ?, ?, ?)");
            $sql->bindParam(1, $alias);
            $sql->bindParam(2, $nom);
            $sql->bindParam(3, $prenom);
            $sql->bindParam(4, $Niveau);
            $sql->bindParam(5, $admin);
            $sql->bindParam(6, $mp);
            $sql->bindParam(7, $courriel);
            $sql->execute();
            return "Le Joueur est inséré avec succès.";
        } catch (PDOException $e) {
            echo 'Erreur insertion: ' . $e->getMessage();
            exit();
        }
    }
    public static function InsertArme($nom, $qt, $prix, $photo, $description, $efficacite, $genre)
    {
        try {
            $mybd = self::Connection();
            $sql = $mybd->prepare("CALL ajouterArme(?, ?, ?, ?, ?, ?, ?)");
            $sql->bindParam(1, $nom);
            $sql->bindParam(2, $qt);
            $sql->bindParam(3, $prix);
            $sql->bindParam(4, $photo);
            $sql->bindParam(5, $description);
            $sql->bindParam(6, $efficacite);
            $sql->bindParam(7, $genre);
            $sql->execute();
            return "Arme insérée avec succès.";
        } catch (PDOException $e) {
            echo 'Erreur insertion: ' . $e->getMessage();
            exit();
        }

    }
    public static function BuyBuyCart($idItem,$idJoueur,$QtItem){
        try {
            $mybd = self::Connection();
            $sql = $mybd->prepare("CALL ajouterItemInv(?, ?, ?)");
            $sql->bindParam(1, $idItem);
            $sql->bindParam(2, $idJoueur);
            $sql->bindParam(3, $QtItem);
            $sql->execute();
            return "Bon achat";
        } catch (PDOException $e) {
            echo 'Erreur insertion: ' . $e->getMessage();
            exit();
        }
    }
    public static function FIndItemInv($idItem,$idJoueur,$Qt)
    {
        try {
            $mybd = self::Connection();
            $sql = $mybd->prepare("CALL ajouterItemInv(?, ?, ?)");
            $sql->bindParam(1, $idItem);
            $sql->bindParam(2, $idJoueur);
            $sql->bindParam(3, $Qt);
            $sql->execute();
            return "Item insérée dans l'inventaire avec succès.";
        } catch (PDOException $e) {
            echo 'Erreur insertion: ' . $e->getMessage();
            exit();
        }

    }

    public static function TrouverJoueur($courriel,$mp)
    {
        try {
            $mybd = self::Connection();
            $sql = $mybd->prepare("CALL trouverJoueur(?,?)");
            $sql->bindParam(1, $courriel);
            $sql->bindParam(2, $mp);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            exit();
        }
    }
    public static function FindDetailsItem($idItem)
    {
        try {
            $mybd = self::Connection();
            $sql = $mybd->prepare("CALL rechercherItem(?)");
            $sql->bindParam(1, $idItem);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo 'Erreur recherche: ' . $e->getMessage();
            exit();
        }
    }
    public static function getItemById($id) {
        $mybd = self::Connection();
        $sql = $mybd->prepare("SELECT * FROM Items WHERE idItem = :id");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_OBJ);
    }
    public static function getAllItems() {
        $mybd = self::Connection();
        $sql = $mybd->prepare("SELECT * FROM Items");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }
    //Un Select Général pour l'instant 
    public static function Select($columns, $table, $where = '')
    {
        try {
            $mybd = self::Connection();
            $sql = "SELECT $columns FROM $table";
            if (!empty($where)) {
                $sql .= " WHERE $where";
            }
            $stmt = $mybd->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            exit();
        }
    }
}
