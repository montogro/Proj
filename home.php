<?php
    session_start();
    if(isset($_SESSION['id_users']) && isset($_SESSION['login'])){
?>

<!DOCTYPE html5>
<html>
<head>
    <title>HOME</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Witaj, <?php  echo $_SESSION['login']; ?></h1>
    <a href="user.php">Przejdź do podstrony user.php</a>
    <a href="logout.php">Wyloguj się</a>
</body>
</html>

<?php

}
else{
    header("Location: index.php");
    exit(); 
}

?>