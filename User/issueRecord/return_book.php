<?php
include "../../config.php";


if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit;
}

if (!isset($_GET['id'])) {
    die("Invalid request");
}

$issue_id = (int) $_GET['id'];

/*
 STEP 1: Get issue record
*/
$issueRes = mysqli_query(
    $conn,
    "SELECT * FROM issuebook WHERE id = $issue_id"
);

$issue = mysqli_fetch_assoc($issueRes);

if (!$issue) {
    die("Issue record not found");
}

$bookname   = $issue['issuebook'];
$returnDate = $issue['issuereturn'];

/*
 STEP 2: Fine calculation
*/
$today = date("d/m/Y");

$today_ts  = strtotime($today);
$return_ts = strtotime($returnDate);



$fine = 0;

// if returned late
if ($today_ts > $return_ts) {
    $days_late = ceil(($today_ts - $return_ts) / (60 * 60 * 24));
    $fine = $days_late * 100; // ₹100 per day
}

/*
 STEP 3: Get book id
*/
$bookRes = mysqli_query(
    $conn,
    "SELECT id FROM book WHERE bookname = '$bookname'"
);

$book = mysqli_fetch_assoc($bookRes);

if (!$book) {
    die("Book not found");
}

$bookid = (int) $book['id'];

/*
 STEP 4: Update availability
*/
mysqli_query(
    $conn,
    "UPDATE book SET bookava = bookava + 1 WHERE id = $bookid"
);

/*
 STEP 5: Delete issue record
*/
mysqli_query(
    $conn,
    "DELETE FROM issuebook WHERE id = $issue_id"
);

if(isset($_SESSION['admin']))
{
    header('Location:../../admin/dashboard_admin.php?page=issue_report');
}
echo "<script>
    alert('Book returned successfully. Fine: ₹$fine');
    window.location='issue_record.php';
</script>";
