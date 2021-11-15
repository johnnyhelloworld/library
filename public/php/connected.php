<?php

session_start();
if (!empty($_SESSION['username'])){
    echo "Welcome " . $_SESSION['username'] . " ";?>
<button class="btn"><a href="logout.php"><i class="fas fa-sign-out-alt"></i></a></button>
<?php
} else {
    header("Location: login.php");
    die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connected</title>
    <script src="https://kit.fontawesome.com/a24cbbc15d.js" crossorigin="anonymous"></script>
</head>
<body>
    
</body>
</html>