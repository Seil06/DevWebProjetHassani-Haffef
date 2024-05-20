<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SF Admin Interface</title>
    <link rel="icon" type="image/png" href="SF-Logo2.png">
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
            background: #111;
            color: #fff;
            width: 100%;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .header {
            text-align: center;
            padding: 20px;
            background: #222;
            border-bottom: 1px solid #444;
        }

        .header img {
            max-width: 100%;
            height: 100px;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .header h1 {
            font-weight: bold;
            margin-bottom: 10px;
        }

        main {
            flex: 1;
            padding: 20px;
        }

        .admin-section, .footer-section {
            padding: 20px;
            background: #333;
            margin: 20px 0;
            border-radius: 8px;
        }

        .admin-section h2, .footer-section h2 {
            margin-bottom: 20px;
            border-bottom: 2px solid #007bff;
            padding-bottom: 5px;
        }

        .admin-section ul {
            list-style: none;
            padding-left: 20px;
        }

        .admin-section li {
            margin-bottom: 10px;
        }

        .admin-section a {
            color: #007bff;
            text-decoration: none;
        }

        .admin-section a:hover {
            text-decoration: underline;
        }

        .section-title {
            margin-bottom: 20px;
            font-size: 1.5em;
            color: #007bff;
            text-decoration: underline;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #444;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background: #007bff;
            color: #fff;
        }

        td {
            background: #222;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        form fieldset {
            border: 1px solid #444;
            padding: 20px;
            margin-bottom: 20px;
        }

        form label, form input, form select, form textarea {
            margin-bottom: 10px;
            font-size: 1em;
        }

        form input, form select, form textarea {
            padding: 10px;
            border: 1px solid #444;
            border-radius: 5px;
            background: #222;
            color: #fff;
        }

        form input[type="submit"], form input[type="reset"] {
            background: #007bff;
            border: none;
            cursor: pointer;
            color: #fff;
            padding: 10px 20px;
            margin-right: 10px;
            transition: background 0.3s;
        }

        form input[type="submit"]:hover, form input[type="reset"]:hover {
            background: #0056b3;
        }

        .notification-list table {
            border: 1px solid #444;
        }

        footer {
            text-align: center;
            padding: 20px;
            background: #222;
            border-top: 1px solid #444;
        }

        footer p {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<header class="header">
    <img src="SF-Logo2.png" alt="SF Logo" class="logo">
    <h1>Sahel Fleet Admin Interface</h1>
</header>

<main>
    <section class="admin-section">
        <h2>Overview of Admin Functionalities</h2>
        <ul>
            <li><a href="#Driver-Account">Driver Account Management</a>
                <ul>
                    <li>Create</li>
                    <li>View</li>
                    <li>Edit and Delete Driver Profiles</li>
                </ul>
            </li>
            <li><a href="#vehicle-management">Vehicle Management</a>
                <ul>
                    <li>Vehicle Assignment</li>
                    <li>Add Update Delete Vehicles</li>
                </ul>
            </li>
            <li><a href="#expenses-management">Expenses Management</a>
                <ul>
                    <li>View Expenses</li>
                    <li>Approve Expense Submissions</li>
                </ul>
            </li>
            <li><a href="#mission-management">Mission Management</a>
                <ul>
                    <li>Assign Missions</li>
                    <li>Keep Mission History</li>
                </ul>
            </li>
            <li><a href="#notifications">Notifications</a>
                <ul>
                    <li>Notifications Settings</li>
                </ul>
            </li>
        </ul>
    </section>

    <section id="Driver-Account" class="footer-section">
        <h2>Driver Account Management</h2>
        <form action="add_driver.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Driver Personal Information:</legend>
                <label for="driverFName">Driver First Name:</label>
                <input type="text" id="driverFName" name="driverFName" placeholder="First name" required>
                <label for="driverLName">Driver Last Name:</label>
                <input type="text" id="driverLName" name="driverLName" placeholder="Last name" required>
                <label for="driverPicture">Driver Picture:</label>
                <input type="file" id="driverPicture" name="driverPicture" accept="image/*">
                <label>Age:</label>
                <input type="number" name="age" min="18" max="65" placeholder="Age" required>
                <label for="driverLicense">Driver License:</label>
                <select name="driverLicense" required>
                    <option value="00">Driving license type</option>
                    <option value="A1">A1</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="B(E)">B(E)</option>
                    <option value="C1">C1</option>
                    <option value="C1(E)">C1(E)</option>
                    <option value="C">C</option>
                    <option value="C(E)">C(E)</option>
                    <option value="D">D</option>
                    <option value="D(E)">D(E)</option>
                    <option value="F">F</option>
                </select>
                <label for="experience">Driver Experience:</label>
                <input type="number" id="experience" name="experience" min="0" required>
                <label>Driver Email:</label>
                <input type="email" name="email" placeholder="@mail" required>
                <label>Password:</label>
                <input type="password" name="password" placeholder="Password" required>
                <label>Confirm Password:</label>
                <input type="password" name="confirm_password" placeholder="Confirm" required>
                <input type="reset" value="Cancel">
                <input type="submit" value="Send data" name="sbt">
            </fieldset>
        </form>
    </section>

    <section id="vehicle-management" class="footer-section">
        <h2>Vehicle Management</h2>
        <table>
            <caption>View Vehicles</caption>
            <tr>
                <th>Registration Number</th>
                <th>Brand</th>
                <th>Vehicle Condition</th>
            </tr>
            <?php
                // Fetch vehicle data from the database and populate the table
                $conn = new mysqli("localhost", "root", "", "sahel_fleet");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT registration_number, brand, condition FROM vehicles";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['registration_number']}</td>
                                <td>{$row['brand']}</td>
                                <td>{$row['condition']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No vehicles found</td></tr>";
                }
                $conn->close();
            ?>
        </table>
        <div class="vehicle-form">
            <h3>Add | Update | Delete Vehicles</h3>
            <form id="vehicleForm" action="manage_vehicle.php" method="post">
                <fieldset>
                    <legend>Vehicle Details:</legend>
                    <label for="registrationNumber">Registration Number:</label>
                    <input type="text" id="registrationNumber" name="registrationNumber" required>
                    <label for="brand">Brand:</label>
                    <input type="text" id="brand" name="brand" required>
                    <input type="hidden" id="condition" name="condition" value="Ready to be assigned">
                    <input type="submit" value="Add Vehicle" name="action">
                    <input type="submit" value="Update Vehicle" name="action">
                    <input type="submit" value="Delete Vehicle" name="action">
                </fieldset>
            </form>
        </div>
    </section>

    <section id="expenses-management" class="footer-section">
        <h2>Expenses Management</h2>
        <div class="expense-view">
            <h3>View Expenses:</h3>
            <table>
                <caption>Expenses Overview</caption>
                <tr>
                    <th>Expense</th>
                    <th>Type</th>
                    <th>Cost</th>
                </tr>
                <?php
                    // Fetch expense data from the database and populate the table
                    $conn = new mysqli("localhost", "root", "", "sahel_fleet");
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = "SELECT type, cost FROM expenses";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['type']}</td>
                                    <td>{$row['cost']}</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='2'>No expenses found</td></tr>";
                    }
                    $conn->close();
                ?>
            </table>
        </div>
        <div class="expense-approval">
            <h3>Approve Expense Submissions:</h3>
            <form action="approve_expense.php" method="post">
                <fieldset>
                    <legend>Select Expense Submission:</legend>
                    <select id="expenseSubmission" name="expenseSubmission">
                        <?php
                            // Fetch expense submissions from the database
                            $conn = new mysqli("localhost", "root", "", "sahel_fleet");
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
                            $sql = "SELECT expense_id, type FROM expenses";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<option value='{$row['expense_id']}'>{$row['type']}</option>";
                                }
                            }
                            $conn->close();
                        ?>
                    </select>
                    <label for="approvalStatus">Approval Status:</label>
                    <select id="approvalStatus" name="approvalStatus">
                        <option value="approved">Approved</option>
                        <option value="rejected">Rejected</option>
                    </select>
                    <input type="submit" value="Submit Approval">
                </fieldset>
            </form>
        </div>
    </section>

    <section id="mission-management" class="footer-section">
        <h2>Mission Management</h2>
        <form action="add_mission.php" method="post">
            <fieldset>
                <legend>Add Mission:</legend>
                <label>Day of the Mission:</label>
                <input type="date" name="day-of-the-mission">
                <label>Car Selected:</label>
                <select name="car-selected">
                    <?php
                        // Fetch car data from the database
                        $conn = new mysqli("localhost", "root", "", "sahel_fleet");
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT vehicle_id, registration_number FROM vehicles";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<option value='{$row['vehicle_id']}'>{$row['registration_number']}</option>";
                            }
                        }
                        $conn->close();
                    ?>
                </select>
                <label>Driver Full Name:</label>
                <select name="driver-mission">
                    <?php
                        // Fetch driver data from the database
                        $conn = new mysqli("localhost", "root", "", "sahel_fleet");
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $sql = "SELECT driver_id, CONCAT(first_name, ' ', last_name) AS full_name FROM drivers";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<option value='{$row['driver_id']}'>{$row['full_name']}</option>";
                            }
                        }
                        $conn->close();
                    ?>
                </select>
                <label>Client Name:</label>
                <input type="text" name="client" placeholder="Client Name">
                <label>Client Phone Number:</label>
                <input type="number" name="clientnbr" placeholder="Client Phone Number">
                <label>Arrival Address:</label>
                <textarea name="adresse"></textarea>
                <label>Description of the Mission:</label>
                <textarea name="description" placeholder="Description of the Mission"></textarea>
                <input type="reset" value="Cancel">
                <input type="submit" value="Send Data" name="sbt">
            </fieldset>
        </form>
    </section>

    <section id="notifications" class="footer-section">
        <h2>Notifications Management</h2>
        <div class="notification-settings">
            <h3>Notification Settings:</h3>
            <form action="notification_settings.php" method="post">
                <fieldset>
                    <label for="push-notifications">Push Notifications:</label>
                    <input type="checkbox" id="push-notifications" name="push-notifications" checked>
                    <input type="submit" value="Save Settings">
                </fieldset>
            </form>
        </div>
        <div class="email-notification-form">
            <h3>Send Email Notification:</h3>
            <form id="emailForm" action="send_email.php" method="post">
                <fieldset>
                    <label for="recipientType">Recipient Type:</label>
                    <select id="recipientType" name="recipientType">
                        <option value="driver">Driver</option>
                    </select>
                    <label for="notificationType">Notification Type:</label>
                    <select id="notificationType" name="notificationType">
                        <option value="newAssignment">New Assignment Notification</option>
                        <option value="alert">Alert</option>
                    </select>
                    <label for="driverId">Select the ID(s) of Driver(s):</label>
                    <select id="driverId" name="driverId" multiple>
                        <?php
                            // Fetch driver data from the database
                            $conn = new mysqli("localhost", "root", "", "sahel_fleet");
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
                            $sql = "SELECT driver_id, CONCAT(first_name, ' ', last_name) AS full_name FROM drivers";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<option value='{$row['driver_id']}'>{$row['full_name']}</option>";
                                }
                            }
                            $conn->close();
                        ?>
                    </select>
                    <label for="emailMessage">Message:</label>
                    <textarea id="emailMessage" name="emailMessage" rows="4" placeholder="Type your message here..."></textarea>
                    <input type="submit" value="Send Email">
                </fieldset>
            </form>
        </div>
        <div class="notification-list">
            <h3>Recent Notifications:</h3>
            <table>
                <tr>
                    <th>Mission Assignment</th>
                    <th>Document Submission Reminder</th>
                    <th>Vehicle Service Alert</th>
                </tr>
                <?php
                    // Fetch notification data from the database
                    $conn = new mysqli("localhost", "root", "", "sahel_fleet");
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = "SELECT type, message FROM notifications";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['type']}</td>
                                    <td>{$row['message']}</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='2'>No notifications found</td></tr>";
                    }
                    $conn->close();
                ?>
            </table>
        </div>
    </section>
</main>

<footer>
    <p>&copy; 2024 Sahel Fleet. All rights reserved.</p>
</footer>

</body>
</html>
