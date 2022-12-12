<?php
    session_start();
    include "db_conn.php";
    if(isset($_SESSION['id_users']) && isset($_SESSION['login'])){

?>

<!DOCTYPE html5>
<html>
<head>
    <title><?php echo $_SESSION['login']; ?> - moje dane</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="block_request">
        <a id="centered_return" href="user.php">Powrót na stronę</a>
        <h1>Informacje o Kliencie</h1>
        <p class="requests">
        <a id="centered_ahref" href="export_csv.php">Pobierz w rozszerzeniu CSV</a>
            <?php 
                echo '<table id="table_requests">'; 
                

                $sql = "SELECT * FROM users WHERE ID_users LIKE '".$_SESSION['id_users']."';";
                $result = mysqli_query($conn, $sql);
                //if($result = $conn->query($sql)){
                while ($row = $result->fetch_assoc()) {
                    $field1name = $row["login"];
                    $field2name = $row["vehicle"];

                    echo '
                    <tr> 
                        <th> <font face="Arial">Twój login</font> </th> 
                        <td>'.$field1name.'</td>
                    </tr>
                    <tr>
                        <th> <font face="Arial">Twój przypisany pojazd</font> </th>
                        <td>'.$field2name.'</td> 
                    </tr>
                    ';
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