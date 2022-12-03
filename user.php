<?php
    session_start();
    if(isset($_SESSION['id_users']) && isset($_SESSION['login'])){
?>

<!DOCTYPE html5>
<html>
<head>
    <title><?php echo $_SESSION['login']; ?> - panel</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="block">
        <h1>Zostałeś zalogowany jako <?php echo $_SESSION['login']; ?></h1>
        <div class="text_1">Wybierz co chcesz zrobić:</div>
        <a href="add_request.php">Dodaj zgłoszenie</a>
        <a href="my_requests.php">Moje zgłoszenia</a>
        <a href="explo.php">Elementy eksploatacyjne</a>
        <a href="logout.php">Wyloguj się</a>
    </div>
</body>
</html>

<?php

}
else{
    header("Location: index.php");
    exit(); 
}

?>