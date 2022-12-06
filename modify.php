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
        <a id="centered_ahref" href="all_requests.php">Powrót na stronę</a>
        <h1>Zaktualizuj status lub odpowiedz na zgłoszenie o identyfikatorze: <?php echo $_POST['id_element']; ?> </h1>
        <form id="search_form" action="modify.php" method="POST">
            <input type="hidden" name="id_element" value="<?php echo $_POST['id_element']; ?>">
            <button id="modyfikuj" type="submit" name="accept">Przyjmij zgłoszenie</button>
        </form>
        <form id="search_form" action="modify.php" method="POST">
                <input type="hidden" name="id_element" value="<?php echo $_POST['id_element']; ?>">
                <textarea name="response" placeholder="Wpisz odpowiedź dla Klienta"></textarea>
                <br>
                <button id="modyfikuj" type="submit">Odpowiedz</button>
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