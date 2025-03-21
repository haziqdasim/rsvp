<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "rsvp_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch and group RSVP data by time slot (sorted in ascending order)
$sql = "SELECT time_slot, GROUP_CONCAT(name SEPARATOR ', ') AS attendees FROM rsvp GROUP BY time_slot ORDER BY STR_TO_DATE(time_slot, '%h:%i %p') ASC"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table class="table table-striped custom-table">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Time Slot</th>
                    <th>Attendees</th>
                </tr>
            </thead>
            <tbody>';
    $count = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $count . "</td>
                <td>" . htmlspecialchars($row["time_slot"]) . "</td>
                <td>" . htmlspecialchars($row["attendees"]) . "</td>
              </tr>";
        $count++;
    }
    echo '</tbody></table>';
} else {
    echo "<p class='text-center'>No RSVPs yet.</p>";
}

$conn->close();
?>
