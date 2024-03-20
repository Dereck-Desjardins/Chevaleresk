<?php
class DB{ 
    public $Con = "";
    public function Connection(){
        $servername = "localhost";
        $username = "root";
        $password = "banane2005";
        $db = "dbchevalersk6";
        
        // Create connection
        $conn = mysqli_connect($servername, $username, $password,$db);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }   
        
        $this->Con = $conn;
    }

    //Un Select Général pour l'instant 
    public function Select($columns = '*', $table, $where = '')
    {
        //établir la connexion
        $this->Connection();
    
        //requête SQL
        $sql = "SELECT $columns FROM $table";
        if (!empty($where)) {
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