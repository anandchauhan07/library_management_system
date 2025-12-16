<h4 class="mb-3">Add Person</h4>

<div class="card shadow">
  <div class="card-body">

    <form action="add_person_process.php" method="POST">

      <div class="row mb-3">
        <div class="col-md-6">
          <label class="form-label">Full Name</label>
          <input type="text" name="name" class="form-control" required>
        </div>

        <div class="col-md-6">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control" required>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label class="form-label">Password</label>
          <input type="password" name="pass" class="form-control" required>
        </div>

        <div class="col-md-6">
          <label class="form-label">Person Type</label>
          <select name="type" class="form-select" required>
            <option value="">Select Type</option>
            <option value="student">Student</option>
            <option value="teacher">Teacher</option>
          </select>
        </div>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-success">
          Add Person
        </button>
      </div>

    </form>

  </div>
</div>
