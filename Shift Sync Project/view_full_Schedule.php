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
    <title>Full Schedule</title>
    <!-- FullCalendar CSS -->
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@latest/main.min.css' rel='stylesheet' />
    <link rel="stylesheet" href="css/view_full_schedule.css">
</head>
<body>

<header class="header">
    <ul class="menu">
        <li><a href="user_page.php">Home</a></li>
        <li><a href="user_details.php">Enter Shift Details</a></li>
        <li><a href="settings.php">Settings</a></li>
        <li><a href="notifications.php">Notifications</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</header>

<!-- ... rest of your HTML above ... -->

<!-- FullCalendar's container -->
<div class="main-content">
    <div id='calendar'></div>
</div>

<!-- FullCalendar JS -->
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@latest/main.min.js'></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        // Add other options and event sources as needed
    });
    calendar.render();
});
</script>

</body>
</html>
