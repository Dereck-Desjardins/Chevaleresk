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
            throw new AliasException();
        }
    }
    
    public static function UpdateJoueur($idJoueur,$alias, $nom, $prenom, $mp, $courriel)
    {
        try {
            $mybd = self::Connection();
            $sql = $mybd->prepare("CALL modiferProfil(?, ?, ?, ?, ?, ?)");
            $sql->bindParam(1, $idJoueur);
            $sql->bindParam(2, $alias);
            $sql->bindParam(3, $nom);
            $sql->bindParam(4, $prenom);
            $sql->bindParam(5, $mp);
            $sql->bindParam(6, $courriel);
            $sql->execute();
            return "Le Joueur a été modifié avec succès.";
        } catch (PDOException $e) {
            echo 'Erreur modification: ' . $e->getMessage();
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
    
    public static function QuestionRéussie($idJoueur,$money,$idQuestion){
        try {
            $mybd = self::Connection();
            $sql = $mybd->prepare("CALL questionReussie(?, ?, ?)");
            $sql->bindParam(1, $idJoueur);
            $sql->bindParam(2, $money);
            $sql->bindParam(3, $idQuestion);
            $sql->execute();
            return "Bravo";
        } catch (PDOException $e) {
            echo 'Erreur insertion: ' . $e->getMessage();
            exit();
        }
    }
    public static function QuestionEchoue($idJoueur,$money,$idQuestion){
        try {
            $mybd = self::Connection();
            $sql = $mybd->prepare("CALL questionEchoue(?, ?, ?)");
            $sql->bindParam(1, $idJoueur);
            $sql->bindParam(2, $money);
            $sql->bindParam(3, $idQuestion);
            $sql->execute();
            return "Bravo";
        } catch (PDOException $e) {
            echo 'Erreur insertion: ' . $e->getMessage();
            exit();
        }
    }
    public static function GetInventaire($idJoueur)
    {
        try {
            $mybd = self::Connection();
            $sql = $mybd->prepare("CALL avoirInventaireJ(?)");
            $sql->bindParam(1, $idJoueur);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
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
    
    public static function TrouverJoueurID($id)
    {
        try {
            $mybd = self::Connection();
            $sql = $mybd->prepare("CALL trouverJoueurID(?)");
            $sql->bindParam(1, $id);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            exit();
        }
    }

    public static function TrouverStat($id)
    {
        try {
            $mybd = self::Connection();
            $sql = $mybd->prepare("CALL trouverStat(?)");
            $sql->bindParam(1, $id);
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
    public static function getReponse($idEnigme) {
        try {
            $mybd = self::Connection();
            $sql = $mybd->prepare("CALL trouverReponses(?)");
            $sql->bindParam(1, $idEnigme);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo 'Erreur recherche: ' . $e->getMessage();
            exit();
        }
    }
    
    public static function getEnigme($difficulte,$type) {
        try {
            $mybd = self::Connection();
            $sql = $mybd->prepare("CALL trouverQuestion(?,?)");
            $sql->bindParam(1, $difficulte);
            $sql->bindParam(2, $type);
            $sql->execute();
            return $sql->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo 'Erreur recherche: ' . $e->getMessage();
            exit();
        }
    }
    public static function getCommentsByItem($idItem) {
        $conn = self::Connection();
        $sql = "SELECT Commentaires.nbEtoiles, Commentaires.lecommentaire, Commentaires.idJoueur, Joueurs.alias 
                FROM Commentaires 
                JOIN Joueurs ON Commentaires.IdJoueur = Joueurs.IdJoueur
                WHERE Commentaires.dItem = :idItem";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idItem', $idItem, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public static function hasPlayerCommentedOnItem($playerId, $itemId) {
        try {
            $conn = self::Connection();
            $query = "SELECT COUNT(*) as count FROM Commentaires WHERE IdJoueur = :playerId AND dItem = :itemId";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':playerId', $playerId, PDO::PARAM_INT);
            $stmt->bindParam(':itemId', $itemId, PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['count'] > 0;
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            exit();
        }
    }
    public static function insertComment($dItem, $leCommentaire, $nbEtoiles)
    {
        try {
            $idJoueur = $_SESSION["currentPlayer"]->Id;

            $mybd = self::Connection();
            $sql = $mybd->prepare("INSERT INTO Commentaires (dItem, IdJoueur, lecommentaire, nbEtoiles) VALUES (?, ?, ?, ?)");
            $sql->bindParam(1, $dItem);
            $sql->bindParam(2, $idJoueur);
            $sql->bindParam(3, $leCommentaire);
            $sql->bindParam(4, $nbEtoiles);
            $sql->execute();

            return "Comment inserted successfully.";
        } catch (PDOException $e) {
            echo 'Error inserting comment: ' . $e->getMessage();
            exit();
        }
    }
    public static function NiveauAlchi($idJoueur,$nbr){
        try {
            $mybd = self::Connection();
            $sql = $mybd->prepare("CALL niveauAlchimiste(?,?)");
            $sql->bindParam(1, $idJoueur);
            $sql->bindParam(2, $nbr);
            $sql->execute();
            return "Bravo";
        } catch (PDOException $e) {
            echo 'Erreur insertion: ' . $e->getMessage();
            exit();
        }
    }
    
    public static function ChangeAlchi($idJoueur,$newNiveau){
        try {
            $mybd = self::Connection();
            $sql = $mybd->prepare("CALL ChangeAlchi(?, ?)");
            $sql->bindParam(1, $idJoueur);
            $sql->bindParam(2, $newNiveau);
            $sql->execute();
            return "Bravo";
        } catch (PDOException $e) {
            echo 'Erreur insertion: ' . $e->getMessage();
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
    public static function getRecetteById($id) {
        $mybd = self::Connection();
        $sql = $mybd->prepare("SELECT * FROM Recettes WHERE Potions_idItem = :id");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }
public static function getAllRecettes() {
        $mybd = self::Connection();
        $sql = $mybd->prepare("SELECT * FROM Recettes");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }
    //!!!!!!!!! À NE SURTOUT PAS UTILISER!!!!!!!!!!!!!!!!!!!
    public static function Select($columns, $table, $where = '')
    {
        try {
            $mybd = self::Connection();
            $sql = "SELECT $columns FROM $table";
            if (!empty($where)) {
                $sql .= " WHERE $where";
            }
            $stmt = $mybd->query($sql);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            exit();
        }
    }
    public static function getSolde($idJ)
    {
        try {
            $mybd = self::Connection();
            $sql = "SELECT solde FROM Joueurs WHERE idjoueur = $idJ";
            $stmt = $mybd->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            exit();
        }
    }

    public static function getAllPotions()
    {
        try {
            $mybd = self::Connection();
            $sql = "SELECT * FROM Items WHERE typeItem = 'P'";
            $stmt = $mybd->query($sql);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            exit();
        }
    }
public static function Concocter($idPotion, $idJoueur)
    {
        try
        {
            $success = true;

            $recettes = DB::getRecetteById($idPotion);
            foreach ($recettes as $recette) {
                $quantity = $recette->Quantite;
                $element = $recette->Elements_idItem;
                if($success == 1){
                    $mybd = self::Connection();
                    $sql = $mybd->prepare("SELECT checkQuantity($idJoueur, $element, $quantity)");
                    $sql->execute(); 
                    $retour = $sql->fetch();
                    $success = $retour[0];

                }
            }
            if ($success == 1) {
                foreach($recettes as $recette){
                    $quantity = $recette->Quantite;
                    $element = $recette->Elements_idItem;
                    $mybd = self::Connection();
                    $sql = $mybd->prepare("CALL updateElement(?, ?, ?)");
                    $sql->bindParam(1, $idJoueur);
                    $sql->bindParam(2, $element);
                    $sql->bindParam(3, $quantity);
                    $sql->execute(); 
                }

                $qttPotion = 1;
                $mybd = self::Connection();
                $sql = $mybd->prepare("CALL concocter(?, ?, ?)");
                $sql->bindParam(1, $idPotion);
                $sql->bindParam(2, $idJoueur);
                $sql->bindParam(3, $qttPotion);
                $sql->execute();
                $joueur = ($_SESSION['currentPlayer']);
                $joueur->setExp();
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo 'Erreur modification: ' . $e->getMessage();
            exit();
        }
    }

}

class AliasException extends Exception {}
  