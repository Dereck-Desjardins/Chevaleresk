<?php
include 'php/formUtilities.php';
include 'php/sessionManager.php';

$style1 = '';
$style2 = '';
$style3 = '';
$enigme;
if (!($enigme = DB::getEnigme('f', 'a'))) {
    $style1 = 'pointer-events: none; opacity: 0.5;';
}
 if(!($enigme = DB::getEnigme('m', 'a')) ){
    $style2 = 'pointer-events: none; opacity: 0.5;';
}
 if(!($enigme = DB::getEnigme('d', 'a')) ){
    $style3 = 'pointer-events: none; opacity: 0.5;';
}
if(!($enigme = DB::getEnigme('a', 'a')) ){
  $style4 = 'pointer-events: none; opacity: 0.5;';
}

    $content = <<<HTML
    <h1 class="title">Choisissez une difficulté</h1>
        <div class="content">
            <div class="row">
                <a class="card" href="enigmaType.php?diff=f" style="$style1">Facile</a>
                <a class="card" href="enigmaType.php?diff=m" style="$style2">Moyen</a>
            </div>
            <div class="row">
                <a class="card" href="enigmaType.php?diff=d" style="$style3">Difficile</a>
                <a class="card" href="enigmaType.php?diff=a" style="$style4">Aléatoire</a>
            </div>
        </div>
    HTML;
    include "views/master.php";
?>

<style>

.title {
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 2.5em;
}
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