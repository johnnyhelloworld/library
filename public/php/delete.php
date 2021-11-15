<?php

require_once "connect.php";

$id = $_GET['id'];

$delete = $db->query("DELETE FROM book WHERE id = $id");
    $delete->setFetchMode(PDO::FETCH_OBJ);

    if($delete){
        echo "Book successfully deleted";
        header('location:/index.php'); 
    }