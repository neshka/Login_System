<?php
require_once "connect.php";//add file with database contain login and pass

//creating connection with the database, object of mysqli class
$con = @new mysqli($host,
                  $db_user,
                  $db_password,
                  $db_name);
//@ means that we'll add handling exceptions for error

if($con->connect_errno!=0)//if error connection in not equal to '0' so there is an error then...
{
    echo "Error: ".$con->connect_errno." Description: ".$con->error;
}
else
{
    $login = $_POST['login'];
    $password = $_POST['password'];

    echo "It's alive!";

    $con->close();
}



?>