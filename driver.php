<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SF Driver Interface</title>
    <link rel="icon" type="image/png" href="SF-Logo1.png">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        /* Your CSS styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Quicksand", sans-serif;
        }

        body {
            background: #f5f5f5;
            color: #333;
            width: 100%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .header {
            text-align: center;
            padding: 20px;
            background: #4CAF50;
            color: white;
            border-bottom: 1px solid #ddd;
        }

        .header img {
            max-width: 100%;
            height: 150px;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .header h1 {
            font-weight: bold;
        }

        main {
            flex: 1;
            padding: 20px;
        }

        .driver-section, .mission-details, .notifications, .expenses-emergencies {
            background: white;
            margin: 20px 0;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .driver-section h2, .mission-details h2, .notifications h2, .expenses-emergencies h2 {
            margin-bottom: 20px;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 5px;
            color: #4CAF50;
        }

        .driver-section ul {
            list-style: none;
            padding-left: 20px;
        }

        .driver-section li {
            margin-bottom: 10px;
        }

        .driver-section a {
            color: #4CAF50;
            text-decoration: none;
        }

        .driver-section a:hover {
            text-decoration: underline;
        }

        .profile-form {
            display: flex;
            flex-direction: column;
            margin-top: 20px;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            background: #f9f9f9;
        }

        .profile-form input[type="text"],
        .profile-form input[type="password"],
        .profile-form input[type="number"],
        .profile-form input[type="file"],
        .profile-form input[type="tel"],
        .profile-form textarea,
        .profile-form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: white;
            color: #333;
            font-size: 16px;
        }

        .profile-form input[type="submit"] {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            font-size: 16px;
        }

        .profile-form input[type="submit"]:hover {
            background-color: #45a049;
        }

        .mission-details table, .notifications table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .mission-details th, .notifications th, .mission-details td, .notifications td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .mission-details th, .notifications th {
            background-color: #4CAF50;
            color: white;
        }

        .mission-details tr:nth-child(even), .notifications tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .mission-details tr:hover, .notifications tr:hover {
            background-color: #ddd;
        }

        footer {
            text-align: center;
            padding: 20px;
            background: #4CAF50;
            color: white;
            border-top: 1px solid #ddd;
        }
    </style>
</head>
<body>

<header class="header">
    <img src="SFWhiteTheme.png" alt="SF Logo" class="logo">
    <h1>Sahel Fleet Driver Interface</h1>
</header>

<main>
    <section class="driver-section">
        <h2>Driver Functionalities</h2>
        <ul>
            <li><a href="#personal-dashboard">Personal Dashboard</a>
                <ul>
                    <li>• View/Update Profile</li>
                    <li>• Access Assigned Missions</li>
                </ul>
            </li>
            <li><a href="#mission-details">Missions</a>
                <ul>
                    <li>• List of Assigned Missions Information</li>
                    <li>• Missions Information</li>
                </ul>
            </li>
            <li><a href="#notifications">Notifications</a>
                <ul>
                    <li>• Receive Mission Assignments and Updates</li>
                    <li>• Submit Expenses</li>
                </ul>
            </li>
            <li><a href="#expenses-emergencies">Reports of Expenses and Emergencies</a>
                <ul>
                    <li>• Submit Expenses</li>
                    <li>• Report Emergencies</li>
                </ul>
            </li>
        </ul>
    </section>

    <!-- Personal Dashboard Section -->
    <section id="personal-dashboard" class="driver-section">
        <h2>Personal Dashboard</h2>
        <div class="profile-form">
            <fieldset>
                <legend>View Profile</legend>
                <?php
                    session_start();
                    $driver_id = $_SESSION['driver_id']; // Replace with actual session variable

                    $conn = new mysqli("localhost", "root", "", "sahel_fleet");
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = "SELECT first_name, last_name, email FROM drivers WHERE driver_id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $driver_id);
                    $stmt->execute();
                    $stmt->bind_result($first_name, $last_name, $email);
                    $stmt->fetch();
                    $stmt->close();
                    $conn->close();
                ?>
                <label for="full-name">Full Name:</label>
                <input type="text" id="full-name" name="full-name" value="<?php echo $first_name . ' ' . $last_name; ?>" readonly>
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" value="<?php echo $email; ?>" readonly>
                <label for="id">ID:</label>
                <input type="text" id="id" name="id" value="<?php echo $driver_id; ?>" readonly>
            </fieldset>
        </div>
        <div class="profile-form">
            <fieldset>
                <legend>Edit Profile</legend>
                <form action="update_profile.php" method="post" enctype="multipart/form-data">
                    <label for="new-email">New Email:</label>
                    <input type="text" id="new-email" name="new-email" required>
                    <label for="new-email-password">New Email Password:</label>
                    <input type="password" id="new-email-password" name="new-email-password" required>
                    <label for="confirm-email-password">Confirm New Email Password:</label>
                    <input type="password" id="confirm-email-password" name="confirm-email-password" required>
                    <label for="profile-picture">Profile Picture:</label>
                    <input type="file" id="profile-picture" name="profile-picture">
                    <label for="remove-picture">Remove Profile Picture:</label>
                    <input type="checkbox" id="remove-picture" name="remove-picture">
                    <input type="submit" value="Update Profile">
                </form>
            </fieldset>
        </div>
    </section>

    <!-- Mission Details Section -->
    <section id="mission-details" class="mission-details">
        <h2>Mission Details</h2>
        <table>
            <thead>
                <tr>
                    <th>Day</th>
                    <th>Car</th>
                    <th>Client Name</th>
                    <th>Client Phone Number</th>
                    <th>Arrival Address</th>
                    <th>Description of the Address</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $conn = new mysqli("localhost", "root", "", "sahel_fleet");
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = "SELECT day, (SELECT registration_number FROM vehicles WHERE vehicle_id = missions.car_id) AS car, client_name, client_phone, arrival_address, description FROM missions WHERE driver_id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $driver_id);
                    $stmt->execute();
                    $stmt->bind_result($day, $car, $client_name, $client_phone, $arrival_address, $description);
                    while ($stmt->fetch()) {
                        echo "<tr>
                                <td>{$day}</td>
                                <td>{$car}</td>
                                <td>{$client_name}</td>
                                <td>{$client_phone}</td>
                                <td>{$arrival_address}</td>
                                <td>{$description}</td>
                              </tr>";
                    }
                    $stmt->close();
                    $conn->close();
                ?>
            </tbody>
        </table>
    </section>

    <!-- Notifications Section -->
    <section id="notifications" class="notifications">
        <h2>Notifications</h2>
        <table>
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $conn = new mysqli("localhost", "root", "", "sahel_fleet");
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = "SELECT type, message FROM notifications WHERE driver_id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $driver_id);
                    $stmt->execute();
                    $stmt->bind_result($type, $message);
                    while ($stmt->fetch()) {
                        echo "<tr>
                                <td>{$type}</td>
                                <td>{$message}</td>
                              </tr>";
                    }
                    $stmt->close();
                    $conn->close();
                ?>
            </tbody>
        </table>
    </section>

    <!-- Expenses and Emergencies Section -->
    <section id="expenses-emergencies" class="expenses-emergencies">
        <h2>Expenses and Emergencies</h2>
        <div class="profile-form">
            <fieldset>
                <legend>Report Expenses</legend>
                <form action="submit_expense.php" method="post" enctype="multipart/form-data">
                    <label for="expense-description">Description:</label>
                    <textarea id="expense-description" name="expense-description" rows="4" required></textarea>
                    <label for="expense-amount">Amount:</label>
                    <input type="number" id="expense-amount" name="expense-amount" required>
                    <label for="receipt-image">Receipt Image:</label>
                    <input type="file" id="receipt-image" name="receipt-image"><br><br>
                    <input type="submit" value="Submit Expense Report">
                </form>
            </fieldset>
        </div>
        <div class="profile-form">
            <fieldset>
                <legend>Emergency Contact</legend>
                <form action="submit_emergency.php" method="post">
                    <label for="contact-name">Name:</label>
                    <input type="text" id="contact-name" name="contact-name" required>
                    <label for="contact-phone">Phone Number:</label>
                    <input type="tel" id="contact-phone" name="contact-phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required><br><br>
                    <input type="submit" value="Submit Emergency Contact">
                </form>
            </fieldset>
        </div>
    </section>
</main>

<footer>
    <p>&copy; 2024 Sahel Fleet. All rights reserved.</p>
</footer>

</body>
</html>
