<?php
    session_start();
    if(isset($_SESSION['id_users']) && isset($_SESSION['login'])){
?>

<!DOCTYPE html5>
<html>
<head>
    <title><?php echo $_SESSION['login']; ?> - panel użytkownika</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="block_request">
        <a id="centered_return" href="user.php">Powrót na stronę</a>
        <h1>Poradniki eksploatacyjne</h1>
        <br>
        <div class="section">
            <div class="explanation">
                <h2>Film instruktażowy 1 - zdalna aktywacja</h2>
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/XUb7ZhSo5lI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <h4>Krótki opis: aktywacja maszyny z użyciem kodu aktywacji z poziomu ustawień maszyny, który należy nam przesłać w celu przeprowadzenia zdalnej operacji.</h4>
            </div>
            <div class="explanation">
                <h2>Film instruktażowy 2 - presostat</h2>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/hVSBoErh91I" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <h4>Krótki opis: konfiguracja presostatu, zmiana histerezy.</h4>
            </div>
        </div>
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