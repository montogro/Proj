<?php
include "db_conn.php";

    if(isset($_POST['login']) && isset($_POST['password'])){
        function validate ($data){
            $data=trim($data);
            $data=stripslashes($data);
            $data=htmlspecialchars($data);
            return $data;
        }
        $login = validate($_POST['login']);
        $password = validate($_POST['password']);
        $name = validate($_POST['name']);
        $surname = validate($_POST['surname']);
        if(empty($login)){
            header("Location: register.php?error=Wymagany jest login - podaj go");
            exit();
        }
        else if(empty($password)){
            header("Location: register.php?error=Wymagane jest hasło - podaj je");
            exit();
        }
        else if(empty($name)){
            header("Location: register.php?error=Wymagane jest Twoje imię - podaj je");
            exit();
        }
        else if(empty($surname)){
            header("Location: register.php?error=Wymagane jest Twoje nazwisko - podaj je");
            exit();
        }
        else{
            $sql = "INSERT INTO `users` (`ID_users`, `login`, `password`, `name`, `surname`) VALUES (NULL, '".$login."', '".$password."', '".$name."', '".$surname."');";
            $result = mysqli_query($conn, $sql);
            header("Location: register.php?fine=Zostałeś zarejestrowany! Wróć do strony głównej i zaloguj się");
            exit();
        }
    }

?>

<!DOCTYPE html5>
<html>
<head>
    <title>Rejestracja klienta</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="block_user_management">
    <form id="search_form" action="register.php" method="POST">
        <a id="centered_return" href="employee.php">Powrót na stronę</a>
        <h2>Rejestracja klienta</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <?php if (isset($_GET['fine'])) { ?>
                <p class="fine"><?php echo $_GET['fine']; ?></p>
        <?php } ?>
        <label id="user_form_label">Nazwa użytkownika*</label>
        <input type="text" name="login" placeholder="Podaj nowy login">
        <br>

        <label id="user_form_label">Imię*</label>
        <input type="text" name="name" placeholder="Podaj imię">
        <br>

        <label id="user_form_label">Nazwisko*</label>
        <input type="text" name="surname" placeholder="Podaj nazwisko">
        <br>

        <label id="user_form_label">Hasło*</label>
        <input type="password" name="password" placeholder="Podaj nowe hasło">
        <br>
        
        <button id="login" type="submit">Zarejestruj się</button>
    </form>
    </div>
</body>
</html>