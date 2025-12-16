<?php

include ("../../config.php");
// if(!isset($_GET['id']) || $_SESSION['admin'])
// {
//     header("Location:../../index.php");
// }
$bookid=$_GET['id'];

mysqli_query($conn,"delete from book where id=$bookid");

echo "<script>

 window.location='../dashboard_admin.php?page=book_report';

</script>"
?>
