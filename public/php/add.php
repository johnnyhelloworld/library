<?php

require_once "connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['submit'])){
        $title = htmlspecialchars(addslashes($_POST['title']));
        $author = htmlspecialchars(addslashes($_POST['author']));
        $publication_date = htmlspecialchars(addslashes($_POST['publication_date']));
        $genre = htmlspecialchars(addslashes($_POST['genre']));
        $publisher = htmlspecialchars(addslashes($_POST['publisher']));

        $result = $db->query("INSERT INTO book (title, publication_date, genre, publisher, author_id) VALUES ('$title','$publication_date', '$genre', '$publisher', '$author')");
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
    <title>Add</title>
    <link href="/public/css/style.css" rel="stylesheet">
</head>
<header>
    <?php
        include 'connected.php';
    ?>
</header>
<body>
    <form action="" method="post">
        <div id="book_form">
        <p>
            <label>Book Title</label>
            <input type="text" name="title">
        </p>
        <p>
            <label>Author Name</label>
            <select id="monselect" name="author">
            <?php 
                while($row = $datab->fetch()) { ?>
                <option value = "<?php echo $row['id'] ?>"><?php echo $row['firstname'] . " " . $row['lastname'] ?></option>
            <?php } ?>
            </select>
        </p>
        <p>
            <label>Publication Date</label><br>
            <input id="date" type="date" name="publication_date">
        </p>
        <p>
            <label>Genre</label>
            <input type="text" name="genre">
        </p>
        <p>
            <label>Publisher Name</label>
            <input type="text" name="publisher">
        </p>
        <p>
            <input type="submit" name="submit" value="Add Book">
        </p>
    </form>
</body>
</html>