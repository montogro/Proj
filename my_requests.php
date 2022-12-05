<?php
    session_start();
    include "db_conn.php";
    if(isset($_SESSION['id_users']) && isset($_SESSION['login'])){

?>

<!DOCTYPE html5>
<html>
<head>
    <title><?php echo $_SESSION['login']; ?> - moje zgłoszenia</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="block">
        <a id="centered_ahref" href="user.php">Powrót na stronę</a>
        <h1>Historia zgłoszeń przypisanych do Twojego konta</h1>
        <p class="requests">
            <?php 
            
                echo '<table id="table_requests"> 
                <tr> 
                    <th> <font face="Arial">Temat</font> </th> 
                    <th> <font face="Arial">Treść</font> </th> 
                    <th> <font face="Arial">Odpowiedź pracownika</font> </th> 
                    <th> <font face="Arial">Status zgłoszenia</font> </th> 
                </tr>';

                $sql = "SELECT * FROM requests WHERE client LIKE '".$_SESSION['login']."';";
                $result = mysqli_query($conn, $sql);
                //if($result = $conn->query($sql)){
                while ($row = $result->fetch_assoc()) {
                    $field1name = $row["subject"];
                    $field2name = $row["description"];
                    $field3name = $row["response"];
                    $field4name = $row["status"]; 

                    echo '<tr> 
                            <td>'.$field1name.'</td> 
                            <td>'.$field2name.'</td> 
                            <td>'.$field3name.'</td> 
                            <td>'.$field4name.'</td> 
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