<?php
require 'php/sessionManager.php';


$content = <<<HTML
        <!-- <div class="slider">
            <div class="slide">
                <img class="img" src="data\img/Image/darkvader.png" alt="Slide 1">
            </div>
            <div class="slide">
                <img class="img" src="data\img/Image/wood.jpg" alt="Slide 2">
            </div>
        </div>   -->
        <div class="content">
            <!-- Loic Lompo-->
            <div class="row">
            <div class="card">
                <img class="card-photo" src="data\img/Image/loic.jpg">
                <div class="card-title">Loic Lompo <br>
                    <span>BD &amp; PHP &amp; HTML</span>
                </div>
                <div class="card-socials">
                </div>
            </div>
            <!-- Dereck  -->
            <div class="card">
                <img class="card-photo" src="data\img/Image/Fleur.jpg">
                <div class="card-title">Dereck Dejardins <br>
                    <span>Html &amp; CSS &amp; PHP</span>
                </div>
                <div class="card-socials">
                </div>
            </div>
            </div>
        <!-- Mathieu Roy -->
            <div class="row">
            <div class="card">
                <img class="card-photo" src="data\img/Image/mathieu.jpg">
                <div class="card-title">Mathieu Roy <br>
                    <span>Html &amp; CSS &amp; JS</span>
                </div>
                <div class="card-socials">
                </div>
            </div>
            <!-- Jacob  -->
            <div class="card">
                <img class="card-photo" src="data\img/Image/kevin_g.jpg">
                <div class="card-title">Jacob Lebel-Frenette <br>
                    <span>Html &amp; CSS &amp; PHP</span>
                </div>
                <div class="card-socials">
                </div>
            </div>
            </div>
            </div>
        </div>
        
    
    <style>
        .img{
            padding-bottom: 2%;
            padding-top: none;
            margin: auto;
            display: block;
            height: 600px;
            width: 70%;          
        }
        .slider{
            padding-bottom: none;
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
        /* before adding the photo to the div with the "card-photo" class, in the css clear the styles for .card-photo and remove .card-photo::before and .card-photo::after, then set the desired styles for .card- photo. */

.card {
  --font-color: #323232;
  --font-color-sub: #666;
  --bg-color: #fff;
  --main-color: #323232;
  width: 200px;
  height: 254px;
  background: var(--bg-color);
  border: 2px solid var(--main-color);
  box-shadow: 4px 4px var(--main-color);
  border-radius: 5px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  margin: 80px;
}

.card-photo {
    height: 100px;
    width: 100px;

}



.card-title {
  text-align: left;
  color: var(--font-color);
  font-size: 18px;
  font-weight: 400;
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}

.card-title span {
  font-size: 15px;
  color: var(--font-color-sub);
}

.card-socials {
  display: flex;
  height: 0;
  opacity: 0;
  margin-top: 20px;
  gap: 20px;
  transition: 0.5s;
}

.card-socials-btn {
  width: 25px;
  height: 25px;
  border: none;
  background: transparent;
  cursor: pointer;
}

.card-socials-btn svg {
  width: 100%;
  height: 100%;
  fill: var(--main-color);
}

.card:hover > .card-socials {
  opacity: 1;
  height: 35px;
}

.card-socials-btn:hover {
  transform: translateY(-5px);
  transition: all 0.15s;
}
    </style>
    <!-- Script JavaScript pour le slider -->
    <script>
        var slideIndex = 0;
        carousel();
        function carousel() {
            var i;
            var slides = document.getElementsByClassName("slide");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
            }
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}    
            slides[slideIndex-1].style.display = "block";  
            setTimeout(carousel, 5000); // Change image every 2 seconds
        }
    </script>
HTML;
include "views/master.php";