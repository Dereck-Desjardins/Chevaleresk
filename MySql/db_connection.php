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

        $conn = mysqli_connect($servername, $username, $password, $db);
        if (!$conn) {
            die ("Connection failed: " . mysqli_connect_error());
        }

        $this->Con = $conn;
    }
    public function InsertJoueur($prenom, $nom, $alias, $courriel, $mp) {
        $this->Connection();
    
        $sql = "CALL ajouterJoueurs(?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->Con->prepare($sql);
    
        if ($stmt === false) {
            echo "Error preparing statement: " . $this->Con->error;
            return [];
        }
    
        $admin = 0;
        $solde = 0;
        $niveau = 0;
    
        $stmt->bind_param("sssiiss", $alias, $nom, $prenom, $solde, $niveau, $admin, $mp, $courriel);
    
        $result = $stmt->execute();
    
        if ($result) {
            return "Le Joueur est inséré avec succès.";
        } else {
            echo "Error executing statement: " . $stmt->error;
            return [];
        }
    }
    public function InsertArme($nom, $qt, $prix, $photo, $description, $efficacite, $genre)
    {
        $this->Connection();

        $sql = "CALL ajouterArme(?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->Con->prepare($sql);

        if ($stmt === false) {
            echo "Error preparing statement: " . $this->Con->error;
            return [];
        }

        $stmt->bind_param("siissss", $nom, $qt, $prix, $photo, $description, $efficacite, $genre);

        $result = $stmt->execute();

        if ($result) {
            return "Arme insérée avec succès.";
        } else {
            echo "Error executing statement: " . $stmt->error;
            return [];
        }
    }
    

    public function TrouverJoueur($courriel)
    {
        $this->Connection();
    
        $sql = "CALL trouverJoueur(?)";
    
        $stmt = $this->Con->prepare($sql);
    
        if ($stmt === false) {
            echo "Error preparing statement: " . $this->Con->error;
            return [];
        }
    
        $stmt->bind_param("s", $courriel);
    
        $result = $stmt->execute();
    
        if ($result) {
            $data = [];
            $result = $stmt->get_result(); 
    
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            
            $stmt->close(); 
            return $data;
        } else {
            echo "Error: " . $this->Con->error;
            return [];
        }
    }
    


    public function Select($columns, $table, $where = '')
    {
        $this->Connection();

        $sql = "SELECT $columns FROM $table";
        if (!empty ($where)) {
            $sql .= " WHERE $where";
        }

        $result = $this->Con->query($sql);

        if ($result) {
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            $result->free();
            return $data;
        } else {
            echo "Error: " . $this->Con->error;
            return [];
        }
    }

}

