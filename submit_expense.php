<?php
session_start();
$conn = new mysqli("localhost", "root", "", "sahel_fleet");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$driver_id = $_SESSION['driver_id'];
$description = $_POST['expense-description'];
$amount = $_POST['expense-amount'];
$receipt_image = $_FILES['receipt-image']['name'];

if ($receipt_image) {
    move_uploaded_file($_FILES['receipt-image']['tmp_name'], "uploads/" . $receipt_image);
}

$sql = "INSERT INTO expenses (driver_id, description, cost, receipt_image)
        VALUES ($driver_id, '$description', $amount, '$receipt_image')";

if ($conn->query($sql) === TRUE) {
    echo "Expense reported successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
