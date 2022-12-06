<!DOCTYPE html5>
<html>
<head>
    <title>Logowanie</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form id="login_form" action="login.php" method="POST">
        <h2>Login</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label id="user_form_label">Nazwa użytkownika*</label>
        <input type="text" name="login" placeholder="Login">
        <br>

        <label id="user_form_label">Hasło*</label>
        <input type="password" name="password" placeholder="Hasło">
        <br>
        
        <fieldset>
        <legend>Typ użytkownika</legend>
        
        <div class="radio">
            <input type="radio" id="pickedChoice0" name="radio" value="administrator" />
            <label id="radio_form_label" for="pickedChoice0">Administrator</label>

            <input type="radio" id="pickedChoice1" name="radio" value="pracownik" />
            <label id="radio_form_label" for="pickedChoice1">Pracownik</label>

            <input type="radio" id="pickedChoice2" name="radio" value="klient" />
            <label id="radio_form_label" for="pickedChoice2">Klient</label>
        </div>

        </fieldset>
        
        <a id="register" href="register.php">Zarejestruj się</a>
        <button id="login" type="submit">Zaloguj się</button>
    </form>
</body>
</html>