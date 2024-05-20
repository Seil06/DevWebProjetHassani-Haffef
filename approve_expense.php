<?php
$conn = new mysqli("localhost", "root", "", "sahel_fleet");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$expense_id = $_POST['expenseSubmission'];
$approval_status = $_POST['approvalStatus'];

$sql = "UPDATE expenses SET status='$approval_status' WHERE expense_id=$expense_id";

if ($conn->query($sql) === TRUE) {
    echo "Expense approval status updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
