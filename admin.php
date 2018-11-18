<?php
require_once "php/DataHandler.php";
$DataHandler = new DataHandler("localhost", "test", "test", "test");

if ( isset($_POST["submit"]) &&  isset($_POST["articleName"]) ) {
    $value = $_POST['articleName'];

    if ($DataHandler->create("articles", "'$value'", "product")) {
        if ($DataHandler->usedID) {
            echo "product is succesvol aangemaakt";
        }
    };
} else {
    echo '<!DOCTYPE html>
    <html lang="nl" dir="ltr">
        <head>
            <meta charset="utf-8">
            <title></title>
        </head>
        <body>
            <h1>Product toevoegen</h1>
            <form class="" action="admin.php" method="post">
                <input type="text" name="articleName" value=""><br>
                <input type="submit" name="submit" value="verzenden">
            </form>
        </body>
    </html>';
}


?>
