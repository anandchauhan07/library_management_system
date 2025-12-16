
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
          <form action="add_book_process.php" method="POST" enctype="multipart/form-data">

            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Book Name</label>
                <input type="text" name="bookname" class="form-control" required>
              </div>

              <div class="col-md-6">
                <label class="form-label">Author</label>
                <input type="text" name="bookauthor" class="form-control" required>
              </div>
            </div>

            <div class="mb-3">
              <label class="form-label">Book Details</label>
              <textarea name="bookdetail" class="form-control" rows="3" required></textarea>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Publisher</label>
                <input type="text" name="bookpub" class="form-control">
              </div>

              <div class="col-md-6">
                <label class="form-label">Branch</label>
                <select name="branch" class="form-select" required>
                  <option value="">Select Branch</option>
                  <option value="IT">IT</option>
                  <option value="Computer">Computer</option>
                  <option value="Electrical">Electrical</option>
                  <option value="Mechanical">Mechanical</option>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Book Price</label>
                <input type="number" name="bookprice" class="form-control" required>
              </div>

              <div class="col-md-6">
                <label class="form-label">Total Quantity</label>
                <input type="number" name="bookquantity" class="form-control" required>
              </div>

              
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Rent Per Day</label>
                <input type="number" name="bookrent" class="form-control" required>
              </div>

              <div class="col-md-6">
                <label class="form-label">Book Image</label>
                <input type="file" name="bookpic" class="form-control" required>
              </div>
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
</body>
</html>
