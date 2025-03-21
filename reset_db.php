<?php
$conn = new mysqli("localhost", "root", "", "rsvp_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete all records from the RSVP table
$sql = "DELETE FROM rsvp";

if ($conn->query($sql) === TRUE) {
    echo "Success";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
