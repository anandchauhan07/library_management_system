<?php
include "../config.php";

$query = "SELECT * FROM requestbook";
$result = mysqli_query($conn, $query);
?>

<h4 class="mb-3">Book Requests</h4>

<div class="card shadow">
  <div class="card-body">

    <table class="table table-bordered table-hover">
      <thead class="table-success text-center">
        <tr>
          <th>ID</th>
          <th>User Name</th>
          <th>User Type</th>
          <th>Book Name</th>
          <th>Issue Days</th>
          <th>Action</th>
        </tr>
      </thead>

      <tbody class="text-center">
        <?php
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
              <td><?= $row['id']; ?></td>
              <td><?= $row['username']; ?></td>
              <td><?= ucfirst($row['usertype']); ?></td>
              <td><?= $row['bookname']; ?></td>
              <td><?= $row['issuedays']; ?></td>
              <td>
                <a href="../admin/approve_reject/approve_request.php?id=<?= $row['id']; ?>" 
                   class="btn btn-sm btn-success">
                   Approve
                </a>

                <a href="../admin/approve_reject/reject_request.php?id=<?= $row['id']; ?>" 
                   class="btn btn-sm btn-danger">
                   Reject
                </a>
              </td>
            </tr>
        <?php
          }
        } else {
          echo "<tr><td colspan='6'>No book requests found</td></tr>";
        }
        ?>
      </tbody>
    </table>

  </div>
</div>
