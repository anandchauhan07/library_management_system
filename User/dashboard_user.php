

<?php
// ====== SESSION & BASE URL ======
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define('BASE_URL', '/LIBRARY_MANAGEMENT/');

// optional auth check (agar user login required hai)
// if (!isset($_SESSION['user_id'])) {
//     header("Location: " . BASE_URL . "index.php");
//     exit;
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Dashboard</title>

  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #eaffea;
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

    .container {
      display: flex;
      padding: 20px;
    }

    .sidebar {
      width: 220px;
    }

    .sidebar a {
      display: block;
      background: #1fc41f;
      color: white;
      text-decoration: none;
      padding: 12px;
      margin-bottom: 10px;
      text-align: center;
      font-weight: bold;
      border-radius: 3px;
    }

    .sidebar a:hover {
      background: #169e16;
    }

    .content {
      flex: 1;
      margin-left: 20px;
      background: #7cff7c;
      padding: 20px;
      border-radius: 3px;
    }

    .content h2 {
      background: #1fc41f;
      color: white;
      padding: 10px;
      text-align: center;
      margin-top: 0;
    }
  </style>
</head>
<body>

<!-- ===== HEADER ===== -->
<div class="header">
  <img src="<?= BASE_URL ?>images/library_logo.jpg" alt="Library Logo">
  <h1>Digital Library</h1>
</div>

<!-- ===== MAIN LAYOUT ===== -->
<div class="container">

  <!-- ===== SIDEBAR ===== -->
  <div class="sidebar">
    <a href="<?= BASE_URL ?>User/dashboard_user.php">Welcome</a>

    <a href="<?= BASE_URL ?>User/dashboard_user.php?page=my_account">
      My Account
    </a>

    <a href="<?= BASE_URL ?>User/dashboard_user.php?page=request_book">
      Request Book
    </a>

    <a href="<?= BASE_URL ?>User/dashboard_user.php?page=issue_record">
      Book Report
    </a>

    <a href="<?= BASE_URL ?>logout.php">LOGOUT</a>
  </div>

  <!-- ===== CONTENT ===== -->
  <div class="content">
    <?php
    if (isset($_GET['page'])) {

        $page = $_GET['page'];

        switch ($page) {
            case 'request_book':
                include 'requestBook/request_book.php';
                break;

            case 'issue_record':
                include 'issueRecord/issue_record.php';
                break;

            case 'my_account':
                include 'my_account.php';
                break;

            default:
                echo "<h3>Page not found</h3>";
                break;
        }

    } else {
        // default page
        include 'my_account.php';
    }
    ?>
  </div>

</div>

</body>
</html>
