<?php

session_start();
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Sign in if you dare</title>
    <script src='https://www.google.com/recaptcha/api.js'></script>
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
<form method="post">
    <br>
    Login:<br><input type="text" name="nick">
    <br><br>
    Email:<br><input type="text" name="email">
    <br><br>
    Password:<br><input type="password" name="password">
    <br><br>
    Repeat password:<br><input type="password" name="password2">
    <br><br>
    <label>
      <input type="checkbox" name="regulations">I agree to terms.
    </label><br><br>
    <div class="g-recaptcha" data-sitekey="6LdZZB4UAAAAAFmZoMOGDwbFAVXc2s4UjyHP6zDn"></div>
    <br>
    <input type="submit" value="Sign in">
    <br><br><hr>
</form>
<?php
if(isset($_SESSION['blad']))
echo $_SESSION['blad'];
?>
</body>
</html>