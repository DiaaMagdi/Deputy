<?php

include_once("start.html");

session_start();

echo "<script> document.getElementById(\"register\").innerText = \" $_SESSION[\"name\"] \" </script>";



?>