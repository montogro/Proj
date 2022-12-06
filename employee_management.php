<?php
    session_start();
    include "db_conn.php";
    if(isset($_SESSION['id_admin']) && isset($_SESSION['login'])){
    
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
                header("Location: employee_management.php?error=Wymagany jest login pracownika - podaj go");
                exit();
            }
            else if(empty($pass_employee)){
                header("Location: employee_management.php?error=Wymagane jest hasło pracownika - podaj je");
                exit();
            }
            else{
                $sql = "INSERT INTO `employees` (`ID_employees`, `login`, `password`) VALUES (NULL, '".$login_employee."', '".$pass_employee."');";
                $result = mysqli_query($conn, $sql);
                header("Location: employee_management.php?fine=Pracownik został dodany!");
                exit();
            }
        }

?>

<!DOCTYPE html5>
<html>
<head>
    <title><?php echo $_SESSION['login']; ?> - zarządzanie pracownikami</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="block_user_management">
        <a id="centered_ahref" href="admin.php">Powrót na stronę</a>
        <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <?php if (isset($_GET['fine'])) { ?>
                <p class="fine"><?php echo $_GET['fine']; ?></p>
        <?php } ?>
        <h1>Dodawanie pracownika</h1>

        <form id="search_form" action="employee_management.php" method="POST">
            <label id="user_form_label">Nazwa pracownika*</label>
            <input type="text" name="login_employee" placeholder="Podaj login dla pracownika">
            <br>

            <label id="user_form_label">Hasło pracownika*</label>
            <input type="password" name="password_employee" placeholder="Podaj hasło dla pracownika">
            <br>
            
            <button id="login" type="submit">Dodaj pracownika</button>
        </form>  

        <h1>Spis pracowników</h1>
        <p class="requests">
            <?php 
            
                echo '<table id="table_requests"> 
                <tr>
                    <th> <font face="Arial">ID pracownika</font> </th> 
                    <th> <font face="Arial">Login pracownika</font> </th> 
                    <th> <font face="Arial">Operacje</font> </th> 
                </tr>';

                $sql = "SELECT * FROM employees;";
                $result = mysqli_query($conn, $sql);
                //if($result = $conn->query($sql)){
                while ($row = $result->fetch_assoc()) {
                    $i=$row["ID_employees"];
                    $field1name = $row["ID_employees"];
                    $field2name = $row["login"];

                    ?><form id="modify_record" action="delete_employee.php" method="POST">
                        <input type="hidden" name="id_element" value="<?php echo $i; ?>"><?php
                    echo '<tr> 
                            <td>'.$field1name.'</td>
                            <td>'.$field2name.'</td> 
                            <td>.<button type="submit">Usuń pracownika</button></td> 
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