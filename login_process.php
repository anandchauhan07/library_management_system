<?php
include "config.php";
include "index.php";


$email=$_GET['email'];
$pass=$_GET['pass'];



$query="select * from admin where email='$email' and pass='$pass'";
$result=mysqli_query($conn,$query);

$query2="select * from userdata where email='$email' and pass='$pass'";
$result2=mysqli_query($conn,$query2);

$userid=mysqli_fetch_assoc(
        mysqli_query($conn, "select id from userdata where email='$email' and pass='$pass'")
    );



if(mysqli_num_rows($result)==1)
{
    $_SESSION['admin']=$email;
    header("Location:sidebar.php");

}
else if(mysqli_num_rows($result2)==1){
     $_SESSION['user_id']=$userid['id'];
    header("Location:User/dashboard_user.php");
}

else{
    echo "<h4 style='color:red;text-align:center;'>Invalid admin credentials</h4>";
}



?>