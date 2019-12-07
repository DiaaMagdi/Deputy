<?php

include_once("Hello.html");
include_once("control.php");

$model = new model();

if(isset($_POST['sender_submit']))
{
    //sender
    $srcSender = $_POST['src_sender'];
    $dstSender = $_POST['dst_sender'];
    $idSender = $_POST['id_sender'];
    $phoneNumSender = $_POST['num_sender'];
    $width = $_POST['width_sender'];
    $length = $_POST['length_sender'];
    $breakable = $_POST["radio"] == 'breakable'?1:0;

    $model->ins("requests", 
    "Source, Destination, NID, PhoneNumber, Width, Length, Breakable", 
    "'$srcSender', '$dstSender', '$idSender', '$phoneNumSender', '$width', '$length', '$breakable'");

}
if(isset($_POST['search']))
{
    $srcDriver = $_POST['src_driver'];
    $dstDriver = $_POST['dst_driver'];
    $idDriver = $_POST['id_driver'];
    $phoneNumDriver = $_POST['num_driver'];

    $list = $model->sel("requests", "*", "Source='$srcDriver' and Destination='$dstDriver'");
    $list = $list->fetch_all();
    for ($i=0; $i < count($list); $i++) { 
        $subList = $list[$i];
        for ($j=0; $j < count($subList); $j++) { 
            echo $subList[$j] . " ";
        }
        echo "<hr>";
    }
}



?>