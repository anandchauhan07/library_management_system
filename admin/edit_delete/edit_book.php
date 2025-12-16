<?php
include '../../config.php';

if (!isset($_SESSION['admin']) || !isset($_GET['id'])) {
    header("Location: ../index.php");
    exit;
}

    $bookid=$_GET['id'];
$bookResult=mysqli_query($conn,"select * from book where id=$bookid");
$book=mysqli_fetch_assoc($bookResult);




?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Book</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card shadow">
        <div class="card-header bg-success text-white text-center">
          <h4>Add New Book</h4>
        </div>

        <div class="card-body">
          <form action="edit_book_process.php?id=<?=$bookid?>&ava=<?=$book['bookava']?>" method="POST" enctype="multipart/form-data">

            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Book Name</label>
                <input type="text" name="bookname" class="form-control" value="<?= $book['bookname']?>" required>
              </div>

              <div class="col-md-6">
                <label class="form-label">Author</label>
                <input type="text" name="bookauthor" class="form-control" value="<?= $book['bookaudor']?>" required>
              </div>
            </div>

            <div class="mb-3">
              <label class="form-label">Book Details</label>
              <textarea name="bookdetail" value="<?= $book['bookdetail']?>" class="form-control" rows="3" required><?php echo htmlspecialchars($book['bookdetail']); ?></textarea>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Publisher</label>
                <input type="text" name="bookpub" value="<?= $book['bookpub']?>" class="form-control">
              </div>

             <div class="col-md-6">
                <label class="form-label">Branch</label>
                <select name="branch" class="form-select" required>
                    <?php
                    $branches = ['it','computer','electrical','mechanical'];
                    foreach ($branches as $b) {
                        $selected = ($book['branch'] === $b) ? 'selected' : '';
                        echo "<option value='$b' $selected>".strtoupper($b)."</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Book Price</label>
                <input type="number" name="bookprice" class="form-control" value="<?= $book['bookprice']?>" required>
              </div>

              <div class="col-md-6">
                <label class="form-label">Total Quantity</label>
                <input type="number" name="bookquantity" value="<?= $book['bookquantity']?>" class="form-control" required>
              </div>

              
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Rent Per Day</label>
                <input type="number" name="bookrent" value="<?= $book['bookrent']?>" class="form-control" required>
              </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6 text-center">
                    <p><strong>Old Image</strong></p>
                    <img src="../uploads/<?= htmlspecialchars($book['bookpic']); ?>"
                        width="60"  id="oldImg">
                </div>

                <div class="col-md-6 text-center">
                    <p><strong>New Image</strong></p>
                    <img src="../uploads/<?= htmlspecialchars($book['bookpic']); ?>"
                        width="60" id="previewImg" style="display:none;">
                </div>
            </div>

            <div class="mb-3">
            <label class="form-label">Change Image</label>
            <input type="hidden" name="oldpic" value="<?= $book['bookpic']; ?>">

            <input type="file" name="bookpic" class="form-control"
                    accept="image/*" onchange="previewImage(event)">
            </div>

           
            

            <div class="d-grid">
              <button type="submit" class="btn btn-success">
                Add Book
              </button>
            </div>

          </form>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
function previewImage(event) {
    const preview = document.getElementById('previewImg');
    preview.src = URL.createObjectURL(event.target.files[0]);
     preview.style.display = 'inline';
}
</script>

</body>
</html>
