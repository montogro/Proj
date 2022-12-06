<?php
    session_start();
    include "db_conn.php";

    if(isset($_SESSION['id_employee']) && isset($_SESSION['login'])){
        if(isset($_POST['old_password']) && isset($_POST['new_password'])){
            function validate ($data){
                $data=trim($data);
                $data=stripslashes($data);
                $data=htmlspecialchars($data);
                return $data;
            }
            $old_password = validate($_POST['old_password']);
            $new_password = validate($_POST['new_password']);
            if(empty($old_password)){
                header("Location: change_pass_employee.php?error=Wymagane jest stare hasło - podaj je");
                exit();
            }
            else if(empty($new_password)){
                header("Location: change_pass_employee.php?error=Wymagane jest nowe hasło - podaj je");
                exit();
            }
            else{
                $sql = "SELECT * FROM employees WHERE ID_employees LIKE '".$_SESSION['id_employee']."';";
                $verify = mysqli_query($conn, $sql);
                while ($row = $verify->fetch_assoc()) {
                    $temp=$row['password'];
                }
                if($temp==$_POST['old_password']){
                    $sql2 = "UPDATE employees SET password = '".$new_password."' WHERE ID_employees LIKE '".$_SESSION['id_employee']."';";
                    $result = mysqli_query($conn, $sql2);
                    header("Location: change_pass_employee.php?fine=Hasło zostało zmienione!");
                    exit();
                }
                else{
                    header("Location: change_pass_employee.php?error=Błędne stare hasło!");
                    exit();
                }
            }
        }
?>

<!DOCTYPE html5>
<html>
<head>
    <title><?php echo $_SESSION['login']; ?> - zmiana hasła</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="block">
        <a id="centered_ahref" href="user.php">Powrót na stronę</a>
        <form id="search_form" action="change_pass_employee.php" method="POST">
            <h2>Zmiana hasła</h2>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <?php if (isset($_GET['fine'])) { ?>
                <p class="fine"><?php echo $_GET['fine']; ?></p>
             <?php } ?>
            <label id="user_form_label">Stare hasło*</label>
            <input type="password" name="old_password" placeholder="Podaj stare hasło">
            <br>

            <label id="user_form_label">Nowe hasło*</label>
            <input type="password" name="new_password" placeholder="Podaj nowe hasło">
            <br>
            
            <button id="login" type="submit">Zmień hasło</button>
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