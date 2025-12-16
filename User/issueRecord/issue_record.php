<?php
include "../config.php";

// login check
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../index.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// fetch issued books for logged-in user
$query = "SELECT * FROM issuebook WHERE userid = $user_id ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background:#eaffea; }
        .sidebar button {
            width:100%;
            margin-bottom:12px;
            background:#2acb1a;
            border:none;
            color:#fff;
            padding:12px;
            font-weight:600;
        }
        .record-box {
            background:#8cff8c;
            padding:20px;
            border-radius:6px;
        }
        .record-header {
            background:#2acb1a;
            color:#fff;
            text-align:center;
            padding:10px;
            font-size:22px;
            font-weight:bold;
            margin-bottom:15px;
        }
        table th {
            background:#f4b400;
        }
    </style>




<div class="container-fluid mt-4">
  <div class="row">

    <!-- Sidebar -->


    <!-- Content -->
    <div class="col-md-9">
      <div class="record-box">
        <div class="record-header">ISSUE RECORD</div>

        <table class="table table-bordered text-center">
          <thead>
            <tr>
              <th>Name</th>
              <th>Book Name</th>
              <th>Issue Date</th>
              <th>Return Date</th>
              <th>Fine</th>
              <th>Return</th>
            </tr>
          </thead>

          <tbody>
          <?php
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
          ?>
            <tr>
              <td><?= htmlspecialchars($row['issuename']); ?></td>
              <td><?= htmlspecialchars($row['issuebook']); ?></td>
              <td><?= $row['issuedate']; ?></td>
              <td><?= $row['issuereturn']; ?></td>
              <td>
                <span class="badge bg-<?= $row['fine'] > 0 ? 'danger' : 'success'; ?>">
                  ₹ <?= $row['fine']; ?>
                </span>
              </td>
              <td>
                <a href="issueRecord/return_book.php?id=<?= $row['id']; ?>" 
                   class="btn btn-sm btn-primary">
                   Return
                </a>
              </td>
            </tr>
          <?php
            }
          } else {
            echo "<tr><td colspan='6'>No issue records found</td></tr>";
          }
          ?>
          </tbody>

        </table>
      </div>
    </div>

  </div>
</div>

