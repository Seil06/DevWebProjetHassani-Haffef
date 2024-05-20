<?php
session_start();
$conn = new mysqli("localhost", "root", "", "sahel_fleet");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$driver_id = $_SESSION['driver_id'];
$contact_name = $_POST['contact-name'];
$contact_phone = $_POST['contact-phone'];

$sql = "INSERT INTO emergencies (driver_id, contact_name, contact_phone)
        VALUES ($driver_id, '$contact_name', '$contact_phone')";

if ($conn->query($sql) === TRUE) {
    echo "Emergency contact reported successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
