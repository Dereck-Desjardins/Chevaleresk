<?php
    include 'views/header.php';
    $styles = file_get_contents("views/styles.html");
    $scripts = file_get_contents("views/scripts.html");

    echo <<<HTML
    <!DOCTYPE html>
        <html>
        <header>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>$pageTitle</title>
            $styles
        </header>
        <body>
            <div id="main">
                <div id="header">
                    $header
                </div>
                <div id="content">
                    $content
                </div>
            </div>
        </body>
        </html>
HTML;