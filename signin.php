<?php

session_start();

if(isset($_POST['email'])) {
    //Successful validation
    $all_ok = true;
    //Correct nick
    $nick = $_POST['nick'];
    //length of the string
    if ((strlen($nick) < 3) || (strlen($nick) > 20)) {
        $all_ok = false;
        $_SESSION['e_nick'] = 'Your login has to have 3 to 20 characters.';
    }

    if (ctype_alnum($nick) == false) {
        $all_ok = false;
        $_SESSION['e_nick'] = 'You can\'t use special characters in your login.';
    }

    //checking if email is correct
    $email = $_POST['email'];
    $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);

    if((filter_var($emailB, FILTER_SANITIZE_EMAIL)==false) || ($emailB!=$emailB))
    {
        $all_ok = false;
        $_SESSION['e_email'] = 'Please check you email address again. Something is wrong';
    }

    //checking if password is correct
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    if((strlen($password1)<8 || strlen($password1)>20))
    {
        $all_ok = false;
        $_SESSION['e_password'] = 'Your password has to have 8 to 20 characters.';
    }

    if($password1!=$password2)
    {
        $all_ok = false;
        $_SESSION['e_password'] = 'Passwords don\'t match.';
    }

    $password_hash = password_hash($password1, PASSWORD_DEFAULT);

    //if regulations are accepted
    if(!isset($_POST['regulations']))
    {
        $all_ok = false;
        $_SESSION['e_regulations'] = 'You have to accept terms and conditions.';
    }

    //bot or not?
    $secret = '6LdZZB4UAAAAAGH-iJbZ2wp5ng0FyWwyM3WR5YlM';

    $check = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);

    $answer = json_decode($check);

    if($answer->success==false)
    {
        $all_ok = false;
        $_SESSION['e_bot'] = 'Oh Bot, please confirm that you are human.';
    }

    require_once "connect.php";

    

    if($all_ok == true)
    {
        //all test are ok
        echo 'validation complete';
        exit();

    }
}

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Sign in if you dare</title>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <style>
        .error
        {
            color: red;
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>
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

    <?php
    if (isset($_SESSION['e_nick']))
    {
        echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
        unset($_SESSION['e_nick']);
    }
    ?>
    <br><br>
    Email:<br><input type="text" name="email">

    <?php
    if (isset($_SESSION['e_email']))
    {
        echo '<div class="error">'.$_SESSION['e_email'].'</div>';
        unset($_SESSION['e_email']);
    }
    ?>

    <br><br>
    Password:<br><input type="password" name="password1">

    <?php
    if (isset($_SESSION['e_password']))
    {
        echo '<div class="error">'.$_SESSION['e_password'].'</div>';
        unset($_SESSION['e_password']);
    }
    ?>

    <br><br>
    Repeat password:<br><input type="password" name="password2">
    <br><br>
    <label>
      <input type="checkbox" name="regulations">I accept terms and conditions.
    </label>

    <?php
    if (isset($_SESSION['e_regulations']))
    {
        echo '<div class="error">'.$_SESSION['e_regulations'].'</div>';
        unset($_SESSION['e_regulations']);
    }
    ?>

    <br><br>
    <div class="g-recaptcha" data-sitekey="6LdZZB4UAAAAAFmZoMOGDwbFAVXc2s4UjyHP6zDn"></div>

    <?php
    if (isset($_SESSION['e_bot']))
    {
        echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
        unset($_SESSION['e_bot']);
    }
    ?>

    <br>
    <input type="submit" value="Sign in">
    <br><br><hr>
</form>
</body>
</html>