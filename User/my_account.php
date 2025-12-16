<?php
include "../config.php";

// check login
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// fetch user details
$query = "SELECT name, email, type FROM userdata WHERE id = $user_id";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Account</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #eaffea;
        }
        .sidebar button {
            width: 100%;
            margin-bottom: 12px;
            background: #2acb1a;
            border: none;
            color: #fff;
            padding: 12px;
            font-weight: 600;
        }
        .account-box {
            background: #8cff8c;
            padding: 25px;
            border-radius: 6px;
        }
        .account-header {
            background: #2acb1a;
            color: #fff;
            text-align: center;
            padding: 12px;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="container-fluid mt-4">
    <div class="row">

        <!-- Sidebar -->
        <!-- <div class="col-md-3 sidebar">
            <button>Welcome</button>
            <button onclick="location.href='my_account.php'">My Account</button>
            <button onclick="location.href='request_book.php'">Request Book</button>
            <button onclick="location.href='book_report_user.php'">Book Report</button>
            <button onclick="location.href='logout.php'">LOGOUT</button>
        </div> -->

        <!-- Content -->
        <div class="col-md-9">
            <div class="account-box">
                <!-- <div class="account-header">My Account</div> -->

                <p><strong>Person Name:</strong> <?= htmlspecialchars($user['name']); ?></p>
                <p><strong>Person Email:</strong> <?= htmlspecialchars($user['email']); ?></p>
                <p><strong>Account Type:</strong> <?= htmlspecialchars($user['type']); ?></p>

            </div>
        </div>

    </div>
</div>

</body>
</html>
