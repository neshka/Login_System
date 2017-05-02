<?php

session_start();
if((!isset($_SESSION['signindone'])))
{
    header('Location: index.php');
    exit();
}
else
{
    unset($_SESSION['signindone']);
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
Thanks for registration.
<br>
<a href="login.php">Here you can log in.</a>
<br><br><hr>
</body>
</html>