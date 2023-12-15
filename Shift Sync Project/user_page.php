<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/user_page_style.css">
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@latest/main.min.css' rel='stylesheet' />
</head>
<body>

<div class="dashboard-container">

    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="sidebar-nav">
            <li><a href="user_details.php">Enter Shift Details</a></li>
            <li><a href="view_full_schedule.php">View Full Schedule</a></li>
            <li><a href="settings.php">Settings</a></li>
            <li><a href="notifications.php">Notifications</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header text-center">
            <h2>Week at a Glance</h2>
        </div>
        <section class="schedule">
            <!-- Placeholder for schedule content -->
            <div id='calendar'></div>
        </section>
    </div>

</div>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@latest/main.min.js'></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek', // Set the initial view to week view
        // Other FullCalendar options...
    });
    calendar.render();
});
</script>

</body>
</html>
