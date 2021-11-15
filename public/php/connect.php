<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=library', 'root', '');
    $datab = $db->query('SELECT * FROM author');

    /*
    foreach( $query as $row) {
        print_r($row['title']);
    }
    */
}   catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}