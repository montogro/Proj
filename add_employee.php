<?php
    session_start();
    include "db_conn.php";

    if(isset($_SESSION['id_employee']) && isset($_SESSION['login'])){
        if(isset($_POST['login_employee']) && isset($_POST['password_employee'])){
            function validate ($data){
                $data=trim($data);
                $data=stripslashes($data);
                $data=htmlspecialchars($data);
                return $data;
            }
            $login_employee = validate($_POST['login_employee']);
            $pass_employee = validate($_POST['password_employee']);
            if(empty($login_employee)){
                header("Location: add_employee.php?error=Wymagany jest login pracownika - podaj go");
                exit();
            }
            else if(empty($pass_employee)){
                header("Location: add_employee.php?error=Wymagane jest hasło pracownika - podaj je");
                exit();
            }
            else{
                $sql = "INSERT INTO `employees` (`ID_employees`, `login`, `password`) VALUES (NULL, '".$login_employee."', '".$pass_employee."');";
                $result = mysqli_query($conn, $sql);
                header("Location: add_employee.php?fine=Użytkownik został dodany!");
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
    <title><?php echo $_SESSION['login']; ?> - dodaj nowego pracownika</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="block">
        <a id="centered_ahref" href="employee.php">Powrót na stronę</a>
        <form id="search_form" action="add_employee.php" method="POST">
            <h2>Dodawanie pracownika do bazy danych</h2>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <?php if (isset($_GET['fine'])) { ?>
                <p class="fine"><?php echo $_GET['fine']; ?></p>
             <?php } ?>
            <label id="user_form_label">Nazwa pracownika*</label>
            <input type="text" name="login_employee" placeholder="Podaj login dla pracownika">
            <br>

            <label id="user_form_label">Hasło pracownika*</label>
            <input type="password" name="password_employee" placeholder="Podaj hasło dla pracownika">
            <br>
            
            <button id="login" type="submit">Dodaj pracownika</button>
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