<?php
    session_start();
    include "db_conn.php";
    if(isset($_SESSION['id_employee']) && isset($_SESSION['login'])){

?>

<!DOCTYPE html5>
<html>
<head>
    <title><?php echo $_SESSION['login']; ?> - szukaj zgłoszenia</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="block_request">
        <a id="centered_return" href="employee.php">Powrót na stronę</a>
        <h1>Szukaj po nazwie klienta</h1>
        <form id="search_form" action="check_request.php" method="POST">
                <input type="text" name="client" placeholder="Wprowadź nazwę klienta, którego ma dotyczyć spis zgłoszeń">
                <br>
                <button id="login" type="submit">Szukaj!</button>
            </form>
        <p class="requests">
            <?php 
                if(isset($_REQUEST['client'])){
                echo '<table id="table_requests"> 
                <tr>
                    <th> <font face="Arial">Data zgłoszenia</font> </th> 
                    <th> <font face="Arial">Klient</font> </th> 
                    <th> <font face="Arial">Temat zgłoszenia</font> </th>
                    <th> <font face="Arial">Opis problemu przez Klienta</font> </th> 
                    <th> <font face="Arial">Informacje o pojeździe Klienta</font> </th> 
                    <th> <font face="Arial">Odpowiedź pracownika</font> </th> 
                    <th> <font face="Arial">Status zgłoszenia</font> </th> 
                    <th> <font face="Arial"></font> </th> 
                </tr>';
                $sql = "SELECT * FROM requests WHERE client LIKE '".$_POST['client']."' ORDER BY date DESC;";
                $result = mysqli_query($conn, $sql);
                //if($result = $conn->query($sql)){
                while ($row = $result->fetch_assoc()) {
                    $i=$row["id_request"];
                    $field1name = $row["date"];
                    $field2name = $row["client"];
                    $field3name = $row["subject"];
                    $field4name = $row["description"];
                    $field5name = $row["response"];
                    $field6name = $row["status"]; 
                    $info1 = $row["purchase_date"];
                    $info2 = $row["owner_company"];
                    $info3 = $row["warranty_date"];
                    $info4 = $row["warranty_number"];
                    $info5 = $row["location"];
                    $info6 = $row["phone_number"];
                    $info7 = $row["vehicle_type"];
                    $info8 = $row["vehicle_serial_number"];
                    $info9 = $row["mileage"];
                    $info10 = $row["error_code"];

                    ?><form id="modify_record" action="modify.php" method="POST">
                    <input type="hidden" name="id_element" value="<?php echo $i; ?>"><?php
                    echo '<tr> 
                        <td>'.$field1name.'</td>
                        <td>'.$field2name.'</td> 
                        <td>'.$field3name.'</td>
                        <td>'.$field4name.'</td>
                        <td><li>Data zakupu maszyny: '.$info1.'</li><br><li>właściciel / firma: '.$info2.'</li><br><li>data gwarancji: '.$info3.'</li><br><li>numer gwarancji: '.$info4.'</li><br><li>lokalizacja: '.$info5.'</li><br><li>nr tel.: '.$info6.'</li><br><li>typ pojazdu: '.$info7.'</li><br><li>nr ser. pojazdu: '.$info8.'</li><br><li>przebieg / czas pracy: '.$info9.'</li><br><li>kod błędu: '.$info10.'</li></td>
                        <td>'.$field5name.'</td> 
                        <td>'.$field6name.'</td> 
                        <td>.<button type="submit">Zmień status lub odpowiedz</button></td> 
                    </tr>';
                //echo $row['client']."<br>";
                ?></form><?php
                }
                $result->free();
                //}
            }
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