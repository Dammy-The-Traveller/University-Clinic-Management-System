<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);
$logged_user_type = $_SESSION['user']['UserType'];
$logged_user_id = $_SESSION['user']['ID'];
$first_name = trim($_POST["first_name"] ?? '');
$last_name = trim($_POST["last_name"] ?? '');
$DOB = $_POST["dob"] ?? '';
$gender = $_POST['selectGenderOptions'] ?? null;
$studentID = trim($_POST["Student_ID"] ?? '');
$program = $_POST["Program"] ?? '';
$country = $_POST['Country'] ?? '';
$email = trim($_POST["EMAIL"] ?? '');
$marital_status = trim($_POST["marital_status"] ?? '');
$BloodGroup = trim($_POST["Blood-Group"] ?? '');
$BloodPressure = $_POST['Blood-Pressure'] ?? '';
$SugarLevel = trim($_POST["Sugar-Level"] ?? '');
$temperature = trim($_POST["TEMPERATURE"] ?? '');
$pulse = trim($_POST["PULSE"] ?? '');
$resp = trim($_POST["RESP"] ?? '');
$spo2 = trim($_POST["SPO2"] ?? '');
$address = trim($_POST["Address"] ?? '');
$Symptoms = trim($_POST["Symptoms"] ?? '');
$MedicalHistory = trim($_POST["Medical-History"] ?? '');
$Treatment = trim($_POST["Treatment"] ?? '');
$DrugName = trim($_POST["Drug-Name"] ?? '');
$Dosage = trim($_POST["Dosage"] ?? '');
$Notes = isset($_POST['Notes']) ? trim($_POST["Notes"]) : null;

if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'] ?? '')) {
    die("<script>alert('Invalid CSRF token'); window.history.back();</script>");
}
$required_fields = [
    'first_name' => $first_name,
    'last_name' => $last_name,
    'dob' => $DOB,
    'gender' => $gender,
    'Student_ID' => $studentID,
    'Program' => $program,
    'Country' => $country,
    'EMAIL' => $email,
    'marital_status' => $marital_status,
    'Blood-Group' => $BloodGroup,
    'Blood-Pressure' => $BloodPressure,
    'Sugar-Level' => $SugarLevel,
    'TEMPERATURE' => $temperature,
    'PULSE' => $pulse,
    'RESP' => $resp,
    'SPO2' => $spo2,
    'Address' => $address,
    'Symptoms' => $Symptoms,
    'Medical-History' => $MedicalHistory,
    'Treatment' => $Treatment,
    'Drug-Name' => $DrugName,
    'Dosage' => $Dosage
];

foreach ($required_fields as $key => $value) {
    if (empty($value)) {
        die("<script>alert('Error: $key is required. Please fill in all required fields.'); window.history.back();</script>");
    }
}

// find the corresponding user
$user = $db->query('SELECT * from clinic_admins where id = :id', [
    'id' => $logged_user_id
])->findOrFail();

// authorize that the current user can edit the note
authorize($user['user_type'] == $logged_user_type );



// if (! Validator::string($_POST['body'], 1, 10)) {
//     $errors['body'] = 'A body of no more than 1,000 characters is required.';
// }

// if no validation errors, update the record in the notes database table.
// if (count($errors)) {
//     return views('notes/edit.view.php', [
//         'heading' => 'Edit Note',
//         'errors' => $errors,
//         'note' => $note
//     ]);
// }

$db->query('UPDATE patients SET 
    firstname = :firstname, 
    lastname = :lastname, 
    birthdate = :birthdate, 
    gender = :gender, 
    student_id = :student_id, 
    program = :program, 
    country = :country, 
    email = :email, 
    marital_status = :marital_status, 
    blood_group = :blood_group, 
    blood_pressure = :blood_pressure, 
    sugar_level = :sugar_level, 
    temperature = :temperature,
    pulse = :pulse,
    resp = :resp,
    spo2 = :spo2,
    address = :address, 
    symptoms = :symptoms, 
    medical_history = :medical_history, 
    treatment = :treatment, 
    drug_name = :drug_name, 
    dosage = :dosage, 
    notes = :notes
WHERE id = :id', [
    'firstname' => $first_name,
    'lastname' => $last_name,
    'birthdate' => $DOB,
    'gender' => $gender,
    'student_id' => $studentID,
    'program' => $program,
    'country' => $country,
    'email' => $email,
    'marital_status' => $marital_status,
    'blood_group' => $BloodGroup,
    'blood_pressure' => $BloodPressure,
    'sugar_level' => $SugarLevel,
    'temperature' => $temperature,
    'pulse' => $pulse,
    'resp' => $resp,
    'spo2' => $spo2,
    'address' => $address,
    'symptoms' => $Symptoms,
    'medical_history' => $MedicalHistory,
    'treatment' => $Treatment,
    'drug_name' => $DrugName,
    'dosage' => $Dosage,
    'notes' => $Notes,
    'id' => $_POST['id']
]);

$update = $db->query('UPDATE appointment SET status = :status WHERE student_id = :student_id AND date =:date', [
    'student_id' => $studentID,
    'status' => 'attended-to',
    'date' =>  date('Y-m-d')
]);

if (!$update) {
    // Redirect after successful insert
header('Location: /Clinic-Management-System/Patients-List');
exit();
}
// Redirect after successful insert
header('Location: /Clinic-Management-System/Patients-List');
exit();
// redirect the user

