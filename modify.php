<?php
    session_start();
    include "db_conn.php";
    if(isset($_SESSION['id_employee']) && isset($_SESSION['login'])){

?>

<!DOCTYPE html5>
<html>
<head>
    <title><?php echo $_SESSION['login']; ?> - modyfikacja zgłoszenia</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="block_request">
        <a id="centered_return" href="all_requests.php">Powrót na stronę</a>
        <h1>Zaktualizuj status lub odpowiedz na zgłoszenie o identyfikatorze: <?php echo $_POST['id_element']; ?> </h1>
        <form id="search_form" action="modify.php" method="POST">
            <input type="hidden" name="id_element" value="<?php echo $_POST['id_element']; ?>">
            <button id="accept" type="submit" name="accept">Przyjmij zgłoszenie do realizacji</button>
        </form>
        <form id="search_form" action="modify.php" method="POST">
                <br><label>Odpowiedź do Klienta</label>
                <input type="hidden" name="id_element" value="<?php echo $_POST['id_element']; ?>">
                <textarea name="response"></textarea>
                <br>
                <button id="respond" type="submit">Odpowiedz i zamknij zgłoszenie</button>
        </form>
            <?php
                if(isset($_POST['accept'])){
                    $sql = "UPDATE requests SET `status` = 'w realizacji' WHERE id_request LIKE ".$_POST['id_element'].";";
                    $result = mysqli_query($conn, $sql);
                    header("Location: all_requests.php?fine=Pomyślnie zaktualizowano zgłoszenie Klienta");
                    exit();
                }
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