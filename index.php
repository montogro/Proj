<!DOCTYPE html5>
<html>
<head>
    <title>Logowanie</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form action="login.php" method="POST">
        <h2>Login</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label>Nazwa użytkownika</label>
        <input type="text" name="login" placeholder="Login">
        <br>

        <label>Hasło</label>
        <input type="password" name="password" placeholder="Hasło">
        <br>

        <button type="submit">Zaloguj się</button>
    </form>
</body>
</html>