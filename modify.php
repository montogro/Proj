<?php
    session_start();
    include "db_conn.php";
    if(isset($_SESSION['id_employee']) && isset($_SESSION['login'])){

?>

<!DOCTYPE html5>
<html>
<head>
    <title><?php echo $_SESSION['login']; ?> - odpowiadanie na zgłoszenie</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="block_request">
        <a id="centered_ahref" href="all_requests.php">Powrót na stronę</a>
        <h1>Odpowiadanie na zgłoszenie o identyfikatorze: <?php echo $_POST['id_element']; ?> </h1>
        <p class="requests">
            <?php 

                /*$sql = "SELECT * FROM requests WHERE id_request LIKE ".$_POST['id_element'].";";
                $result = mysqli_query($conn, $sql);

                echo '<table id="table_requests"> 
                <tr> 
                    <th> <font face="Arial">Data zgłoszenia</font> </th> 
                    <th> <font face="Arial">Klient</font> </th> 
                    <th> <font face="Arial">Temat zgłoszenia</font> </th>
                    <th> <font face="Arial">Opis problemu przez klienta</font> </th> 
                    <th> <font face="Arial">Odpowiedź pracownika</font> </th> 
                    <th> <font face="Arial">Status zgłoszenia</font> </th> 
                </tr>';
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
                }*/
            ?>
        </p>
        <form id="search_form" action="modify.php" method="POST">
                <input type="hidden" name="id_element" value="<?php echo $_POST['id_element']; ?>">
                <input type="text" name="response" placeholder="Wprowadź odpowiedź na zgłoszenie klienta">
                <br>
                <button id="modyfikuj" type="submit">Odpowiedz</button>
        </form>
            <?php
                if(isset($_POST['response'])){
                    $sql = "UPDATE requests SET `response` = '".$_POST['response']."', `status` = 'zamknięte' WHERE id_request LIKE ".$_POST['id_element'].";";
                    $result = mysqli_query($conn, $sql);
                    header("Location: all_requests.php?fine=Pomyślnie wysłano odpowiedź do Klienta");
                    exit();
                }
            ?>
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