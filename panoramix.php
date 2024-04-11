<?php
    $content = <<<HTML
        <div class="content">
            <div class="panoramixContainer">
            <div class="panoramixMenu">
                
            </div>
            <div class="allRecette">
                <div class="recetteContainer">
                    <div class="recetteLeft">
                        <div class="recetteNom">Potion de vie</div>
                        <div class="recetteIngredient ">
                            <div class="espaceImageIngredient">
                                <img src="photo.jpg" alt="" class="imgIngredient">
                            </div>
                            <div class="quantiteIngredient">X1</div>
                        </div>
                        <div class="recetteIngredient">
                            <div class="espaceImageIngredient">
                                <img src="photo.jpg" alt="" class="imgIngredient">
                            </div>
                            <div class="quantiteIngredient">X2</div>
                        </div>
                        <div class="recetteIngredient">
                            <div class="espaceImageIngredient">
                                <img src="photo.jpg" alt="" class="imgIngredient">
                            </div>
                            <div class="quantiteIngredient">X3</div>
                        </div>
                    </div>
                    <div class="recetteRight">
                        <div class="resultatRecette">
                            <img src="photo.jpg" alt="">
                        </div>
                    </div>
                </div>
                
                <div class="recetteContainer">
                    <div class="recetteLeft">
                        <div class="recetteNom">Potion de vie</div>
                        <div class="recetteIngredient ingredientNon">
                            <div class="espaceImageIngredient">
                                <img src="photo.jpg" alt="" class="imgIngredient">
                            </div>
                            <div class="quantiteIngredient">X1</div>
                        </div>
                        <div class="recetteIngredient ingredientOui">
                            <div class="espaceImageIngredient">
                                <img src="photo.jpg" alt="" class="imgIngredient">
                            </div>
                            <div class="quantiteIngredient">X2</div>
                        </div>
                        <div class="recetteIngredient ingredientPartiel">
                            <div class="espaceImageIngredient ">
                                <img src="photo.jpg" alt="" class="imgIngredient">
                            </div>
                            <div class="quantiteIngredient">X3</div>
                        </div>
                    </div>
                    <div class="recetteRight">
                        <div class="resultatRecette">
                            <img src="photo.jpg" alt="">
                        </div>
                    </div>
                </div>
                
                <div class="recetteContainer">
                    <div class="recetteLeft">
                        <div class="recetteNom">Potion de vie</div>
                        <div class="recetteIngredient">
                            <div class="espaceImageIngredient">
                                <img src="photo.jpg" alt="" class="imgIngredient">
                            </div>
                            <div class="quantiteIngredient">X1</div>
                        </div>
                        <div class="recetteIngredient">
                            <div class="espaceImageIngredient">
                                <img src="photo.jpg" alt="" class="imgIngredient">
                            </div>
                            <div class="quantiteIngredient">X2</div>
                        </div>
                        <div class="recetteIngredient">
                            <div class="espaceImageIngredient">
                                <img src="photo.jpg" alt="" class="imgIngredient">
                            </div>
                            <div class="quantiteIngredient">X3</div>
                        </div>
                    </div>
                    <div class="recetteRight">
                        <div class="resultatRecette">
                            <img src="photo.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>    
            <div class="detailRecette">
                <div class="recetteNomGrand">Potion de vie</div>
                <div class="imageRecetteGrand">
                    <img src="photo.jpg" alt="" class="imgResultatGrand">
                </div>
                <div class="btnCraft">
                    <input type="submit" class="grandBtn">
                </div>
            </div>
        </div>
        </div>
    HTML;
    include "views/master.php";
