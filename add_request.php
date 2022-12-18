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
    <form id="request_form" action="send.php" method="POST">
        <a id="centered_return" href="user.php">Powrót na stronę</a>
        <h2>Formularz zgłoszeniowy</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <?php if (isset($_GET['fine'])) { ?>
            <p class="fine"><?php echo $_GET['fine']; ?></p>
        <?php } ?>

        <label id="user_form_label">Data zakupu maszyny*</label>
        <input type="date" id="start" name="purchase_date" value="<?php echo date('Y-m-d');?>" min="2010-01-01" max="2099-12-31">
        <br>

        <label id="user_form_label">Właściciel pojazdu / firma*</label>
        <input type="text" name="owner_company" placeholder="Podaj właściciela pojazdu lub firmę .. ">
        <br>

        <label id="user_form_label">Numer gwarancji*</label>
        <input type="text" name="warranty_number" placeholder="Podaj numer gwarancji .. ">
        <br>

        <label id="user_form_label">Data wygaśnięcia gwarancji*</label>
        <input type="date" id="start" name="warranty_date" value="<?php echo date('Y-m-d');?>" min="2010-01-01" max="2099-12-31">
        <br>

        <label id="user_form_label">Lokalizacja*</label>
        <input type="text" name="location" placeholder="Podaj miejsce użytkowania maszyny .. ">
        <br>

        <label id="user_form_label">Numer kontaktowy*</label>
        <input type="text" name="phone_number" placeholder="Podaj swój numer telefonu .. ">
        <br>

        <label id="user_form_label">Typ maszyny*</label>
        <input type="text" name="vehicle_type" placeholder="Podaj jaki jest to typ maszyny .. ">
        <br>

        <label id="user_form_label">Numer seryjny maszyny*</label>
        <input type="text" name="vehicle_serial_number" placeholder="Podaj numer seryjny maszyny .. ">
        <br>

        <label id="user_form_label">Przebieg, liczba cykli lub czas pracy maszyny*</label>
        <input type="text" name="mileage" placeholder="Podaj przebieg maszyny, liczbę cykli lub czas jej pracy .. ">
        <br>

        <label id="user_form_label">Kod błędu (jeśli występuje)</label>
        <input type="text" name="error_code" placeholder="Podaj kod błędu awarii (panel sterowania, jeśli występuje) .. ">
        <br>

        <label id="user_form_label">Tytuł zgłoszenia*</label>
        <input type="text" name="subject" placeholder="Podaj czego dotyczy to zgłoszenie .. ">
        <br>

        <label id="user_form_label">Opis problemu*</label>
        <textarea name="description" placeholder="Treść Twojej wiadomości, postaraj się dokładnie opisać swój problem - usterki, uwagi, objawy. Znacznie ułatwi to nam postawienie diagnozy i przyspieszy proces weryfikacji zgłoszenia .. "></textarea>
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