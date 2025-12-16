<!-- dashboard_admin.php -->
<?php
include '../sidebar.php';
include '../auth.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      overflow-x: hidden;
    }
    .sidebar {
      width: 240px;
      min-height: 100vh;
      position: fixed;
      background: #198754;
    }
    .content {
      margin-left: 240px;
      padding: 20px;
    }
    .menu-btn {
      background: #1fa84a;
      color: #fff;
      margin-bottom: 10px;
      width: 100%;
    }
    .menu-btn:hover {
      background: #157347;
      color: #fff;
    }
      .header {
      background: #fff;
      padding: 10px 20px;
      display: flex;
      align-items: center;
      border-bottom: 3px solid green;
    }

    .header img {
      height: 60px;
      margin-right: 15px;
    }
     .header h1 {
      color: purple;
      margin: 0;
    }
  </style>
</head> 

<body>
 <div class="header" style="margin-left:250px;">
    <img src="../images/library_logo.jpg" alt="Library Logo">
    <h1 style="display:inline;">Digital Library</h1>
</div>

<!-- Sidebar -->
<!-- <a href="../sidebar.php" class="btn btn-success" style="margin-left:10px ;margin-top:10px">Back</a> -->

<!-- Content Area -->
<div class="content">
  <?php
  if(isset($_GET['id']))
  {
    $id=$_GET['id'];
  }
    if (isset($_GET['page']) ) {
        $page = $_GET['page'];

        if ($page == 'add_book') {
            include "add_book.php";
        }elseif($page=='edit_book'){
          include "edit_delete/edit_book.php";
        } elseif ($page == 'book_report') {
            include "book_report.php";
        }elseif ($page == 'book_request') {
            include "book_request.php";
        } elseif ($page == 'add_person') {
            include "add_person.php";
        }elseif ($page == 'person_report') {
            include "person_report.php";
        } elseif ($page == 'issue_book') {
            include "issue_book.php";
        }elseif ($page == 'issue_report') {
            include "issue_report.php";
        }elseif ($page == 'edit_person_data') {
            include "edit_person_detail/edit_person_data.php";
        }elseif ($page == 'logout') {
            include "logout.php";
        }   else {
            echo "<h4>Page not found</h4>";
        }
    } else {
      
        echo "<h3>Welcome Admin</h3>";
      
    }
  ?>
</div>

</body>
</html>
