<?php
include "../config.php";


if (!isset($_SESSION['user_id'])) {
    header("Location: ../../index.php");
    exit;
}

$userid = $_SESSION['user_id'];

// fetch user info
$userRes = mysqli_query($conn, "SELECT name, type FROM userdata WHERE email=$userid");
$user = mysqli_fetch_assoc($userRes);

// fetch available books
$bookRes = mysqli_query($conn, "SELECT id, bookname FROM book WHERE bookava > 0");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Request Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header text-white text-center" style="background:#2acb1a;">
            <h4>Request Book</h4>
        </div>

        <div class="card-body">
            <form action="requestBook/request_book_process.php" method="POST">

                <div class="mb-3">
                    <label class="form-label">Select Book</label>
                    <select name="bookid" class="form-select" required>
                        <option value="">Select Book</option>
                        <?php while ($b = mysqli_fetch_assoc($bookRes)) { ?>
                            <option value="<?= $b['id']; ?>">
                                <?= $b['bookname']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Issue Days</label>
                    <input type="number" name="issuedays" class="form-control" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn" style="background:#2acb1a;">
                        Request Book
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

</body>
</html>
