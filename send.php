<?php
include "add_request.php";
include "db_conn.php";

if(isset($_SESSION['id_users']) && isset($_SESSION['login'])){
    if(isset($_POST['subject']) && isset($_POST['description']) && isset($_POST['purchase_date']) && isset($_POST['owner_company']) && isset($_POST['warranty_date']) && isset($_POST['location']) && isset($_POST['phone_number']) && isset($_POST['vehicle_type']) && isset($_POST['vehicle_serial_number']) && isset($_POST['mileage'])){
        function validate ($data){
            $data=trim($data);
            $data=stripslashes($data);
            $data=htmlspecialchars($data);
            return $data;
        }
        $subject = validate($_POST['subject']);
        $description = validate($_POST['description']);
        $purchase_date = validate($_POST['purchase_date']);
        $owner_company = validate($_POST['owner_company']);
        $warranty_date = validate($_POST['warranty_date']);
        $warranty_number = validate($_POST['warranty_number']);
        $location = validate($_POST['location']);
        $phone_number = validate($_POST['phone_number']);
        $vehicle_type = validate($_POST['vehicle_type']);
        $vehicle_serial_number = validate($_POST['vehicle_serial_number']);
        $mileage = validate($_POST['mileage']);

        if(empty($subject) || empty($description) || empty($purchase_date) || empty($owner_company) || empty($warranty_date) || empty($warranty_number) || empty($location) || empty($phone_number) || empty($vehicle_type) || empty($vehicle_serial_number) || empty($mileage)){
            header("Location: add_request.php?error=Sprawdź czy wypełniłeś wszystkie pola oznaczone gwiazdką");
            exit(); #tu są jakieś bugi jeszcze
        }
        else{
            $sql = "INSERT INTO `requests` (`id_request`, `client`, `purchase_date`, `owner_company`, `warranty_date`, `warranty_number`, `location`, `phone_number`, `vehicle_type`, `vehicle_serial_number`, `mileage`, `error_code`, `subject`, `description`, `status`) VALUES (NULL, '".$_SESSION['login']."', '".$_POST['purchase_date']."', '".$_POST['owner_company']."', '".$_POST['warranty_date']."', '".$_POST['warranty_number']."', '".$_POST['location']."', '".$_POST['phone_number']."', '".$_POST['vehicle_type']."', '".$_POST['vehicle_serial_number']."', '".$_POST['mileage']."', '".$_POST['error_code']."', '".$_POST['subject']."', '".$_POST['description']."', 'nowe');";

            //INSERT INTO `requests` (`id_request`, `date`, `client`, `purchase_date`, `owner_company`, `warranty_date`, `warranty_number`, `location`, `phone_number`, `vehicle_type`, `vehicle_serial_number`, `mileage`, `error_code`, `subject`, `description`, `response`, `status`) VALUES (NULL, current_timestamp(), 'test_zgl', '24.06.2020', 'Zakład Gospodarczy Szesnaście', '24.06.2020', '23523523523', 'Jaśminowa 3, Swarzędz', '555555555', 'Ciągnik', 'FD23423GD34FSW', '9000', '', 'Test zgłoszenia', 'Testowy opis problemu.', '', 'otwarte');
            $result = mysqli_query($conn, $sql);
            header("Location: add_request.php?fine=Zgłoszenie zostało wysłane!");
            exit();
        }
    }
    else{
        header("Location: user.php");
        exit();
    }
}
else{
    header("Location: index.php");
    exit();
}