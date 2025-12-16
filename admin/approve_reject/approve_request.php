<?php
include "../../config.php";

// admin login check (optional but recommended)
if (!isset($_SESSION['admin'])) {
    header("Location: ../../index.php");
    exit;
}

if (!isset($_GET['id'])) {
    die("Invalid request");
}

$request_id = (int) $_GET['id'];

/* 
  STEP 1: Fetch request details
*/
$requestRes = mysqli_query(
    $conn,
    "SELECT * FROM requestbook WHERE id = $request_id"
);

$request = mysqli_fetch_assoc($requestRes);

if (!$request) {
    die("Request not found");
}

$userid     = (int) $request['userid'];
$bookname   = $request['bookname'];
$issuedays  = (int) $request['issuedays'];
$username   = $request['username'];
$usertype   = $request['usertype'];

/*
  STEP 2: Get book info
*/
$bookRes = mysqli_query(
    $conn,
    "SELECT id, bookava FROM book WHERE bookname = '$bookname'"
);

$book = mysqli_fetch_assoc($bookRes);

if (!$book || $book['bookava'] <= 0) {
    die("Book not available");
}

$bookid = (int) $book['id'];

/*
  STEP 3: Calculate dates
*/
$issuedate  = date("d/m/Y");
$returndate = date("d/m/Y", strtotime("+$issuedays days"));

/*
  STEP 4: Insert into issuebook
*/
$insertIssue = "
INSERT INTO issuebook
(userid, issuename, issuebook, issuetype, issuedays, issuedate, issuereturn, fine)
VALUES
($userid, '$username', '$bookname', '$usertype', $issuedays, '$issuedate', '$returndate', 0)
";

if (!mysqli_query($conn, $insertIssue)) {
    die("Issue insert failed");
}

/*
  STEP 5: Update book availability
*/
mysqli_query(
    $conn,
    "UPDATE book SET bookava = bookava - 1 WHERE id = $bookid"
);

/*
  STEP 6: Delete request
*/
mysqli_query(
    $conn,
    "DELETE FROM requestbook WHERE id = $request_id"
);

echo "<script>
    alert('Book approved and issued successfully');
    window.location='../../admin/dashboard_admin.php?page=book_request';
</script>";
