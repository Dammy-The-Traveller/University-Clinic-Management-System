<?php
use Core\App;
use Core\Database;
$db = App::resolve(Database::class);
$logged_user_type = $_SESSION['user']['UserType'];

try {
  
    $newPrescriptions = $db->query("SELECT DISTINCT id, firstname, lastname, student_id, email, treatment, drug_name, dosage, notes FROM patients ORDER BY lastname ASC")->get();

    $oldPrescriptions = $db->query("SELECT DISTINCT id, firstname, lastname, student_id, email, treatment, drug_name, dosage, notes FROM old_prescriptions ORDER BY lastname ASC")->get();
 
    $Patients = $db->query("SELECT DISTINCT student_id FROM patients")->get();
   
} catch (PDOException $e) {
    die("Error: Sorry an error occurred" );
}
?>