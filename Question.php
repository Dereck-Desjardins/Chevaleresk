<?php
include 'php/sessionManager.php';
include 'php/formUtilities.php';

if (!isset($_SESSION['currentPlayer'])) {
  header('Location: login.php?message=4');
} else {
  //Avoir la difficultée
  $difficulte = $_GET['diff'];
  $type = $_GET['type'];

  $enigme;
  $enigme = DB::getEnigme($difficulte,$type);

  $id_enigme = $enigme->idEnigme;
  $Item = DB::getItemById($enigme->idItem);
  $photo = $Item->photo;
  $id = $Item->idItem;

  $Question = $enigme->Enonce;
  $ImageFolder = "data/img/" . $photo;

  $Price;
  $Title;
  if ($enigme->Difficulte == 'f') {
    $Price = 50;
    $Title = 'Question Facile';
  } else if ($enigme->Difficulte == 'm') {
    $Price = 100;
    $Title = 'Question Moyenne';
  } else if ($enigme->Difficulte == 'd') {
    $Price = 200;
    $Title = 'Question Difficile';
  }

  $reponses = DB::getReponse($enigme->idEnigme);

  $tab_rep = [];
  foreach ($reponses as $r) {
    array_push($tab_rep, $r->Lareponse);

  }

  //Random disposition de la question
  shuffle($tab_rep);

  $nbr0 = 0;
  $LuckyNumber;
  foreach ($tab_rep as $r) {
    if ($reponses[0]->EstBonne == 'o' && $reponses[0]->Lareponse == $r) {
      $LuckyNumber = $nbr0;
    }
    $nbr0 = $nbr0 + 1;
  }

  $content = <<<HTML
    <div class="content">
        <div class="detailContainer">
        <div class="title">$Title</div>
        <div class="photoItem">
            <a href="detailItem.php?id=$id&lastPage=1"><img src="$ImageFolder" alt="" class="photo"></a>
        </div>
        <div class="name">$Question</div>
        <div class="content">
            <div class="row">
                <a class="card" onclick="Verif($LuckyNumber,0)">$tab_rep[0]</a>
                <a class="card"  onclick="Verif($LuckyNumber,1)">$tab_rep[1]</a>
            </div>
            <div class="row">
                <a class="card"  onclick="Verif($LuckyNumber,2)">$tab_rep[2]</a>
                <a class="card" onclick="Verif($LuckyNumber,3)">$tab_rep[3]</a>
            </div>
        </div>
        <div class="content">Récompense: $Price ecus</div>
        <div id="myModal" class="modal">

        <div class="modal-content">
          <p><b>Bravo!</b> Vous avez eu la bonne réponse.</p>
          <button onclick="Back($id_enigme,1,1)">Retourné à la boutique</button>
          <button onclick="Back($id_enigme,2,1)">Faire une autre question</button>
          <button onclick="Back($id_enigme,3,1)">Choisir une autre difficulté</button>
        </div>
        </div>

        <div id="myModalErreur" class="modal">

        <div class="modal-content">
          <p> Vous avez eu la mauvaise réponse.</p>
          <button onclick="Back($id_enigme,1,0)">Retourné à la boutique</button>
          <button onclick="Back($id_enigme,2,0)">Faire une autre question</button>
          <button onclick="Back($id_enigme,3,0)">Choisir une autre difficulté</button>
        </div>
        </div>
    HTML;
}
include "views/master.php";
?>
<script>
  function Back(nbr, choix,reussite) {
    //console.log(nbr)
    window.location.href = "confirmQues.php?chx=" + choix + " &id=" + nbr+ " &reu=" + reussite;
  }

  function Verif(nbr, element) {
    const tabP = document.querySelectorAll(".card");
    if (nbr == element) {
      for (const p of tabP) {
        p.style.borderColor = "red";
        p.style.borderWidth = "5px";
      }
      tabP[nbr].style.borderColor = "green";
      setTimeout(
        function () {
          Pop();
        }, 1000);

      //alert("Bravo")
    }
    else {
      for (const p of tabP) {
        p.style.borderColor = "red";
        p.style.borderWidth = "5px";
      }
      tabP[nbr].style.borderColor = "green";
      PopErreur()

    }
  }

  function PopErreur() {
    var modal = document.getElementById("myModalErreur");
    modal.style.display = "block";
  }

  function Pop() {
    var modal = document.getElementById("myModal");
    modal.style.display = "block";
  }
</script>

<style>
  .modal {
    display: none;
    /* Hidden by default */
    position: fixed;
    /* Stay in place */
    z-index: 1;
    /* Sit on top */
    padding-top: 100px;
    /* Location of the box */
    left: 0;
    top: 0;
    width: 100%;
    /* Full width */
    height: 100%;
    /* Full height */
    overflow: auto;
    /* Enable scroll if needed */
    background-color: rgb(0, 0, 0);
    /* Fallback color */
    background-color: rgba(0, 0, 0, 0.4);
    /* Black w/ opacity */
  }

  .modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
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