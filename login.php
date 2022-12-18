<?php
include "db_conn.php";
session_start();

$radio=$_POST['radio'];
if(isset($_POST['login']) && isset($_POST['password']) && (($radio=="pracownik")||($radio=="klient")||($radio=="administrator"))){
    function validate ($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
    $login = validate($_POST['login']);
    $pass = validate($_POST['password']);
    $radio = validate($_POST['radio']);

    if(empty($login)){
        header("Location: index.php?error=Wymagany jest login - podaj go");
        exit();
    }
    else if(empty($pass)){
        header("Location: index.php?error=Wymagane jest hasło - podaj je");
        exit();
    }
    else if(empty($radio)){
        header("Location: index.php?error=Wymagane jest zaznaczenie pola wyboru - zaznacz jędną z opcji");
        exit();
    }
    else{
        if ($radio=="klient"){ #klient
            $sql = "SELECT * FROM users WHERE login='$login' AND password='$pass'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) === 1){
                $row=mysqli_fetch_assoc($result);
                if($row['login'] == $login && $row['password'] == $pass){
                    $_SESSION['login']=$row['login'];
                    $_SESSION['id_users']=$row['ID_users'];
                    header("Location: user.php");
                    exit();
                }
                else{
                    header("Location: index.php?error=Zły login lub hasło");
                    exit(); 
                }
            }
        }
        if ($radio=="pracownik"){ #pracownik
            $sql = "SELECT * FROM employees WHERE login='$login' AND password='$pass'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) === 1){
                $row=mysqli_fetch_assoc($result);
                if($row['login'] == $login && $row['password'] == $pass){
                    $_SESSION['login']=$row['login'];
                    $_SESSION['id_employee']=$row['ID_employees'];
                    header("Location: employee.php");
                    exit();
                }
                else{
                    header("Location: index.php?error=Zły login lub hasło");
                    exit(); 
                }
            }
        }
        if ($radio=="administrator"){ #administrator
            $sql = "SELECT * FROM admins WHERE login='$login' AND password='$pass'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) === 1){
                $row=mysqli_fetch_assoc($result);
                if($row['login'] == $login && $row['password'] == $pass){
                    $_SESSION['login']=$row['login'];
                    $_SESSION['id_admin']=$row['ID_admins'];
                    header("Location: admin.php");
                    exit();
                }
                else{
                    header("Location: index.php?error=Zły login lub hasło");
                    exit(); 
                }
            }
        }
        else{
            header("Location: index.php?error=Błąd logowania, spróbuj ponownie");
            exit();
        }
    }

}
else{
    header("Location: index.php?error=Sprawdź czy są wypełnione wszystkie pola");
    exit();
}
// Mikołaj Tchorz