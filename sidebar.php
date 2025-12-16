<?php

define('BASE_URL','/LIBRARY_MANAGEMENT/');
?>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<div id="sidebar" class="sidebar">
  <style>
    body {
      overflow-x: hidden;
    }
    .sidebar {
      width: 240px;
      min-height: 100vh;
      background-color: #198754;
      transition: all 0.3s;
    }
    .sidebar.collapsed {
      margin-left: -240px;
    }
    .sidebar a {
      background: #1fa84a;
      color: #fff;
      margin-bottom: 8px;
      text-align: center;
      font-weight: 500;
    }
    .sidebar a:hover {
      background: #157347;
      color: #fff;
    }
    
   
  </style>


<div class="d-flex">

  <!-- Sidebar -->
  <div id="sidebar" class="sidebar p-3">

<a href="<?= BASE_URL ?>admin/dashboard_admin.php?page=add_book" class="btn menu-btn">ADD BOOK</a>
<a href="<?= BASE_URL ?>admin/dashboard_admin.php?page=book_report" class="btn menu-btn">BOOK REPORT</a>
<a href="<?= BASE_URL ?>admin/dashboard_admin.php?page=book_request" class="btn menu-btn">BOOK REQUESTS</a>
<a href="<?= BASE_URL ?>admin/dashboard_admin.php?page=add_person" class="btn menu-btn">ADD STUDENT</a>
<a href="<?= BASE_URL ?>admin/dashboard_admin.php?page=person_report" class="btn menu-btn">STUDENT REPORT</a>
<a href="<?= BASE_URL ?>admin/dashboard_admin.php?page=issue_book" class="btn menu-btn">ISSUE BOOK</a>
<a href="<?= BASE_URL ?>admin/dashboard_admin.php?page=issue_report" class="btn menu-btn">ISSUE REPORT</a>
<a href="<?= BASE_URL ?>logout.php" class="btn menu-btn">LOGOUT</a>

  </div>

  
</div>
<script>
  document.getElementById("toggleBtn").addEventListener("click", function () {
    document.getElementById("sidebar").classList.toggle("collapsed");
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</div>
