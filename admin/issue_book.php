<?php
include "../config.php";

// fetch users
$userQuery = "SELECT id, name, type FROM userdata";
$userResult = mysqli_query($conn, $userQuery);

// fetch available books only
$bookQuery = "SELECT id, bookname FROM book WHERE bookava > 0";
$bookResult = mysqli_query($conn, $bookQuery);
?>

<h4 class="mb-3">Issue Book</h4>

<div class="card shadow">
  <div class="card-body">

    <form action="issue_book_process.php" method="POST">

      <div class="row mb-3">
        <div class="col-md-6">
          <label class="form-label">Select User</label>
          <select name="userid" class="form-select" required>
            <option value="">Select User</option>
            <?php while ($u = mysqli_fetch_assoc($userResult)) { ?>
              <option value="<?= $u['id']; ?>">
                <?= $u['name']; ?> (<?= $u['type']; ?>)
              </option>
            <?php } ?>
          </select>
        </div>

        <div class="col-md-6">
          <label class="form-label">Select Book</label>
          <select name="bookid" class="form-select" required>
            <option value="">Select Book</option>
            <?php while ($b = mysqli_fetch_assoc($bookResult)) { ?>
              <option value="<?= $b['id']; ?>">
                <?= $b['bookname']; ?>
              </option>
            <?php } ?>
          </select>
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">Issue Days</label>
        <input type="number" name="issuedays" class="form-control" required>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-success">
          Issue Book
        </button>
      </div>

    </form>

  </div>
</div>
