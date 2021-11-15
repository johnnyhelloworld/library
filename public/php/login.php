<?php

session_start();

if (!empty($_POST['username'])){
    $_SESSION['username'] = $_POST['username'];
    header("Location: /index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
        <p>
            <label for="username">Username: </label>
            <input type="text" id="username" name="username" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>">
        </p>
        <p>
            <input type="submit" name="submit" value="Log In">
        </p>
    </form>  
</body>
</html>