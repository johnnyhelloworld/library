<?php

$book_id = $_GET['id'];
$firstname = $_GET['firstname'];
$lastname = $_GET['lastname'];

require_once "connect.php";

if(isset($_POST['submit'])){
    $title = htmlspecialchars(addslashes($_POST['title']));
    $publication_date = htmlspecialchars(addslashes($_POST['publication_date']));
    $genre = htmlspecialchars(addslashes($_POST['genre']));
    $publisher = htmlspecialchars(addslashes($_POST['publisher']));

    $edit = $db->query("UPDATE book SET title = '$title', publication_date = '$publication_date', genre = '$genre', publisher = '$publisher' WHERE id = '$book_id'");
    $edit->setFetchMode(PDO::FETCH_OBJ);
        
    if($edit){
        echo "Book successfully updated";
        header('location:/index.php'); 
    }
}
$update = $db->query('SELECT book.id, title, publication_date, genre, publisher, author_id FROM book WHERE book.id='.$book_id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link href="/public/css/style.css" rel="stylesheet">
</head>
<body>
    <header>
        <?php
            include 'connected.php';
        ?>
    </header>
    <div id="content">
        <form action="" method="post">
            <?php
                while($row = $update->fetch()){ ?>
                <p>
                    <label>Book Title</label>
                    <input type="text" name="title" value ="<?php echo $row['title']; ?>">
                </p>
                <p>
                    <label>Author</label>
                    <select name="authors">
                        <option value = ""><?php echo $firstname;?></option>
                        <?php
                        while($line = $datab->fetch()) { 
                            if ($row["author_id"] != $line["id"]){
                        ?> <option value = <?php echo $line["id"] ?>> <?php echo $line["firstname"] . " " . $line["lastname"] ?></option>
                        <?php
                            }
                        } ?> 
                    </select>
                </p>    
                <p>
                    <label>Publication Date</label><br>
                    <input id="date" type="date" name="publication_date" value ="<?php echo $row['publication_date']; ?>">
                </p>
                <p>
                    <label>Genre</label>
                    <input type="text" name="genre" value ="<?php echo $row['genre']; ?>">
                </p>
                <p>
                    <label>Publisher Name</label>
                    <input type="text" name="publisher" value ="<?php echo $row['publisher']; ?>">
                </p>
                <p>
                    <input type="submit" name="submit" value="Update Book Details">
                </p>
            <?php } ?> 
        </form>
    </div>
</body>
</html>