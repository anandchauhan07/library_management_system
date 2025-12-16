<?php
include "../config.php";
// include "../index.php";
// fetch all issued books
$query = "SELECT * FROM issuebook ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<h4 class="mb-3">Issue Book Report</h4>

<div class="card shadow">
  <div class="card-body">

    <table class="table table-bordered table-striped table-hover">
      <thead class="table-success text-center">
        <tr>
          <th>ID</th>
          <th>User Name</th>
          <th>User Type</th>
          <th>Book Name</th>
          <th>Issue Days</th>
          <th>Issue Date</th>
          <th>Return Date</th>
          <th>Fine</th>
          <th>Return</th>
        </tr>
      </thead>

      <tbody class="text-center">
        <?php
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
              <td><?= $row['id']; ?></td>
              <td><?= ucfirst($row['issuename']); ?></td>
              <td>
                <span class="badge bg-<?= $row['issuetype'] == 'student' ? 'primary' : 'warning'; ?>">
                  <?= ucfirst($row['issuetype']); ?>
                </span>
              </td>
              <td><?= $row['issuebook']; ?></td>
              <td><?= $row['issuedays']; ?></td>
              <td><?= $row['issuedate']; ?></td>
              <td><?= $row['issuereturn']; ?></td>
              <td>
                <span class="badge bg-<?= $row['fine'] > 0 ? 'danger' : 'success'; ?>">
                  ₹ <?= $row['fine']; ?>
                </span>
              </td>
              <td>
                <a href="../User/issueRecord/return_book.php?id=<?=$row['id'];?>" class="btn btn-sm btn-primary">Return</a>
              </td>
            </tr>
        <?php
          }
        } else {
          echo "<tr><td colspan='8'>No issued books found</td></tr>";
        }
        ?>
      </tbody>

    </table>

  </div>
</div>
