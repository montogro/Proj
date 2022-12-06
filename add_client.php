<?php
    session_start();
    include "db_conn.php";

    if(isset($_SESSION['id_employee']) && isset($_SESSION['login'])){
        if(isset($_POST['login_client']) && isset($_POST['password_client']) && isset($_POST['vehicle_client'])){
            function validate ($data){
                $data=trim($data);
                $data=stripslashes($data);
                $data=htmlspecialchars($data);
                return $data;
            }
            $login_client = validate($_POST['login_client']);
            $password_client = validate($_POST['password_client']);
            $vehicle_client = validate($_POST['vehicle_client']);
            if(empty($login_client)){
                header("Location: add_client.php?error=Wymagany jest login Klienta - podaj go");
                exit();
            }
            else if(empty($password_client)){
                header("Location: add_client.php?error=Wymagane jest hasło Klienta - podaj je");
                exit();
            }
            else if(empty($vehicle_client)){
                header("Location: add_client.php?error=Wymagany jest rodzaj pojazdu Klienta - podaj go");
                exit();
            }
            else{
                $sql = "INSERT INTO `users` (`ID_users`, `login`, `password`, `vehicle`) VALUES (NULL, '".$login_client."', '".$password_client."', '".$vehicle_client."');";
                $result = mysqli_query($conn, $sql);
                header("Location: add_client.php?fine=Klient został dodany!");
                exit();
            }
        }
        /*else if((!isset($_POST['login_employee'])) || (!isset($_POST['password_employee']))){
            header("Location: add_employee.php?error=Sprawdź czy są wypełnione wszystkie pola");
            exit();
        } wyrzuca mi tu błędy z zakresu za dużej ilości przekierowań strony ??? */
?>

<!DOCTYPE html5>
<html>
<head>
    <title><?php echo $_SESSION['login']; ?> - dodaj nowego klienta</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="block">
        <a id="centered_ahref" href="employee.php">Powrót na stronę</a>
        <form id="search_form" action="add_client.php" method="POST">
            <h2>Dodawanie klienta do bazy danych</h2>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <?php if (isset($_GET['fine'])) { ?>
                <p class="fine"><?php echo $_GET['fine']; ?></p>
             <?php } ?>
            <label id="user_form_label">Login klienta*</label>
            <input type="text" name="login_client" placeholder="Podaj login dla klienta">
            <br>

            <label id="user_form_label">Hasło klienta*</label>
            <input type="password" name="password_client" placeholder="Podaj hasło dla klienta">
            <br>

            <label id="user_form_label">Maszyna klienta*</label>
            <input type="text" name="vehicle_client" placeholder="Podaj pojazd jaki posiada klient">
            <br>
            
            <button id="login" type="submit">Dodaj użytkownika</button>
        </form>  
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