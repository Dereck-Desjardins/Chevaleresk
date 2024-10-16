<?php
include 'php/sessionManager.php';
include 'php/formUtilities.php';

$diff = $_GET['diff'];
$style1 = '';
$style2 = '';
$style3 = '';
$enigme;
if (!($enigme = DB::getEnigme($diff, 'E'))) {
    $style2 = 'pointer-events: none; opacity: 0.5;';
}
 if(!($enigme = DB::getEnigme($diff, 'P')) ){
    $style1 = 'pointer-events: none; opacity: 0.5;';
}
 if(!($enigme = DB::getEnigme($diff, 'Z')) ){
    $style3 = 'pointer-events: none; opacity: 0.5;';
}

$content = <<<HTML
        <div class="content">
            <div class="row">
                <a  class="card"  href="Question.php?diff=$diff&type=P" style="$style1">Potion</a>
                <a  class="card"  href="Question.php?diff=$diff&type=E" style="$style2">Element</a>
            </div>
            <div class="row">
                <a class="card"  href="Question.php?diff=$diff&type=Z" style="$style3">Autre</a>
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