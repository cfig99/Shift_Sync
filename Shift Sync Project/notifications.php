<?php
@include 'config.php';
session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <script src="https://kit.fontawesome.com/d9278020ed.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/notifications.css">
</head>
<body>

<header class="header">
    <ul class="menu">
        <li><a href="user_page.php">Home</a></li>
        <li><a href="user_details.php">Enter Shift Details</a></li>
        <li><a href="view_full_schedule.php">View Full Schedule</a></li>
        <li><a href="settings.php">Settings</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</header>

<div class="main-content">
    <div class="notification">
        <div class="notification-content" onclick="viewNotification(this)">
            <p>This is a sample notification. Click to view more.</p>
        </div>
        <div class="notification-actions">
            <i class="far fa-eye-slash" onclick="markAsViewed(this)"></i>
            <i class="fas fa-bookmark" onclick="toggleBookmark(this)"></i>
            <i class="fas fa-trash" onclick="confirmDelete(this)"></i>
        </div>
    </div>
    <!-- More notifications here -->
</div>

<script>
function viewNotification(element) {
    // Logic to expand the notification to view more
    alert('Notification clicked!');
}

function markAsViewed(element) {
    element.classList.toggle('viewed');
}

function toggleBookmark(element) {
    element.classList.toggle('bookmarked');
}

function confirmDelete(element) {
    if (confirm('Are you sure you want to delete this notification?')) {
        element.parentElement.parentElement.remove();
    }
}
</script>

</body>
</html>
