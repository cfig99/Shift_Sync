<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_id.php');
   exit(); // Make sure no further code is run after a redirect is issued
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming 'user_id' is stored in session when the user logs in
    $userId = $_SESSION['user_name']; // Replace with actual session variable if different
    $shiftDate = $_POST['select-day'];
    $available = isset($_POST['available']) ? 1 : 0;
    $startTime = $_POST['start-time'];
    $endTime = $_POST['end-time'];
    $notes = $_POST['notes'];

    // Prepare an insert statement
    $query = "INSERT INTO shift_details (user_id, shift_date, available, start_time, end_time, notes) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("isssss", $userId, $shiftDate, $available, $startTime, $endTime, $notes);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect or notify of success
        // You can redirect to another page or show a success message
        echo "<script>alert('Details saved successfully');</script>";
    } else {
        // Handle error
        echo "ERROR: Could not execute query: $sql. " . $conn->error;
    }

    // Close statement
    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... -->
    <link rel="stylesheet" href="css/user_details.css">
</head>
<body>

<header class="header">
    <ul class="menu">
        <li><a href="user_page.php">Home</a></li>
        <li><a href="view_full_schedule.php">View Full Schedule</a></li>
        <li><a href="settings.php">Settings</a></li>
        <li><a href="notifications.php">Notifications</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</header>

<div class="main-content">
    <h1 class="shift-sync-title">Shift Sync</h1>
    <p class="tagline">Your Personal Shift Details</p>
    <form class="availability-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="select-day">Select Day</label>
            <input type="date" id="select-day" name="select-day">
            
            <label>
                <input type="checkbox" id="available-to-work" name="available">
                Available to work
            </label>
            
            <label>
                <input type="checkbox" id="unavailable-to-work" name="unavailable">
                Unavailable to work
            </label>
            
            <label>
                <input type="checkbox" id="all-day" name="all-day">
                All Day
            </label>

            <label for="start-time">Start Time</label>
            <input type="time" id="start-time" name="start-time">

            <label for="end-time">End Time</label>
            <input type="time" id="end-time" name="end-time">
            
            <label>
                <input type="checkbox" id="repeats" name="repeats">
                Repeats
            </label>
            
            <label for="repeat-frequency">Every</label>
            <select id="repeat-frequency" name="repeat-frequency">
                <option value="week">Week</option>
                <option value="month">Month</option>
            </select>
            
            <label for="notes">Notes</label>
            <textarea id="notes" name="notes"></textarea>
            
            <button type="submit" class="save-button">Save Preferences</button>
        </form>
    </div>
</div>

<!-- ... -->

</body>
</html>
