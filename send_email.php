<?php
$conn = new mysqli("localhost", "root", "", "sahel_fleet");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$recipient_type = $_POST['recipientType'];
$notification_type = $_POST['notificationType'];
$driver_ids = $_POST['driverId'];
$message = $_POST['emailMessage'];

foreach ($driver_ids as $driver_id) {
    $sql = "INSERT INTO notifications (type, message, driver_id)
            VALUES ('$notification_type', '$message', $driver_id)";
    $conn->query($sql);
}

echo "Email notifications sent successfully";

$conn->close();
?>
