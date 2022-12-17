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
                <h2>Film instruktażowy 1</h2>
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/XUb7ZhSo5lI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum velit ex, blandit ac volutpat a, ultricies sed leo. Nam feugiat neque vitae mollis ullamcorper. Aliquam suscipit ultrices aliquet. Ut elementum, dolor at pulvinar egestas, mauris nisi tempus massa, et scelerisque dolor eros at nisl.</h4>
            </div>
            <div class="explanation">
                <h2>Film instruktażowy 2</h2>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/hVSBoErh91I" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <h4>Lorem ipsum gravida pharetra dolor, a tempus mauris consectetur ut. Morbi non felis quis lorem fermentum dictum. In hac habitasse platea dictumst. In est dui, rutrum a ultrices sit amet, tempor sit amet ipsum. Donec viverra nibh ac nunc finibus pretium. Duis finibus pharetra ex in tristique. Ut eget dapibus tellus. Donec volutpat ante quis pellentesque gravida.</h4>
            </div>
            <div class="explanation">
                <h2>Film instruktażowy 3</h2>
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/XUb7ZhSo5lI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <h4>Lorem ipsum dolor donec viverra nibh ac nunc finibus pretium. Duis finibus pharetra ex in tristique. Ut eget dapibus tellus. Donec volutpat ante quis pellentesque gravida.</h4>
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