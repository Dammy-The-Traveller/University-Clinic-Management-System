<?php
use Core\App;
use Core\Database;
$db = App::resolve(Database::class);
$logged_user_type = $_SESSION['user']['UserType'];

try {
  
    $appointmentLists = $db->query("SELECT DISTINCT id, fullname, email, student_id, program, gender, age, phone_number, date, time, problem, status FROM appointment ORDER BY fullname ASC")->get();

   
} catch (PDOException $e) {
    die("Error: Sorry an error occurred");
}
?>