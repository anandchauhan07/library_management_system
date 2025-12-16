<?php
include "../config.php";

if (isset($_POST['name'], $_POST['email'], $_POST['pass'], $_POST['type'])) {

    $name  = $_POST['name'];
    $email = $_POST['email'];
    $pass  = $_POST['pass'];
    $type  = $_POST['type'];

    // check duplicate email
    $check = "SELECT * FROM userdata WHERE email='$email'";
    $result = mysqli_query($conn, $check);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Email already exists'); window.location='dashboard.php?page=add_person';</script>";
        exit;
    }

    // insert user
    $query = "INSERT INTO userdata (name, email, pass, type)
              VALUES ('$name', '$email', '$pass', '$type')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Person added successfully'); window.location='dashboard_admin.php?page=add_person';</script>";
    } else {
        echo "Error while adding person";
    }
}
?>
