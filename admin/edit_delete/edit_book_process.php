<?php

include '../../config.php';
session_start();
if(!isset($_GET['id']) || !isset($_SESSION['admin']))
{
     header("Location: ../../index.php");
    exit;
}

$id=$_GET['id'];
$oldpic=$_POST['oldpic'];
$name=$_POST['bookname'];
$detail=$_POST['bookdetail'];
$author=$_POST['bookauthor'];
$pub=$_POST['bookpub'];
$branch=$_POST['branch'];
$price=$_POST['bookprice'];
$quantity=$_POST['bookquantity'];
$rent=$_POST['bookrent'];
$ava=$_GET['ava'];




if(!empty($_FILES['bookpic']['name']))
{
    $pic=$_FILES['bookpic']['name'];
    $upload_path='../uploads/'.$pic;
    move_uploaded_file($pic, $upload_path);
    
}
else{
    $pic=$oldpic;
}






$update_book=mysqli_query($conn,"update book set bookname='$name' ,bookpic='$pic' , bookdetail='$detail' ,bookaudor='$author', bookpub='$pub', branch='$branch', bookprice=$price , bookquantity=$quantity , bookava='$ava', bookrent=$rent where id=$id");


header('Location:../dashboard_admin.php?page=book_report');

?>