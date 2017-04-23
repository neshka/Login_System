<?php

session_start();
if((isset($_SESSION['login'])) && ($_SESSION['login'] == true))
{
    header('Location: game.php');
    exit();
}

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Log in if you dare</title>
</head>
<body>
<hr>
<br>
"It ain't what you don't know that gets you into trouble.
<br>
It's what you know for sure that just ain't so."
<br><br>
Mark Twain
<br><br><br><hr>
<form action="signin.php" method="post">
    <br>
    Login:<br><input type="text" name="login">
    <br><br>
    Password:<br><input type="password" name="password">
    <br><br><br>
    <input type="submit" value="Sign in">
    <br><br><hr>
</form>
<?php
if(isset($_SESSION['blad']))
echo $_SESSION['blad'];
?>
</body>
</html>