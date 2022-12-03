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
    $pass = validate($_POST['password']);

    if(empty($login)){
        header("Location: index.php?error=Wymagany jest login - podaj go");
        exit();
    }
    else if(empty($pass)){
        header("Location: index.php?error=Wymagane jest hasło - podaj je");
        exit();
    }
    else{ #tu potem mogę rozbić na adminów, pracowników i userów
        $sql = "SELECT * FROM users WHERE login='$login' AND password='$pass'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)){
            echo "Hello.";
        }
    }

}
else{
    header("Location: index.php?error");
    exit();
}
// Zakończyłem na 15 minucie