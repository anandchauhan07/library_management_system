<?php
include "../config.php";

// fetch all persons
$query = "SELECT * FROM userdata";
$result = mysqli_query($conn, $query);
?>

<h4 class="mb-3">Person Report</h4>

<div class="card shadow">
  <div class="card-body">

    <table class="table table-bordered table-striped table-hover">
      <thead class="table-success text-center">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Type</th>
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
              <td><?= ucfirst($row['name']); ?></td>
              <td><?= $row['email']; ?></td>
              <td>
                <span class="badge bg-<?= $row['type'] == 'student' ? 'primary' : 'warning'; ?>">
                  <?= ucfirst($row['type']); ?>
                </span>
              </td>
              <td>
                <a href="dashboard_admin.php?page=edit_person_data&id=<?=$row['id'];?>" class="btn btn-sm btn-warning">Edit</a>
              
                <a href="delete_person/delete_person.php?id=<?=$row['id'];?>" onclick=" return confirm('are you sure you want to delete this user?')" class="btn btn-sm btn-danger">Delete</a>
              </td>
            </tr>
        <?php
          }
        } else {
          echo "<tr><td colspan='4'>No records found</td></tr>";
        }
        ?>
      </tbody>

    </table>

  </div>
</div>
