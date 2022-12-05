<?php
    session_start();
    if(isset($_SESSION['id_employee']) && isset($_SESSION['login'])){
?>

<!DOCTYPE html5>
<html>
<head>
    <title><?php echo $_SESSION['login']; ?> - panel pracownika</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="block">
        <h1>Witaj pracowniku, <?php echo $_SESSION['login']; ?>!</h1>
        <div class="text_1">Wybierz co chcesz zrobić:</div>
        <a id="menu" href="check_request.php">Szukaj zgłoszenia pod nazwą klienta</a>
        <a id="menu" href="all_requests.php">Podejrzyj wszystkie zgłoszenia</a>
        <a id="menu" href="add_employee.php">Dodaj nowego pracownika</a>
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