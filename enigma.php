<?php
include 'php/sessionManager.php';
    $content = <<<HTML
        <div class="content">
            <div class="row">
                <a class="card" href="QuestionFacile.php">Facile</a>
                <a class="card" href="QuestionMoyen.php">Moyen</a>
            </div>
            <div class="row">
                <a class="card" href="QuestionDifficile.php">Difficile</a>
                <a class="card" href="QuestionAléatoire.php">Aléatoire</a>
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
  width: 190px;
  height: 254px;
  margin: 80px; 
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