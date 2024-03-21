<?php
class DB
{
    public $Con = "";
    public function Connection()
    {
        $servername = "localhost";
        $username = "root";
        $password = "banane2005";
        $db = "dbchevalersk6";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $db);
        // Check connection
        if (!$conn) {
            die ("Connection failed: " . mysqli_connect_error());
        }

        $this->Con = $conn;
    }
    public function InsertJoueur($alias, $nom, $prenom, $Niveau,$admin, $mp,$courriel)
    {
        // établir la connexion
        $this->Connection();

        // éviter les injections SQL
        $sql = "CALL ajouterJoueurs(?, ?, ?, ?, ?, ?, ?)";

        // Préparation 
        $stmt = $this->Con->prepare($sql);

        // Vérification de la préparation 
        if ($stmt === false) {
            echo "Error preparing statement: " . $this->Con->error;
            return [];
        }

        // Liaison des valeurs 
        $stmt->bind_param("sssiss",$alias,$nom,$prenom,$Niveau,$admin,$mp,$courriel);

        // Exécution de la requête
        $result = $stmt->execute();

        // Vérification des résultats
        if ($result) {
            // Si l'insertion réussit
            return "Le Joueur est insérée avec succès.";
        } else {
            // En cas d'échec de la requête
            echo "Error executing statement: " . $stmt->error;
            return [];
        }
    }
    public function InsertArme($nom, $qt, $prix, $photo, $description, $efficacite, $genre)
    {
        // établir la connexion
        $this->Connection();

        // éviter les injections SQL
        $sql = "CALL ajouterArme(?, ?, ?, ?, ?, ?, ?)";

        // Préparation 
        $stmt = $this->Con->prepare($sql);

        // Vérification de la préparation 
        if ($stmt === false) {
            echo "Error preparing statement: " . $this->Con->error;
            return [];
        }

        // Liaison des valeurs 
        $stmt->bind_param("siissss", $nom, $qt, $prix, $photo, $description, $efficacite, $genre);

        // Exécution de la requête
        $result = $stmt->execute();

        // Vérification des résultats
        if ($result) {
            // Si l'insertion réussit
            return "Arme insérée avec succès.";
        } else {
            // En cas d'échec de la requête
            echo "Error executing statement: " . $stmt->error;
            return [];
        }
    }
    

    public function TrouverJoueur($courriel)
    {
        // établir la connexion
        $this->Connection();
    
        // éviter les injections SQL
        $sql = "CALL trouverJoueur(?)";
    
        // Préparation 
        $stmt = $this->Con->prepare($sql);
    
        // Vérification de la préparation 
        if ($stmt === false) {
            echo "Error preparing statement: " . $this->Con->error;
            return [];
        }
    
        // Liaison des valeurs 
        $stmt->bind_param("s", $courriel);
    
        // Exécution de la requête
        $result = $stmt->execute();
    
        // Vérification des résultats
        if ($result) {
            // Récupération des résultats
            $data = [];
            $result = $stmt->get_result(); // Récupérer les résultats
    
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            
            $stmt->close(); // Fermer le statement
            // Retour des résultats
            return $data;
        } else {
            // En cas d'échec de la requête, affichage de l'erreur
            echo "Error: " . $this->Con->error;
            return [];
        }
    }
    


    //Un Select Général pour l'instant 
    public function Select($columns, $table, $where = '')
    {
        //établir la connexion
        $this->Connection();

        //requête SQL
        $sql = "SELECT $columns FROM $table";
        if (!empty ($where)) {
            $sql .= " WHERE $where";
        }

        // Exécution 
        $result = $this->Con->query($sql);

        // Vérification des résultats de la requête ($result == True, alors la requete à fonctionnée)
        if ($result) {
            // Récupération des résultats
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            // Libération de la mémoire 
            $result->free();
            // Retour des résultats
            return $data;
        } else {
            // En cas d'échec de la requête, affichage de l'erreur
            echo "Error: " . $this->Con->error;
            return [];
        }
    }

}

?>