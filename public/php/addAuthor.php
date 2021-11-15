<?php

require_once "connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['submit'])){
        $firstname = htmlspecialchars(addslashes($_POST['firstname']));
        $lastname = htmlspecialchars(addslashes($_POST['lastname']));
        $art_movement = htmlspecialchars(addslashes($_POST['art_movement']));
        $artistic_genre = htmlspecialchars(addslashes($_POST['artistic_genre']));
        var_dump($firstname);
        var_dump($lastname);
        $result = $db->query("INSERT INTO author (firstname, lastname, art_movement, artistic_genre) VALUES ('$firstname','$lastname','$art_movement','$artistic_genre')");
        $result->setFetchMode(PDO::FETCH_OBJ);
        var_dump($result);
        
        header('location:/index.php');
    } elseif(empty($result)){
        echo "no datas";
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Author</title>
    <link href="/public/css/style.css" rel="stylesheet">
</head>
<body>
    <header>
        <?php
            include 'connected.php';
        ?>
    </header>
    <h3> Add an Author</h3>
    <form action="" method="post">
        <div id="book_form">
        <p>
            <label>Firstname</label>
            <input type="text" name="firstname">
        </p>
        <p>
            <label>Lastname</label>
            <input type="text" name="lastname">
        </p>
        <p>
            <label>Art Movement</label>
            <input type="text" name="art_movement">
        </p>
        <p>
            <label>Artistic Genre</label>
            <input type="text" name="artistic_genre">
        </p>
        <p>
            <input type="submit" name="submit" value="Add Author">
        </p>
</body>
</html>