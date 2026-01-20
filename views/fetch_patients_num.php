<?php 
use Core\App;
use Core\Database;
$db = App::resolve(Database::class);
 $logged_user_firstname = $_SESSION['user']['firstname'];
 $logged_user_lastname = $_SESSION['user']['lastname'];
$date = date('Y-m-d');
 $time = date('h:i');
  $hour = date("H");

  if ($hour >= 5 && $hour < 12) {
      $greeting = "Good Morning";
  } elseif ($hour >= 12 && $hour < 17) {
      $greeting = "Good Afternoon";
  } else {
      $greeting = "Good Evening";
  }

  $uniqueStudentCount = $db->query('SELECT COUNT(DISTINCT student_id) as total_unique_students FROM patients')->find();

  $uniqueAppointmentCount = $db->query('SELECT COUNT(DISTINCT student_id) as total_unique_appointment FROM appointment WHERE status = :status', [
    'status' => 'pending'
])->find();

$uniqueAppointmentCountApproved = $db->query('SELECT COUNT(DISTINCT student_id) as total_unique_approved_appointment FROM appointment WHERE status = :status', [
    'status' => 'approved'
])->find();

$uniqueAppointmentCountRejected = $db->query('SELECT COUNT(DISTINCT student_id) as total_unique_rejected_appointment FROM appointment WHERE status = :status', [
    'status' => 'rejected'
])->find();

  $uniqueOldPrescriptionCount = $db->query('SELECT COUNT(student_id) as total_unique_old_prescription FROM old_prescriptions')->find();

  $UrgentAppointmentLists = $db->query("SELECT DISTINCT id, fullname, student_id FROM appointment 
  WHERE date = :date AND status = :status
  ORDER BY fullname ASC", [
  'date' => $date,
    'status' => 'pending'
])->get();

  
 ?>