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
    <title>Settings</title>
    <link rel="stylesheet" href="css/settings.css">
</head>
<body>

<header class="header">
    <ul class="menu">
        <li><a href="user_page.php">Home</a></li>
        <li><a href="user_details.php">Enter Shift Details</a></li>
        <li><a href="view_full_schedule.php">View Full Schedule</a></li>
        <li><a href="notifications.php">Notifications</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</header>

<div class="main-content">
    <h1>Settings</h1>
    <div class="setting-option">
        <label for="desktop-notifications">Desktop push notifications</label>
        <input type="checkbox" id="desktop-notifications" class="toggle-switch">
    </div>
    <div class="setting-option">
        <label for="mobile-notifications">Mobile push notifications</label>
        <input type="checkbox" id="mobile-notifications" class="toggle-switch">
    </div>
    <div class="setting-option">
        <label for="email-notifications">Email notifications</label>
        <input type="checkbox" id="email-notifications" class="toggle-switch">
    </div>
    <div class="setting-option">
        <button id="change-password" class="btn-blue">Change password</button>
    </div>
</div>

<script src="js/settings.js"></script>
<!-- ... rest of your HTML above ... -->

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Event listener for the change password button
    var changePasswordButton = document.getElementById('change-password');
    if (changePasswordButton) {
        changePasswordButton.addEventListener('click', function() {
            // Add logic to handle password change
            // This might involve showing a modal, redirecting to a password change form, etc.
            alert('Change password clicked!');
        });
    }

    // Example of event listener for the desktop notifications toggle
    var desktopNotificationsToggle = document.getElementById('desktop-notifications');
    if (desktopNotificationsToggle) {
        desktopNotificationsToggle.addEventListener('change', function() {
            // Handle the toggle change
            // You can send an AJAX request here to update the settings on the server
            var isEnabled = desktopNotificationsToggle.checked;
            console.log('Desktop notifications:', isEnabled ? 'Enabled' : 'Disabled');
            // Add AJAX call here if necessary
        });
    }

    // Repeat the above for 'mobile-notifications' and 'email-notifications'
});
</script>

</body>
</html>

</body>
</html>
