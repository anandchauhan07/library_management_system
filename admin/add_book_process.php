<?php
include "../config.php";

if (isset($_POST)) {

    // Get form data
     $bookname     = mysqli_real_escape_string($conn, $_POST['bookname']);
    $bookdetail   = mysqli_real_escape_string($conn, $_POST['bookdetail']);
    $bookauthor   = mysqli_real_escape_string($conn, $_POST['bookauthor']);
    $bookpub      = mysqli_real_escape_string($conn, $_POST['bookpub']);
    $branch       = mysqli_real_escape_string($conn, $_POST['branch']);

    // Numeric values
    $bookprice    = (int) $_POST['bookprice'];
    $bookquantity = (int) $_POST['bookquantity'];
    $bookava      = $bookquantity;
    $bookrent     = (int) $_POST['bookrent'];

    // Image upload
    $bookpic      = $_FILES['bookpic']['name'];
    $tmp_name     = $_FILES['bookpic']['tmp_name'];

    $upload_path = "uploads/" . $bookpic;

    // Create uploads folder if not exists
    if (!is_dir("uploads")) {
        mkdir("uploads");
    }

    if (move_uploaded_file($tmp_name, $upload_path)) {

        // Insert query
        $query = "INSERT INTO book 
        (bookpic, bookname, bookdetail, bookaudor, bookpub, branch, bookprice, bookquantity, bookava, bookrent)
        VALUES 
        ('$bookpic', '$bookname', '$bookdetail', '$bookauthor', '$bookpub', '$branch', '$bookprice', '$bookquantity', '$bookava', '$bookrent')";

        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Book added successfully'); window.location='dashboard_admin.php?page=book_report';</script>";
        } else {
            echo "Database Error";
        }

    } else {
        echo "Image upload failed";
    }
}
?>
