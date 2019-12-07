<?php

include_once('Sign-Up.html');
include_once('control.php');

if(isset($_POST["signup_submit"]))
{
    $name = $_POST['signup_name'];
    $email = $_POST['signup_email'];
    $pass = $_POST['signup_pass'];

    //validate
    $control = new control();
    $validation = $control->validate(array("email"=>"$email", "password"=>"$pass"));
    if($validation[1] != false)
    {
        //inserting to DB
        $dbModel = new model();
        $dbModel = new model();
        $op = $dbModel->ins("userinfo", "Name, Email, Password", "'$name', '$email', '$pass'");
        if($op == true)
            header("location:Hello.php");
    }
    else
    {
        echo $validation[0];
    }
}


?>