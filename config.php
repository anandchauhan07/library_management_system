<?php
session_start();
$conn= mysqli_connect("localhost","root","","library_system");

if(!$conn)
{
    die("connection fail!!!!!!");
}

?>