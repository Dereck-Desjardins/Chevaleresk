<?php
require 'php/sessionManager.php';


$content = <<<HTML
    <div class="content">
        <div class="slider">
            <div class="slide">
                <img src="Image/darkvader.png" alt="Slide 1">
            </div>
            <div class="slide">
                <img src="Image/wood.jpg" alt="Slide 2">
            </div>
            <!-- Ajoutez plus de diapositives si nécessaire -->
        </div>
        <div>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt aliquam delectus minus non nesciunt esse dolorem impedit adipisci? Culpa ratione maiores officiis quisquam sapiente corporis, harum sint unde laudantium dolores! Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, impedit? Consequatur maiores autem doloremque, odit dolor quos et placeat alias qui in repellat temporibus sequi totam id dignissimos doloribus dolore.
            Impedit culpa id natus dicta explicabo perspiciatis vero veniam laborum suscipit dolores quos minima a quis eum, provident maxime possimus odit commodi expedita voluptatibus dolorum similique optio. Molestiae, quos odit.
            Quam harum modi obcaecati minus fugit, recusandae commodi itaque illum quis exercitationem asperiores nam fuga voluptatem quisquam incidunt maiores hic. Cum officiis ipsa nobis culpa rerum dolores necessitatibus! Quos, quia.
            Accusamus quas temporibus asperiores, modi doloremque fugiat saepe, iste reiciendis fugit alias pariatur incidunt excepturi aspernatur eius, libero quibusdam inventore consectetur et nemo facere a quidem! Tenetur praesentium laborum quibusdam!
            Asperiores aperiam fugiat, laudantium, quisquam quo minus provident corrupti repudiandae earum velit doloribus repellat eligendi modi fugit deleniti placeat doloremque. Illum asperiores soluta, nesciunt est tenetur repudiandae pariatur totam quam.
            Quae minus, cupiditate quam consequatur doloremque modi, qui odio dolorem corrupti, temporibus voluptatem cum aliquam ducimus aperiam odit earum? Alias hic blanditiis nisi ad optio. Sequi voluptatem quisquam laudantium dolores.
            A sit repellat odio reiciendis porro, itaque earum asperiores fugit corrupti magnam dolore fuga deserunt mollitia distinctio, aliquid rem quasi tenetur ducimus repellendus aut. Repellendus tempora neque perferendis quaerat laudantium!
            Commodi facere iste molestiae dolores consequatur voluptatem consequuntur esse. Ducimus et voluptatibus, eum saepe iusto incidunt similique consequatur iste voluptate praesentium corporis distinctio, earum minus blanditiis nostrum tenetur ut dolore.
            Maiores, commodi? Facere assumenda nesciunt harum quidem tempora ab. Beatae corporis deserunt aut eveniet tenetur cupiditate, facere libero totam dolor accusamus vero voluptatum modi dolore accusantium, voluptate alias error. Vel.
            Provident officia est, inventore, cum beatae illo ipsam maxime quaerat at praesentium fuga! Expedita corrupti esse minima minus laborum delectus, repudiandae, modi eaque rem eveniet veniam quo deleniti dicta voluptatibus?
        </div>
    </div>
    <style>
        img{
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
        .content{
            padding-bottom: 2%;
            padding-top: none;
            margin: auto;
            display: block;
            height: 600px;
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