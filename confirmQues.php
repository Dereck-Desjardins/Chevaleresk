<?php
include_once "Models/joueurs.php";
include 'php/sessionManager.php';
include 'php/formUtilities.php';

$idEnigme = 'idEnigme =';
$idEnigme .= $_GET['id'];
$reussite = $_GET['reu'];
$enigme = DB::Select('*', 'Enigmes', $idEnigme);

$diff = $enigme["Difficulte"];
$type = $enigme["TypeEnigme"];

$money = 0;
if ($diff == 'f') {
  $money = 50;
} else if ($diff == 'm') {
  $money = 100;
} else if ($diff == 'd') {
  $money = 200;
}
if ($reussite == 1) {
  if ($type == 'E' || $type == 'P' && $_SESSION['currentPlayer']->Niveau == 'herboriste') {
    $joueur = $_SESSION['currentPlayer'];
    $joueur->setExp();
  }
  DB::QuestionRéussie($_SESSION['currentPlayer']->Id, $money, $enigme["idEnigme"]);
}

if (isset($_GET['chx']) && $_GET['chx'] == 1) {
  header('Location: boutique.php');
} else if (isset($_GET['chx']) && $_GET['chx'] == 2) {
  header('Location: Question.php?dif=$diff&type=$type');
} else if (isset($_GET['chx']) && $_GET['chx'] == 3) {
  header('Location:enigma.php');
}