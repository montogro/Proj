<?php
    session_start();
    if(isset($_SESSION['id_admin']) && isset($_SESSION['login'])){
?>

<!DOCTYPE html5>
<html>
<head>
    <title><?php echo $_SESSION['login']; ?> - panel administratora</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="block">
        <h1>Panel administratora</h1>
        <div class="text_1">Wybierz co chcesz zrobić:</div>
        <a id="menu" href="employee_management.php">Dodaj lub usuń pracownika</a>
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