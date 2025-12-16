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

    /* Header */
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

    /* Layout */
    .container {
      display: flex;
      padding: 20px;
    }

    /* Sidebar */
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

    /* Content */
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

    .info {
      margin-top: 30px;
      font-size: 16px;
    }

    .info p {
      margin: 15px 0;
    }

    .info span {
      font-weight: bold;
    }
  </style>
</head>
<body>

  <!-- Header -->
  <div class="header">
    <img src="library.png" alt="Library Logo">
    <h1>Digital Library</h1>
  </div>

  <!-- Main Layout -->
  <div class="container">

    <!-- Sidebar -->
    <div class="sidebar">
      <a href="">Welcome</a>
      <a href="my_account.php">My Account</a>
      <a href="requestBook/request_book.php">Request Book</a>
      <a href="issueRecord/issue_record.php">Book Report</a>
      <a href="../logout.php">LOGOUT</a>
    </div>

    <!-- Content Area -->
    <div class="content">
      <h2>My Account</h2>

      <div class="info">
      <?php include('my_account.php'); ?>
      </div>
    </div>

  </div>

</body>
</html>
