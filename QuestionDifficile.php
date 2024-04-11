<?php
    include 'php/sessionManager.php';
    include 'php/formUtilities.php';

    $idItem = $_GET['id'];
    $Item = DB::FindDetailsItem($idItem);
    $nom = $Item[0]->nom;
    $photo = $Item[0]->photo;
    $ImageFolder = "data/img/".$photo;
    $content = <<<HTML
    <div class="content">
        <div class="detailContainer">
        <div class="title">Question Difficile</div>
        <div class="photoItem">
            <img src="$ImageFolder" alt="" class="photo">
        </div>
        <div class="name">$nom</div>
        <div class="content">
            <div class="row">
                <a class="card" href="mainMenu.php">Facile</a>
                <a class="card" href="mainMenu.php">Moyen</a>
            </div>
            <div class="row">
                <a class="card" href="mainMenu.php">Difficile</a>
                <a class="card" href="mainMenu.php">Alchimiste</a>
            </div>
        </div>
    HTML;
    include "views/master.php";
?>

<style>
    .content {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.row {
  display: flex;
  justify-content: space-around;
}

.card {
  box-sizing: border-box;
  width: 350px;
  height: 125px;
  margin: 20px; 
  background: rgba(217, 217, 217, 0.58);
  border: 1px solid white;
  box-shadow: 12px 17px 51px rgba(0, 0, 0, 0.22);
  backdrop-filter: blur(6px);
  border-radius: 17px;
  text-align: center;
  cursor: pointer;
  transition: all 0.5s;
  display: flex;
  align-items: center;
  justify-content: center;
  user-select: none;
  font-weight: bolder;
  color: black;
}

.card:hover {
  border: 1px solid black;
  transform: scale(1.05);
}

.card:active {
  transform: scale(0.95) rotateZ(1.7deg);
}
</style>