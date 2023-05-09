<?php
header("refresh: 3; url=http://localhost/lendMeProject/Teilerado/homepage.php");
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<style>
    body, html{
        height: 100%;
        width: 100%;
        background: linear-gradient(to bottom, #6A6FDE, #5BA9F0);
        overflow: hidden;
    }

    .container{
        height: 100%;
        width: 100%;
        flex-direction: column;
        display: flex;
        align-items: center;
        font-family:Verdana, Geneva, Tahoma, sans-serif;
    }

    .verified_text{
        margin-top: 100px;
        color: white;
    }

    .verified_icon{
        height: 65px;
        width: 65px;
        background-color: rgb(39, 39, 39);
        border-radius: 100px;
        align-content: center;
        align-items: center;
        color: white;
        justify-content: center;
        display: flex;
        box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }

    .spacer{
        height: 50px;
    }

    .closing_text{
        margin-bottom: 10px;
        color: white
    }
</style>
<body>
<div class="container">
    <h1 class="verified_text">Erfolgreich verifiziert</h1>
    <div class="spacer"></div>
    <div class="verified_icon">
        <div style="font-size:115px; color: rgb(28, 116, 28);">&#x2713;</div>
    </div>
    <div class="spacer"></div>
    <h3 class="closing_text">Die Seite schließt sich automatisch in...</h3>
    <div class="spacer"></div>
    <div id="countdown"></div>
</div>
</body>
</html>
