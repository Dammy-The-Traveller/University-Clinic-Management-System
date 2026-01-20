<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <!-- Meta -->
    <meta name="description" content=" SCHOOL CLINIC">
    <meta property="og:title" content=" SCHOOL CLINIC">
    <meta property="og:description" content=" SCHOOL CLINIC">
    <meta property="og:type" content="Website">
    <link href="Public/assets/img/favicon_io/favicon-32x32.png" type="image/x-icon" rel="icon">
    <link href="Public/assets/img/favicon_io/favicon-16x16.png" type="image/x-icon" rel="icon">

    <!-- *************
		************ CSS Files *************
	************* -->
    <link rel="stylesheet" href="Public/assets/fonts/remix/remixicon.css">
    <link rel="stylesheet" href="Public/assets/css/main.min.css">

    <!-- *************
		************ Vendor Css Files *************
	************ -->

    <!-- Scrollbar CSS -->
    <link rel="stylesheet" href="Public/assets/vendor/overlay-scroll/OverlayScrollbars.min.css">
    
  
<script>
  let logoutTimer;

function resetLogoutTimer() {
    clearTimeout(logoutTimer);
    logoutTimer = setTimeout(function () {
        alert("You have been logged out due to inactivity.");
        window.location.href = "/Clinic-Management-System/logout";
    }, 21600000); // Reset 6-hour timer
}

// Reset timer on user activity
document.addEventListener("mousemove", resetLogoutTimer());
document.addEventListener("keydown", resetLogoutTimer());
document.addEventListener("click", resetLogoutTimer());

// Start the timer initially
resetLogoutTimer();

</script>
 
  </head>