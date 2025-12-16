<?php
if(session_status()!=PHP_SESSION_ACTIVE)
{
    session_start();
}
$conn= mysqli_connect("localhost","root","","library_system");

if(!$conn)
{
    die("connection fail!!!!!!");
}

?>