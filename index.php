<?php
// Assuming you have a MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentname = $_POST["studentname"];
    $email = $_POST["email"];
    $year = $_POST["year"];
    $eventName = $_POST["EventName"];

    // Prepare and execute an SQL statement to insert the data into a table
    $stmt = $conn->prepare("INSERT INTO registration (studentname, email, year, eventName) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $studentname, $email, $year, $eventName);
    $stmt->execute();

    // Check if the data was inserted successfully
    if ($stmt->affected_rows > 0) {
        echo "Registration successful!";
    } else {
        echo "Error occurred during registration.";
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>
