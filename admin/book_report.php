<?php
include "../config.php";

// fetch all books
$query = "SELECT * FROM book";
$result = mysqli_query($conn, $query);
?>

<h4 class="mb-3">Book Report</h4>

<div class="card shadow">
  <div class="card-body">

    <table class="table table-bordered table-striped table-hover">
      <thead class="table-success text-center">
        <tr>
          <th>ID</th>
          <th>Image</th>
          <th>Book Name</th>
          <th>Author</th>
          <th>Branch</th>
          <th>Total Qty</th>
          <th>Available</th>
          <th>Rent / Day</th>
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

  <td>
    <img src="uploads/<?= htmlspecialchars($row['bookpic']); ?>" width="60" height="70">
  </td>

  <td><?= htmlspecialchars($row['bookname']); ?></td>
  <td><?= htmlspecialchars($row['bookaudor']); ?></td>
  <td><?= strtoupper($row['branch']); ?></td>
  <td><?= $row['bookquantity']; ?></td>

  <td>
    <span class="badge bg-<?= $row['bookava'] > 0 ? 'success' : 'danger'; ?>">
      <?= $row['bookava']; ?>
    </span>
  </td>

  <td>₹ <?= $row['bookrent']; ?></td>

  <!-- ACTION -->
  <td>
    <a href="dashboard_admin.php?page=edit_book&id=<?= $row['id']; ?>" 
       class="btn btn-sm btn-warning">
       Edit
    </a>

    <a href="edit_delete/delete_book.php?id=<?= $row['id']; ?>" 
       class="btn btn-sm btn-danger"
       onclick="return confirm('Are you sure you want to delete this book?');">
       Delete
    </a>
  </td>
</tr>

        <?php
          }
        } else {
          echo "<tr><td colspan='8'>No books found</td></tr>";
        }
        ?>
      </tbody>
    </table>

  </div>
</div>
