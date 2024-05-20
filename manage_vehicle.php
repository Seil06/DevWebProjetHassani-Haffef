<?php
$conn = new mysqli("localhost", "root", "", "sahel_fleet");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$registration_number = $_POST['registrationNumber'];
$brand = $_POST['brand'];
$condition = $_POST['condition'];
$action = $_POST['action'];

if ($action == "Add Vehicle") {
    $sql = "INSERT INTO vehicles (registration_number, brand, condition)
            VALUES ('$registration_number', '$brand', '$condition')";
} elseif ($action == "Update Vehicle") {
    $sql = "UPDATE vehicles SET brand='$brand', condition='$condition' WHERE registration_number='$registration_number'";
} elseif ($action == "Delete Vehicle") {
    $sql = "DELETE FROM vehicles WHERE registration_number='$registration_number'";
}

if ($conn->query($sql) === TRUE) {
    echo "$action successful";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
