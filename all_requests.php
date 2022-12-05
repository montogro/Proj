<?php
    session_start();
    include "db_conn.php";
    if(isset($_SESSION['id_employee']) && isset($_SESSION['login'])){

?>

<!DOCTYPE html5>
<html>
<head>
    <title><?php echo $_SESSION['login']; ?> - wszystkie zgłoszenia</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="block_request">
        <a id="centered_ahref" href="employee.php">Powrót na stronę</a>
        <h1>Historia zgłoszeń</h1>
        <p class="requests">
            <?php 
            
                echo '<table id="table_requests"> 
                <tr> 
                    <th> <font face="Arial">Data zgłoszenia</font> </th> 
                    <th> <font face="Arial">Klient</font> </th> 
                    <th> <font face="Arial">Temat zgłoszenia</font> </th>
                    <th> <font face="Arial">Opis problemu przez klienta</font> </th> 
                    <th> <font face="Arial">Odpowiedź pracownika</font> </th> 
                    <th> <font face="Arial">Status zgłoszenia</font> </th> 
                </tr>';

                $sql = "SELECT * FROM requests;";
                $result = mysqli_query($conn, $sql);
                //if($result = $conn->query($sql)){
                while ($row = $result->fetch_assoc()) {
                    $field1name = $row["date"];
                    $field2name = $row["client"];
                    $field3name = $row["subject"];
                    $field4name = $row["description"];
                    $field5name = $row["response"];
                    $field6name = $row["status"]; 

                    echo '<tr> 
                            <td>'.$field1name.'</td>
                            <td>'.$field2name.'</td> 
                            <td>'.$field3name.'</td>
                            <td>'.$field4name.'</td> 
                            <td>'.$field5name.'</td> 
                            <td>'.$field6name.'</td> 
                        </tr>';
                    //echo $row['client']."<br>";
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