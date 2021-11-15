<?php

session_start();

require_once "connect.php";

if (!empty($_POST)) {
    $verifier = true;
    $id = $_POST['id'];
}
$sel=$db->prepare("SELECT book.id, title, author_id, publication_date, genre, publisher, firstname, lastname FROM book LEFT JOIN author ON book.author_id = author.id ORDER BY book.id");
$sel->setFetchMode(PDO::FETCH_ASSOC);
$sel->execute();
$_SESSION['item'][]=$sel->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="/public/css/style.css" rel="stylesheet">
</head>
<body>
    <header>
        <?php
            include 'connected.php';
        ?>
    </header>
    <div id="book_form">
        <h2> Your Purchases</h2>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>author</th>
                    <th>publication date</th>
                    <th>genre</th>
                    <th>editor</th>
                </tr>
            </thead>

            <tbody>
                <?php
                // var_dump($_SESSION['item'][0][0]['title']);
                // die();
                for($i=0; $i<count($_SESSION['item']);$i++){ ?>
                    <tr>
                        <td>
                            <?php echo $_SESSION['item'][$i][$i]["id"];?>
                        </td>
                        <td>
                            <?php echo $_SESSION['item'][$i][$i]["title"];?>
                        </td>
                        <td>
                            <?php echo $_SESSION['item'][$i][$i]["firstname"] ." ". $_SESSION['item'][$i][$i]["lastname"];?>
                        </td>
                        <td>
                            <?php echo $_SESSION['item'][$i][$i]["publication_date"]?>
                        </td>
                        <td>
                            <?php echo $_SESSION['item'][$i][$i]["genre"]?>
                        </td>
                        <td>
                            <?php echo $_SESSION['item'][$i][$i]["publisher"]?>
                        </td>
                        <td>
                            <a href="/public/php/delete.php?id=<?php echo $_SESSION['item'][$i][$i]["id"]; ?>"><i class="fas fa-trash-alt fa-2x"></i></a>
                        </td>
                        <td>
                            <form action="public/php/cart.php" method="post">
                                <input type="hidden" value="<?php echo $tab[$i]["id"]; ?>">
                                <button type="submit" name="submit" value="cart"><i class="fas fa-shopping-cart fa-2x"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php  }?>    
            </tbody> #}
        </table>
    </div>
</body>
</html>