<?php
session_start();
$conn = new mysqli("localhost", "root", "", "sahel_fleet");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$driver_id = $_SESSION['driver_id'];
$new_email = $_POST['new-email'];
$new_password = $_POST['new-email-password'];
$confirm_password = $_POST['confirm-email-password'];
$profile_picture = $_FILES['profile-picture']['name'];
$remove_picture = isset($_POST['remove-picture']);

if ($new_password !== $confirm_password) {
    die("Passwords do not match");
}

if ($profile_picture) {
    move_uploaded_file($_FILES['profile-picture']['tmp_name'], "uploads/" . $profile_picture);
}

$sql = "UPDATE drivers SET email='$new_email', password='$new_password'";
if ($profile_picture) {
    $sql .= ", picture='$profile_picture'";
} elseif ($remove_picture) {
    $sql .= ", picture=NULL";
}
$sql .= " WHERE driver_id=$driver_id";

if ($conn->query($sql) === TRUE) {
    echo "Profile updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
