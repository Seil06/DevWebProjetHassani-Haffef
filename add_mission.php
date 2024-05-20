<?php
$conn = new mysqli("localhost", "root", "", "sahel_fleet");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$day = $_POST['mission-day'];
$car_id = $_POST['car-selected'];
$driver_id = $_POST['driver-mission'];
$client_name = $_POST['client-name'];
$client_phone = $_POST['client-phone'];
$arrival_address = $_POST['arrival-address'];
$description = $_POST['description'];

$sql = "INSERT INTO missions (day, car_id, driver_id, client_name, client_phone, arrival_address, description)
        VALUES ('$day', $car_id, $driver_id, '$client_name', '$client_phone', '$arrival_address', '$description')";

if ($conn->query($sql) === TRUE) {
    echo "New mission added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
