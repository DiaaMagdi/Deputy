<?php 

include_once('login.html');
include_once('control.php');

session_start();

if(isset($_POST['log_submit']))
{
    $email = $_POST['log_email'];
    $pass = $_POST['log_pass'];
    
    $control = new control();
    $validation = $control->validate(array("email"=>"$email", "pass"=>"$pass"));
    if($validation[1] != false)
    {
        //getting the user record in db
        $dbModel = new model();
        $result = $dbModel->sel("user", "*", 'Email="' . $email . '"');
        $result = $result->fetch_assoc();
        if($result["Password"] == $pass){
            $_SESSION["email"] = $email;
            header("location:start.php");
        }
    }
    else
    {
        echo $validation[0];
    }
}


?>