<?php
    session_start();
    include "db_conn.php";

    if(isset($_SESSION['id_employee']) && isset($_SESSION['login'])){
        $id_element=$_POST['id_element'];
        if(isset($_POST['vehicle_client'])){
            function validate ($data){
                $data=trim($data);
                $data=stripslashes($data);
                $data=htmlspecialchars($data);
                return $data;
            }
            $vehicle_client = validate($_POST['vehicle_client']);
            if(empty($vehicle_client)){
                header("Location: check_client.php?error=Wymagany jest rodzaj pojazdu Klienta - podaj go");
                exit();
            }
            else{
                $sql = "UPDATE users SET vehicle = '".$vehicle_client."' WHERE ID_users LIKE ".$id_element.";";
                $result = mysqli_query($conn, $sql);
                header("Location: check_client.php?fine=Pojazd Klienta został zmodyfikowany!");
                exit();
            }

        }
        if(isset($_POST['warranty_button'])){
            function validate ($data){
                $data=trim($data);
                $data=stripslashes($data);
                $data=htmlspecialchars($data);
                return $data;
            }
            $warranty_client = validate($_POST['warranty_client']);
            if(empty($warranty_client)){
                header("Location: check_client.php?error=Wymagany jest rodzaj pojazdu Klienta - podaj go");
                exit();
            }
            else{
                $sql = "UPDATE users SET warranty_expires = '".$warranty_client."' WHERE ID_users LIKE ".$id_element.";";
                $result = mysqli_query($conn, $sql);
                header("Location: check_client.php?fine=Gwarancja Klienta została zmodyfikowana!");
                exit();
            }

        }
        if(isset($_POST['name_button'])){
            function validate ($data){
                $data=trim($data);
                $data=stripslashes($data);
                $data=htmlspecialchars($data);
                return $data;
            }
            $name_client = validate($_POST['name_client']);
            if(empty($name_client)){
                $id_element=$_POST['id_element'];
                header("Location: check_client.php?error=Wymagane jest imię Klienta - podaj je");
                exit();
            }
            else{
                $sql = "UPDATE users SET name = '".$name_client."' WHERE ID_users LIKE ".$id_element.";";
                $result = mysqli_query($conn, $sql);
                header("Location: check_client.php?fine=Imię Klienta zostało zmodyfikowane!");
                exit();
            }

        }
        if(isset($_POST['surname_button'])){
            function validate ($data){
                $data=trim($data);
                $data=stripslashes($data);
                $data=htmlspecialchars($data);
                return $data;
            }
            $surname_client = validate($_POST['surname_client']);
            if(empty($surname_client)){
                header("Location: check_client.php?error=Wymagane jest nazwisko Klienta - podaj je");
                exit();
            }
            else{
                $sql = "UPDATE users SET surname = '".$surname_client."' WHERE ID_users LIKE ".$id_element.";";
                $result = mysqli_query($conn, $sql);
                header("Location: check_client.php?fine=Nazwisko Klienta zostało zmodyfikowane!");
                exit();
            }

        }
        if(isset($_POST['delete_button'])){
            $sql = "DELETE FROM users WHERE ID_users LIKE '".$id_element."';";
            $result = mysqli_query($conn, $sql);
            header("Location: check_client.php?fine=Klient został usunięty!");
            exit();
        }
?>

<!DOCTYPE html5>
<html>
<head>
    <title><?php echo $_SESSION['login']; ?> - modyfikacja Klienta</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="block_request">
        <a id="centered_return" href="check_client.php">Powrót na stronę</a>
        <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <?php if (isset($_GET['fine'])) { ?>
                <p class="fine"><?php echo $_GET['fine']; ?></p>
        <?php } ?>
        <h1>Zaktualizuj Klienta o identyfikatorze: <?php echo $id_element; ?></h1>
        <form id="search_form" action="modify.php" method="POST">
            <input type="hidden" name="id_element" value="<?php echo $id_element; ?>">
        </form>
        <form id="client_modify_form" action="modify_client.php" method="POST">
                <input type="hidden" name="id_element" value="<?php echo $id_element; ?>">
                <input type="text" id="modify_text" name="name_client" placeholder="Podaj nowe imię Klienta">
                <button id="modify_button" name="name_button"  type="submit">Zmień</button>
        </form>
        <form id="client_modify_form" action="modify_client.php" method="POST">
                <input type="hidden" name="id_element" value="<?php echo $id_element; ?>">
                <input type="text" id="modify_text" name="surname_client" placeholder="Podaj nowe nazwisko Klienta">
                <button id="modify_button" name="surname_button"  type="submit">Zmień</button>
        </form>
        <form id="client_modify_form" action="modify_client.php" method="POST">
                <input type="hidden" name="id_element" value="<?php echo $id_element; ?>">
                <input type="text" id="modify_text" name="vehicle_client" placeholder="Podaj nowy pojazd Klienta">
                <button id="modify_button" type="submit">Zmień</button>
        </form>
        <form id="client_modify_form" action="modify_client.php" method="POST">
                <input type="hidden" name="id_element" value="<?php echo $id_element; ?>">
                <input type="date" id="date2" name="warranty_client" value="<?php echo date('Y-m-d');?>" min="2015-01-01">
                <button id="modify_button" name="warranty_button" type="submit">Zmień datę gwarancji</button>
        </form>
        <form id="client_modify_form2" action="modify_client.php" method="POST">
                <input type="hidden" name="id_element" value="<?php echo $id_element; ?>">
                <button id="delete_button" name="delete_button" type="submit">Usuń Klienta</button>
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