<?php
session_start();
$conn = new mysqli("localhost", "root", "", "sahel_fleet");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM drivers WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['driver_id'] = $row['driver_id'];
    header("Location: driver.php");
} else {
    $sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $_SESSION['admin'] = true;
        header("Location: admin.php");
    } else {
        echo "Invalid email or password";
    }
}
$conn->close();
?>
