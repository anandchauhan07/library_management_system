<?php

include '../../config.php';
if(!isset($_GET['id']) || !isset($_SESSION['admin']))
{
     header("Location: ../index.php");
    exit;
}

$id=$_GET['id'];

$delete=mysqli_query($conn,"delete from userdata where id=$id");

header('Location:../dashboard_admin.php?page=person_report');

?>