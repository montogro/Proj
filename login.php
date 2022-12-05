<?php
include "db_conn.php";
session_start();

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
    else{ #tu potem mogę rozbić na pracowników i userów
        $sql = "SELECT * FROM users WHERE login='$login' AND password='$pass'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
            $row=mysqli_fetch_assoc($result);
            if($row['login'] == $login && $row['password'] == $pass){
                $_SESSION['login']=$row['login'];
                $_SESSION['id_users']=$row['ID_users'];
                echo "test";
                header("Location: user.php");
                exit();
            }
            else{
                header("Location: index.php?error=Zły login lub hasło");
                exit(); 
            }
        }
        else{
            header("Location: index.php?error=Zły login lub hasło");
            exit();
        }
    }

}
else{
    header("Location: index.php?error");
    exit();
}
// Mikołaj Tchorz