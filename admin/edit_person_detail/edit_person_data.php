<?php
include '../../config.php';
if(!isset($_GET['id'] ) || !isset($_SESSION['admin']))
{
     header("Location:../../index.php");
    exit;
}

$personid=$_GET['id'];
$result=mysqli_query($conn,"select * from userdata where id=$personid");
$data=mysqli_fetch_assoc($result);
print_r($data);
?>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<h4 class="mb-3">Add Person</h4>

<div class="card shadow">
  <div class="card-body">

    <form action="update_person_process.php?id=<?= $data['id'];?>" method="POST">

      <div class="row mb-3">
        <div class="col-md-6">
          <label class="form-label">Full Name</label>
          <input type="text" name="name" value="<?= $data['name'];?>" class="form-control" required>
        </div>

        <div class="col-md-6">
          <label class="form-label">Email</label>
          <input type="email" name="email" value="<?= $data['email'];?>" class="form-control" required>
        </div>
      </div>

      <div class="row mb-3">
      

        <div class="col-md-6">
          <label class="form-label">Person Type</label>
          <select name="type" class="form-select" required>
           <?php $person_type=['Student','Teacher'];
            foreach($person_type as $pt)
            {
                $selected=($pt==$data['type'])?'selected':'';
                echo "<option value='$pt' $selected>".$pt."</option>";
            }
            ?>
          </select>
        </div>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-success">
          Update Person
        </button>
      </div>

    </form>

  </div>
</div>
