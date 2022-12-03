<?php

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
        header("Location: index.php?error=Wymagany jest login");
        exit();
    }
    else if(empty($pass)){
        header("Location: index.php?error=Wymagane jest hasło");
        exit();
    }
    else{
        echo "Valid input";
    }

}
else{
    header("Location: index.php?error");
    exit();
}
// Zakończyłem na 15 minucie