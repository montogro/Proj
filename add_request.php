<?php
    session_start();
    if(isset($_SESSION['id_users']) && isset($_SESSION['login'])){
?>

<!DOCTYPE html5>
<html>
<head>
    <title><?php echo $_SESSION['login']; ?> - dodawanie zgłoszenia</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form action="send.php" method="POST">
        <h2>Formularz zgłoszeniowy</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <?php if (isset($_GET['fine'])) { ?>
            <p class="fine"><?php echo $_GET['fine']; ?></p>
        <?php } ?>
        <label>Tytuł zgłoszenia*</label>
        <input type="text" name="subject" placeholder="Podaj czego dotyczy to zgłoszenie">
        <br>

        <label>Opis problemu*</label>
        <textarea name="description" placeholder="Treść Twojej wiadomości, postaraj się dokładnie opisać swój problem. Znacznie ułatwi to nam postawienie diagnozy i przyspieszy proces weryfikacji zgłoszenia."></textarea>
        <br>

        <button type="submit">Wyślij</button>
    </form>
</body>
</html>

<?php

}
else{
    header("Location: index.php");
    exit(); 
}

?>