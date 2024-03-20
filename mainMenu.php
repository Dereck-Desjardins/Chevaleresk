<?php
include_once 'MySql/db_connection.php';

//Création de la class BD
$db = new DB();
$result = $db->Select('photo,nom', 'items', 'idItem = 4');
// Valeur de $result = array(1) { [0]=> array(1) { ["photo"]=> string(11) "THEKING.jpg" } }
//Si tu veut connaitre la valeur du tableau retourné juste faire var_dump($result);


$photo = "data/img/" . $result[0]['photo'];
$nom = $result[0]['nom'];
// Construction du contenu HTML avec le chemin de l'image
$content = <<<HTML
        <div class="content">
        <a href="$photo"><img  src=$photo ></a> 
        </div>
        $nom
HTML;

include "views/master.php";
?>