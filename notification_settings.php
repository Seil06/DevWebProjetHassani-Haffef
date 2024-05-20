<?php
session_start();
$conn = new mysqli("localhost", "root", "", "sahel_fleet");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$driver_id = $_SESSION['driver_id'];
$push_notifications = isset($_POST['push-notifications']) ? 1 : 0;

$sql = "UPDATE notification_settings SET push_notifications=$push_notifications WHERE driver_id=$driver_id";

if ($conn->query($sql) === TRUE) {
    echo "Notification settings saved successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
