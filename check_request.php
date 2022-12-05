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
    <div class="block">
        <a id="centered_ahref" href="employee.php">Powrót na stronę</a>
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
                    <th> <font face="Arial">Klient</font> </th> 
                    <th> <font face="Arial">Temat</font> </th>
                    <th> <font face="Arial">Treść</font> </th> 
                    <th> <font face="Arial">Odpowiedź pracownika</font> </th> 
                    <th> <font face="Arial">Status zgłoszenia</font> </th> 
                </tr>';
                $sql = "SELECT * FROM requests WHERE client LIKE '".$_POST['client']."';";
                $result = mysqli_query($conn, $sql);
                //if($result = $conn->query($sql)){
                while ($row = $result->fetch_assoc()) {
                    $field1name = $row["client"];
                    $field2name = $row["subject"];
                    $field3name = $row["description"];
                    $field4name = $row["response"];
                    $field5name = $row["status"]; 

                    echo '<tr> 
                            <td>'.$field1name.'</td> 
                            <td>'.$field2name.'</td>
                            <td>'.$field3name.'</td> 
                            <td>'.$field4name.'</td> 
                            <td>'.$field5name.'</td> 
                        </tr>';
                    //echo $row['client']."<br>";
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