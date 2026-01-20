<?php
use Core\App;
use Core\Database;
$db = App::resolve(Database::class);
$logged_user_type = $_SESSION['user']['UserType'];

try {
  
    $patients = $db->query("SELECT DISTINCT id, firstname, lastname, birthdate, gender, student_id, program, country, email, phone1, phone2, marital_status, blood_group, blood_pressure, sugar_level, temperature, pulse, resp, spo2, address, symptoms, medical_history, treatment, drug_name, dosage, notes FROM patients ORDER BY lastname ASC")->get();

    $studentIDs = $db->query("SELECT DISTINCT idnumber FROM r_student ORDER BY lastname ASC")->get();
 
   
} catch (PDOException $e) {
    die("Error: Sorry an error occurred");
}
?>