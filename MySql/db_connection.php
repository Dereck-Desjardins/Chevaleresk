<?php
class DB
{
    public static function Connection()
    {
        try {
            $mybd = new PDO('mysql:host=localhost;dbname=dbchevalersk6;charset=utf8', 'chevalier6', 'hx843s4s');
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


    public function TrouverJoueur($courriel)
    {
        try {
            $mybd = self::Connection();
            $sql = $mybd->prepare("CALL trouverJoueur(?)");
            $sql->bindParam(1, $courriel);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            exit();
        }
    }
    public static function getAllItems() {
        $mybd = self::Connection();
        $sql = $mybd->prepare("SELECT * FROM Items");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }


    //Un Select Général pour l'instant 
    public function Select($columns, $table, $where = '')
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

?>