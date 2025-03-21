<?php
$servername = "localhost";
$username = "root"; // Change if needed
$password = "";
$database = "rsvp_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $time_slot = $_POST["time_slot"];

    // Prepare statement
    $stmt = $conn->prepare("INSERT INTO rsvp (name, time_slot) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $time_slot);

    if ($stmt->execute()) {
        echo "Success"; // Send success response
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
