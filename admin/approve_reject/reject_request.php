<?php
include "../../config.php";

// admin login check
if (!isset($_SESSION['admin'])) {
    header("Location: ../../index.php");
    exit;
}

if (!isset($_GET['id'])) {
    die("Invalid request");
}

$request_id = (int) $_GET['id'];

// delete request only
mysqli_query(
    $conn,
    "DELETE FROM requestbook WHERE id = $request_id"
);

echo "<script>
    alert('Book request rejected');
    window.location='../../admin/dashboard_admin.php?page=book_request';
</script>";
