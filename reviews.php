<?php
include_once "Models/joueurs.php";
include_once 'Models/items.php';
include_once 'MySql/db_connection.php';
include_once 'php/sessionManager.php';

$idItem = $_GET['id'];

$comments = DB::getCommentsByItem($idItem);
$content = '';

foreach ($comments as $comment) {
    $stars = $comment->nbEtoiles; 
    $commentText = $comment->lecommentaire;
    $IdJoueur = $comment->idJoueur;
    $alias = $comment->alias;

    $delete = '';
    if($IdJoueur == $_SESSION['currentPlayer']->Id){
        $delete .= <<<HTML
        <input type="button" value="delete"/>
        HTML;
    }

    $starRatings = '';
    for ($i = 5; $i >= 1; $i--) {
        $checked = ($i == $stars) ? 'checked' : '';
        $starRatings .= <<<HTML
            <input class="star star-$i"  type="radio" $checked disabled/>
            <label class="star star-$i" ></label>
        HTML;
    }

    $content .= <<<HTML
    <div class="review-container">
        <div class="alias">
            Alias: $alias
        </div>
        <div class="stars">
            $starRatings
        </div>
        <div class="comment">
            <h4>$commentText </h4> 
        </div>
        <div>
            $delete
        </div>
    </div>
HTML;
}

include "views/master.php";
?>
<style>
    .review-container {
        border: 1px solid #ddd;
        padding: 15px;
        margin: 15px 0;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    .alias {
        font-weight: bold;
        margin-bottom: 10px;
    }

    .comment {
        margin-top: 10px;
    }
</style>