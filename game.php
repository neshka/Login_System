<?php

session_start();
if(!isset($_SESSION['login']))
{
    header('Location: index.php');
    exit();
}

?>


<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Playground</title>
</head>
<body>
<?php
echo "<a href='logout.php'>Log out</a>";
echo "<p>Welcome ".$_SESSION['user']."!";

echo "<p><b>Wood:</b> ".$_SESSION['drewno'];
echo "<p><b>Stone</b> ".$_SESSION['kamien'];
echo "<p><b>Food</b> ".$_SESSION['zboze'];

echo "<p><b>E-mail:</b> ".$_SESSION['mail'];
echo "<p><b>Premium profile expiration date:</b> ".$_SESSION['dnipremium']."<p>";

$date = new DateTime('2017-01-01 09:30:15');

echo 'Date and the server\'s time: '.$date->format('Y-m-d H:i:s')."<br>";

$theend = DateTime::createFromFormat




?>
</body>
</html>