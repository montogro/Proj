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
        if(empty($login)){
            header("Location: register.php?error=Wymagany jest login - podaj go");
            exit();
        }
        else if(empty($password)){
            header("Location: register.php?error=Wymagane jest hasło - podaj je");
            exit();
        }
        else{
            $sql = "INSERT INTO `users` (`ID_users`, `login`, `password`) VALUES (NULL, '".$login."', '".$password."');";
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
    <div class="block">
    <form id="search_form" action="register.php" method="POST">
        <a id="centered_ahref" href="employee.php">Powrót na stronę</a>
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

        <label id="user_form_label">Hasło*</label>
        <input type="password" name="password" placeholder="Podaj nowe hasło">
        <br>
        
        <button id="login" type="submit">Zarejestruj się</button>
    </form>
    </div>
</body>
</html>