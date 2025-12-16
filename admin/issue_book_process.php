<?php
include "../config.php";

if (isset($_POST['userid'], $_POST['bookid'], $_POST['issuedays'])) {

    $userid     = $_POST['userid'];
    $bookid     = $_POST['bookid'];
    $issuedays  = $_POST['issuedays'];

    // get user info
    $user = mysqli_fetch_assoc(
        mysqli_query($conn, "SELECT name, type FROM userdata WHERE id=$userid")
    );

    // get book info
    $book = mysqli_fetch_assoc(
        mysqli_query($conn, "SELECT bookname, bookava FROM book WHERE id=$bookid")
    );

    if ($book['bookava'] <= 0) {
        echo "<script>alert('Book not available'); window.location='dashboard.php?page=issue_book';</script>";
        exit;
    }

    $issuedate   = date("d/m/Y");
    $returndate  = date("d/m/Y", strtotime("+$issuedays days"));

    // insert issue record
    $insert = "INSERT INTO issuebook
      (userid, issuename, issuebook, issuetype, issuedays, issuedate, issuereturn, fine)
      VALUES
      ('$userid', '{$user['name']}', '{$book['bookname']}', '{$user['type']}', '$issuedays', '$issuedate', '$returndate', 0)";

    if (mysqli_query($conn, $insert)) {

        // update availability
        mysqli_query($conn, "UPDATE book SET bookava = bookava - 1 WHERE id=$bookid");

        echo "<script>alert('Book issued successfully'); window.location='dashboard_admin.php?page=issue_report';</script>";
    } else {
        echo "Error issuing book";
    }
}
?>
