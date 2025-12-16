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
        <!-- Content -->
        <div class="col-md-9">
            <div class="account-box">
                <!-- <div class="account-header">My Account</div> -->
                <h2>My Account</h2>
                <p><strong>Person Name:</strong> <?= htmlspecialchars($user['name']); ?></p>
                <p><strong>Person Email:</strong> <?= htmlspecialchars($user['email']); ?></p>
                <p><strong>Account Type:</strong> <?= htmlspecialchars($user['type']); ?></p>

            </div>
        </div>

    </div>
</div>


