<?php
include '../../config.php';
if(!isset($_POST))
{
    header("Location:../../index.php");
    exit;
}

$name=$_POST['name'];
$email=$_POST['email'];
$type=$_POST['type'];
$id=$_GET['id'];

echo $id;


$update=mysqli_query($conn,"update userdata set name='$name',email='$email',type='$type' where id=$id");

echo "<script>alert('Record Updated successfully');
window.location='../dashboard_admin.php?page=person_report';</script>";

?>