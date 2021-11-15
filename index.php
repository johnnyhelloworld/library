<?php

require_once "public/php/connect.php"; 

$sql = 'SELECT book.id, title, author_id, publication_date, genre, publisher, firstname, lastname FROM book LEFT JOIN author ON book.author_id = author.id ';
if (isset($_GET['terme'])) {
    $search = htmlspecialchars(addslashes($_GET['terme'])); 
    $sql .= "WHERE (`title` LIKE '%".$search."%') OR (`publication_date` LIKE '%".$search."%')";
}

$data = $db->query($sql);
$data->setFetchMode(PDO::FETCH_OBJ);

// Récupérer le nombre d'enregistrements
$count=$db->prepare("SELECT count(id) AS cpt FROM book");
$count->setFetchMode(PDO::FETCH_ASSOC);
$count->execute();
$tcount=$count->fetchAll();

// Pagination
@$page = $_GET["page"];
if(empty($page)) $page=1;
$nbr_elements_par_page = 5;
$nbr_de_pages = ceil($tcount[0]["cpt"]/$nbr_elements_par_page);
$debut=($page-1)*$nbr_elements_par_page;

// Récupérer les enregistrements eux-mêmes
$sel=$db->prepare("SELECT book.id, title, author_id, publication_date, genre, publisher, firstname, lastname FROM book LEFT JOIN author ON book.author_id = author.id ORDER BY book.id LIMIT $debut, $nbr_elements_par_page");
$sel->setFetchMode(PDO::FETCH_ASSOC);
$sel->execute();
$tab=$sel->fetchAll();
if(count($tab)==0){
    header("location:./");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Books</title>
    <link href="public/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a24cbbc15d.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <?php
            session_start();
            if (!empty($_SESSION['username'])){
                echo "Welcome " . $_SESSION['username'] . " ";?>
            <button class="btn"><a href="public/php/logout.php"><i class="fas fa-sign-out-alt"></i></a></button>
            <?php
            } else {
                header("Location: public/php/login.php");
                die();
    }
        ?>
    </header>
    <div class="search-container">
        <form action="index.php" method="get">
            <input type="search" placeholder="Search" name="terme" value="<?php echo $_GET['terme'] ?? ''; ?>">
            <button type="submit" name="submit" value="Rechercher"><i class="fas fa-search"></i></button>
        </form>
    </div>
    <div id="book_form">
        <h2> Your Books</h2>
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
                for($i=0; $i<count($tab);$i++){ ?>
                    <tr>
                        <td>
                            <?php echo $tab[$i]["id"];?>
                        </td>
                        <td>
                            <?php echo $tab[$i]["title"];?>
                        </td>
                        <td>
                            <?php echo $tab[$i]["firstname"] ." ". $tab[$i]["lastname"];?>
                        </td>
                        <td>
                            <?php echo $tab[$i]["publication_date"]?>
                        </td>
                        <td>
                            <?php echo $tab[$i]["genre"]?>
                        </td>
                        <td>
                            <?php echo $tab[$i]["publisher"]?>
                        </td>
                        <td>
                            <a href="/public/php/update.php?id=<?php echo $tab[$i]["id"]. "&" ."firstname=". $tab[$i]["firstname"] ."&". "lastname=".$tab[$i]["lastname"];?>"><i class="fas fa-edit fa-2x"></i></a>
                        </td>
                        <td>
                            <a href="/public/php/delete.php?id=<?php echo $tab[$i]["id"]; ?>"><i class="fas fa-trash-alt fa-2x"></i></a>
                        </td>
                        <td>
                            <a href="/public/php/cart.php?id=<?php echo $tab[$i]["id"] ?>"><i class="fas fa-shopping-cart fa-2x"></i></a>
                        </td>
                    </tr>
                <?php  }?>    
            </tbody>
        </table>
        <a href="/public/php/add.php?id" class="button">Ajouter un livre</a>
        <a href="/public/php/addAuthor.php?id" class="button">Ajouter un auteur</a>
        <div id="pagination">
            <?php
                for($i=1;$i<=$nbr_elements_par_page;$i++){
                    if($page!=$i){
                        echo "<a href='?page=$i'>$i</a>&nbsp;";
                    }
                    else {
                        echo "<a>$i</a>&nbsp;";
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>