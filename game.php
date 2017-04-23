<?php

session_start();

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
echo "<p>Welcome ".$_SESSION['user']."!";

echo "<p><b>Wood:</b> ".$_SESSION['drewno'];
echo "<p><b>Stone</b> ".$_SESSION['kamien'];
echo "<p><b>Food</b> ".$_SESSION['zboze'];

echo "<p><b>E-mail:</b> ".$_SESSION['mail'];
echo "<p><b>Premium days:</b> ".$_SESSION['dnipremium'];
?>
</body>
</html>