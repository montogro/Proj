<?php
include "add_request.php";
include "db_conn.php";

if(isset($_SESSION['id_users']) && isset($_SESSION['login'])){
    if(isset($_POST['subject']) && isset($_POST['description'])){
        function validate ($data){
            $data=trim($data);
            $data=stripslashes($data);
            $data=htmlspecialchars($data);
            return $data;
        }
        $subject = validate($_POST['subject']);
        $description = validate($_POST['description']);

        if(empty($subject)){
            header("Location: add_request.php?error=Wymagany jest tytuł zgłoszenia");
            exit();
        }
        else if(empty($description)){
            header("Location: add_request.php?error=Wymagany jest opis problemu");
            exit();
        }
        else if((empty($subject))&&(empty($description))){
            header("Location: add_request.php?error=Wymagany jest tytuł oraz treść zgłoszenia");
            exit(); #tu są jakieś bugi jeszcze
        }
        else{
            $sql = "INSERT INTO `requests` (`id_request`, `client`, `subject`, `description`, `status`) VALUES (NULL, '".$_SESSION['login']."', '".$_POST['subject']."', '".$_POST['description']."', 'otwarte');";
            $result = mysqli_query($conn, $sql);
            header("Location: add_request.php?fine=Zgłoszenie zostało wysłane!");
            exit();
        }
    }
    else{
        header("Location: index.php");
        exit();
    }
}
else{
    header("Location: index.php");
    exit();
}