<?php
include "../../config.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../index.php");
    exit;
}

if (isset($_POST['bookid'], $_POST['issuedays'])) {

    $userid    = $_SESSION['user_id'];
   
    $bookid    = $_POST['bookid'];
    $issuedays = $_POST['issuedays'];

    // get user info
    $user = mysqli_fetch_assoc(
        mysqli_query($conn, "SELECT id,name, type FROM userdata WHERE id=$userid")
    );
    echo print_r($user);

    // get book info
    $book = mysqli_fetch_assoc(
        mysqli_query($conn, "SELECT bookname FROM book WHERE id=$bookid")
    );

    // insert request
    $query = "INSERT INTO requestbook 
        (userid, bookid, username, usertype, bookname, issuedays)
        VALUES
        ('{$user['id']}', '$bookid', '{$user['name']}', '{$user['type']}', '{$book['bookname']}', '$issuedays')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Book request sent successfully'); window.location='../Dashboard_user.php';</script>";
    } else {
        echo "Error while requesting book";
    }
}
?>
