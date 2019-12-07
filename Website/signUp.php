<?php

include_once('Sign-Up.html');
include_once('control.php');

session_start();

if(isset($_POST["signup_submit"]))
{
    $name = $_POST['signup_name'];
    $email = $_POST['signup_email'];
    $pass = $_POST['signup_pass'];

    //validate
    $control = new control();
    $validation = $control->validate(array("email"=>"$email", "pass"=>"$pass"));
    if($validation[1] != false)
    {
        //inserting to DB
        $dbModel = new model();
        $op = $dbModel->ins("user", "Name, Email, Pass", "'$name', '$email', '$pass'");
        if($op == true){
            $_SESSION["email"] = $email;
            $_SESSION["name"] = $name;
            header("location:start.php");
        }
    }
    else
    {
        echo $validation[0];
    }
}


?>