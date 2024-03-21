<?php
    $content = <<<HTML
        <div class="content">
        <div id="main">
            <div id="title" class="title">
            <h1>Inventaire</h1>
            </div>
            <div id="content" class="content">
            <div class="select-container">
                <select name="dropdown" id="dropdown">
                    <option value="" disabled selected hidden>Filtre</option>
                    <option value="option1">Quantité</option>
                    <option value="option2">Type</option>
                    <option value="option3">Prix plus petit au plus grand</option>
                    <option value="option4">Prix plus grand au plus petit</option>
                </select>

            </div>
            <div class="input-container">
                <input placeholder="Search.." id="input" class="input" name="text" type="text">
            </div>
            </div>
            <div id="content2" class="content2">
            <div>
                <a href=""><input class="formControl button-SignIn, button" type="button" value="Equipement" /></a>
            </div>
            <div>
                <a href=""><input class="formControl button-SignIn, button" type="button" value="Ingrédients" /></a>
            </div>
        </div>
        </div>
        </div>
    HTML;
    include "views/master.php";
?>

<style>
.title {
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
}

.content {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px 250;
}

.content2 {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px 472px;
}

.select-container {
  margin-right: 20px;
  height: ;
  width: 300px;
}

.input-container {
  margin-left: 20px;
}

.input {
  width: 200px;
  height: 40px;
  border: none;
  outline: none;
  caret-color: rgb(255, 81, 0);
  background-color: rgb(255, 255, 255);
  border-radius: 30px;
  padding-left: 15px;
  letter-spacing: 0.8px;
  color: rgb(19, 19, 19);
  font-size: 13.4px;
}

</style>