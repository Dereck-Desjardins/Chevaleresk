<?php
    include 'views/header.php';
    $styles = file_get_contents("views/styles.html");
    $scripts = file_get_contents("views/scripts.html");

    echo <<<HTML
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>$pageTitle</title>
    $styles
</head>
<body style="background-color: #888C90;">
    <div id="main">
        <div id="header">
            $header
        </div>
        <div style="padding-top: 100px">
            $content
        </div>
    </div>
</body>
</html>
HTML;
