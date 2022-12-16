<?php
    session_start();
    include "db_conn.php";
        if(isset($_SESSION['id_employee']) && isset($_SESSION['login'])){
            if(isset($_POST['login_client']) && isset($_POST['password_client']) && isset($_POST['vehicle_client']) && isset($_POST['name_client']) && isset($_POST['surname_client'])){
                function validate ($data){
                    $data=trim($data);
                    $data=stripslashes($data);
                    $data=htmlspecialchars($data);
                    return $data;
                }
                $login_client = validate($_POST['login_client']);
                $password_client = validate($_POST['password_client']);
                $vehicle_client = validate($_POST['vehicle_client']);
                $warranty_client = validate($_POST['warranty_client']);
                $name_client = validate($_POST['name_client']);
                $surname_client = validate($_POST['surname_client']);
                if(empty($login_client)){
                    header("Location: check_client.php?error=Wymagany jest login Klienta - podaj go");
                    exit();
                }
                else if(empty($password_client)){
                    header("Location: check_client.php?error=Wymagane jest hasło Klienta - podaj je");
                    exit();
                }
                else if(empty($vehicle_client)){
                    header("Location: check_client.php?error=Wymagany jest rodzaj pojazdu Klienta - podaj go");
                    exit();
                }
                else if(empty($name_client)){
                    header("Location: check_client.php?error=Wymagane jest imię Klienta - podaj je");
                    exit();
                }
                else if(empty($surname_client)){
                    header("Location: check_client.php?error=Wymagane jest nazwisko Klienta - podaj je");
                    exit();
                }
                else{
                    $sql = "INSERT INTO `users` (`ID_users`, `login`, `password`, `vehicle`, `warranty_expires`, `name`, `surname`) VALUES (NULL, '".$login_client."', '".$password_client."', '".$vehicle_client."', '".$warranty_client."', '".$name_client."', '".$surname_client."');";
                    $result = mysqli_query($conn, $sql);
                    header("Location: check_client.php?fine=Klient został dodany!");
                    exit();
                }
        }

?>

<!DOCTYPE html5>
<html>
<head>
    <title><?php echo $_SESSION['login']; ?> - zarządzanie Klientami</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="block_user_management">
        <a id="centered_return" href="employee.php">Powrót na stronę</a>
        <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <?php if (isset($_GET['fine'])) { ?>
                <p class="fine"><?php echo $_GET['fine']; ?></p>
        <?php } ?>

        <form id="search_form" action="check_client.php" method="POST">
            <h2>Dodawanie Klienta do bazy danych</h2>
            <label id="user_form_label">Login Klienta*</label>
            <input type="text" name="login_client" placeholder="Podaj login dla Klienta">
            <br>

            <label id="user_form_label">Imię Klienta*</label>
            <input type="text" name="name_client" placeholder="Podaj imię Klienta">
            <br>

            <label id="user_form_label">Nazwisko Klienta*</label>
            <input type="text" name="surname_client" placeholder="Podaj nazwisko Klienta">
            <br>

            <label id="user_form_label">Hasło Klienta*</label>
            <input type="password" name="password_client" placeholder="Podaj hasło dla Klienta">
            <br>

            <label id="user_form_label">Maszyna Klienta*</label>
            <input type="text" name="vehicle_client" placeholder="Podaj pojazd jaki posiada Klient">
            <br>

            <label id="user_form_label">Data wygaśnięcia gwarancji*</label>
            <input type="date" id="start" name="warranty_client" value="<?php echo date('Y-m-d');?>" min="2015-01-01">
            <br>

            <button id="login" type="submit">Dodaj Klienta</button>
        </form>  

        <h1>Spis Klientów</h1>
        <p class="requests">
            <?php 
            
                echo '<table id="table_requests"> 
                <tr>
                    <th> <font face="Arial">ID Klienta</font> </th> 
                    <th> <font face="Arial">Login Klienta</font> </th>
                    <th> <font face="Arial">Imię i nazwisko Klienta</font> </th>
                    <th> <font face="Arial">Dane</font> </th>
                    <th> <font face="Arial">Operacje</font> </th> 
                </tr>';

                $sql = "SELECT * FROM users;";
                $result = mysqli_query($conn, $sql);
                //if($result = $conn->query($sql)){
                while ($row = $result->fetch_assoc()) {
                    $i=$row["ID_users"];
                    $field1name = $row["ID_users"];
                    $field2name = $row["login"];
                    $field3name = $row["name"];
                    $field4name = $row["surname"];
                    $field5name = $row["vehicle"];
                    $field6name = $row["warranty_expires"];

                    ?><form id="modify_record" action="modify_client.php" method="POST">
                        <input type="hidden" name="id_element" value="<?php echo $i; ?>"><?php
                    echo '<tr> 
                            <td>'.$field1name.'</td>
                            <td>'.$field2name.'</td>
                            <td>'.$field3name.' '.$field4name.'</td>
                            <td><li>Pojazd: '.$field5name.'</li><li>Gwarancja: '.$field6name.'</li></td> 
                            <td><button type="submit">Modyfikuj</button></td> 
                        </tr>';
                    //echo $row['client']."<br>";
                    ?></form><?php
                }
                $result->free();
                //}
            ?>
        </p>
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