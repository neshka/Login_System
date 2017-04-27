<?php
session_start();

if(!isset($_POST['login']) || (!isset($_POST['password'])))
{
    header('Location: index.php');
    exit();
}

require_once "connect.php";//add file with database contain login and pass

//creating connection with the database, object of mysqli class
$con = @new mysqli($host,
                  $db_user,
                  $db_password,
                  $db_name);
//@ error control operator

if($con->connect_errno!=0)//if error connection in not equal to '0' so there is an error then; 0=false
{
    echo "Error: ".$con->connect_errno;
}
else
{
    $login = $_POST['login'];
    $password = $_POST['password'];

    $login = htmlentities($login, ENT_QUOTES, "UTF-8");




    if($result = @$con->query(
        sprintf("SELECT * FROM uzytkownicy WHERE user='%s'",
            mysqli_real_escape_string($con, $login))));

    {
        $how_many_users = $result->num_rows;
        if($how_many_users>0)
        {
            $_SESSION['login'] = true;

            $row = $result->fetch_assoc();//show me assoc table with results of query
            $_SESSION['id'] = $row['id'];
            $_SESSION['user'] = $row['user'];//show me user name assoc with 'user' category in db
            $_SESSION['drewno'] = $row['drewno'];
            $_SESSION['kamien'] = $row['kamien'];
            $_SESSION['zboze'] = $row['zboze'];
            $_SESSION['dnipremium'] = $row['dnipremium'];
            $_SESSION['mail'] = $row['email'];

            unset($_SESSION['blad']);
            $result->close();//close result! if you don't do it somewhere in the world little kitty will die

            header('Location: game.php');
        }else{
            $_SESSION['blad'] = '<span style="color:red">Wrong login or password!</span>';
            header('Location: index.php');

        }

    }

    $con->close();
}

?>