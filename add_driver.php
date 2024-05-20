<?php
$conn = new mysqli("localhost", "root", "", "sahel_fleet");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$first_name = $_POST['driverFName'];
$last_name = $_POST['driverLName'];
$picture = $_FILES['driverPicture']['name'];
$age = $_POST['age'];
$license = $_POST['driverLicense'];
$experience = $_POST['experience'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if ($password !== $confirm_password) {
    die("Passwords do not match");
}

move_uploaded_file($_FILES['driverPicture']['tmp_name'], "uploads/" . $picture);

$sql = "INSERT INTO drivers (first_name, last_name, picture, age, license_type, experience, email, password)
        VALUES ('$first_name', '$last_name', '$picture', $age, '$license', $experience, '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "New driver added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
