<?php
    session_start();
    if(isset($_SESSION['id_users']) && isset($_SESSION['login'])){
?>

<!DOCTYPE html5>
<html>
<head>
    <title><?php echo $_SESSION['login']; ?> - panel użytkownika</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="block">
        <h1>Witaj kliencie, <?php echo $_SESSION['login']; ?>!</h1>
        <div class="text_1">Wybierz co chcesz zrobić:</div>
        <a id="menu" href="add_request.php">Dodaj zgłoszenie</a>
        <a id="menu" href="my_requests.php">Moje zgłoszenia</a>
        <a id="menu" href="explo.php">Filmy instruktażowe</a>
        <a id="menu" href="change_pass.php">Zmień hasło</a>
        <a id="menu" href="logout.php">Wyloguj się</a>
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