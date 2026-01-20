<?php
use Core\App;
use Core\Database;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
$db = App::resolve(Database::class);
// var_dump($_POST);
// exit;
// Get form inputs
// Get form inputs
$first_name = trim($_POST["first_name"] ?? '');
$last_name = trim($_POST["last_name"] ?? '');
$DOB = $_POST["dob"] ?? '';
$gender = $_POST['selectGenderOptions'] ?? null;
$studentID = trim($_POST["Student_ID"] ?? '');
$program = $_POST["Program"] ?? '';
$country = $_POST['Country'] ?? '';
$phone1 = trim($_POST["mobPhone"] ?? '');
$phone2 = trim($_POST["telPhone"] ?? '');
$email = filter_var(trim($_POST["EMAIL"] ?? ''), FILTER_SANITIZE_EMAIL);
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
$DrugName = trim($_POST["DrugName"] ?? '');
$DrugIndex = trim($_POST["DrugIndex"] ?? '');
$Dosage = trim($_POST["Dosage"] ?? '');
$Quantity = trim($_POST["Quantity"] ?? '');
$Notes = isset($_POST['Notes']) ? strip_tags(trim($_POST["Notes"])) : null;
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
    'Mobile Phone' => $phone1,
    'Tel Phone' => $phone2,
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
    'Drug-Index' => $DrugIndex,
    'Dosage' => $Dosage,
    'Quantity' => $Quantity
];

foreach ($required_fields as $key => $value) {
    if (empty($value)) {
        die("<script>alert('Error: $key is required. Please fill in all required fields.'); window.history.back();</script>");
    }
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("<script>alert('Invalid email format.'); window.history.back();</script>");
  
}


$domain = substr(strrchr($email, "@"), 1);
if (checkdnsrr($domain, "MX")) {
   

// // Check if student exists
// $user = $db->query('SELECT firstname, lastname, idnumber, program, country
//                     FROM r_student 
//                     WHERE firstname = :first_name 
//                     AND lastname = :last_name 
//                     AND idnumber = :StudentID 
//                     AND program = :program 
//                     AND country = :country', [
//     'first_name' => $first_name,
//     'last_name' => $last_name,
//     'StudentID' => $studentID, 
//     'program' => $program,
//     'country' => $country,
    
// ])->find();

// if (!$user) {
//     // Redirect if student is not found
//     die('<script>alert("Student can not be found, please check student details very well"); window.history.back();</script>');
// }






$patients = $db->query('SELECT * FROM patients 
WHERE firstname = :firstname 
AND lastname = :lastname 
AND birthdate = :birthdate 
AND gender = :gender 
AND student_id = :student_id 
AND program = :program 
AND country = :country 
AND email = :email 
AND phone1 = :phone1
AND phone2 = :phone2
AND marital_status = :marital_status 
AND blood_group = :blood_group 
AND blood_pressure = :blood_pressure 
AND sugar_level = :sugar_level 
AND address = :address 
AND symptoms = :symptoms 
AND medical_history = :medical_history 
AND treatment = :treatment 
AND drug_name = :drug_name
AND drug_index = :Drug_Index 
AND dosage = :dosage 
AND notes = :notes', [
    'firstname' => $first_name,
    'lastname' => $last_name,
    'birthdate' => $DOB,
    'gender' => $gender,
    'student_id' => $studentID,
    'program' => $program,
    'country' => $country,
    'email' => $email,
    'phone1' => $phone1,
    'phone2' => $phone2,
    'marital_status' => $marital_status,
    'blood_group' => $BloodGroup,
    'blood_pressure' => $BloodPressure,
    'sugar_level' => $SugarLevel,
    'address' => $address,
    'symptoms' => $Symptoms,
    'medical_history' => $MedicalHistory,
    'treatment' => $Treatment,
    'drug_name' => $DrugName,
    'Drug_Index' => $DrugIndex,
    'dosage' => $Dosage,
    'notes' => $Notes
])->get();

// Check if a patient already exists
if ($patients && count($patients) > 0) {
    die('<script>alert("Patient has been added before, check patient list"); window.history.back();</script>');
}

try{
    $db->beginTransaction();

// Fetch drug stock
$drugStock = $db->query("SELECT quantity FROM drugs WHERE indexnumber = :drugID", [
    'drugID' => $DrugIndex
])->find();

if (!$drugStock) {
    die("<script>alert('Drug not found in stock.'); window.history.back();</script>");
}

$currentStock = (int) $drugStock['quantity'];
$prescribedQty = (int) $Quantity;

// Check if there's not enough stock
if ($prescribedQty > $currentStock) {
    die("<script>alert('Not enough stock. Only $currentStock unit(s) available.'); window.history.back();</script>");
}

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host = 'Your Server '; // Change if using a different mail server
    $mail->SMTPAuth = true;
   $mail->Username = $_ENV['SMTP_USERNAME'] ?? 'YOUR SMTP USERNAME'; 
        $mail->Password = $_ENV['SMTP_PASSWORD'] ?? 'YOUR SMTP PASSWORD';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('Your Email Address ', ' Health Care');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = 'Your Treatment Details';
    $mail->Body = "
        <p>Dear <b>$first_name $last_name</b>,</p>
        <p>Your recent medical treatment details are as follows:</p>
        <p><strong>Treatment:</strong> $Treatment</p>
        <p><strong>Prescribed Drug:</strong> $DrugName</p>
        <p><strong>Dosage:</strong> $Dosage</p>
        " . (!empty($Notes) ? "<p><strong>Additional Notes:</strong> $Notes</p>" : "") . "
        <p>Kindly follow the prescribed dosage. If you have any concerns, visit the clinic.</p>
        <br>
        <p>Regards,</p>
        <p><strong> Health Care</strong></p>
    ";

    $mail->send();

    // Insert patient record
$db->query('INSERT INTO patients 
(firstname, lastname, birthdate, gender, student_id, program, country, email, phone1, phone2, marital_status, blood_group, blood_pressure, sugar_level, temperature, pulse, resp, spo2, address, symptoms, medical_history, treatment, drug_name, drug_index, quantity, dosage, notes, date) 
VALUES 
(:firstname, :lastname, :birthdate, :gender, :student_id, :program, :country, :email, :phone1, :phone2, :marital_status, :blood_group, :blood_pressure, :sugar_level, :Temperature, :Pulse, :Resp, :Spo2, :address, :symptoms, :medical_history, :treatment, :drug_name, :Drug_Index, :Quantity, :dosage, :notes, :date)', [
'firstname' => $first_name,
'lastname' => $last_name,
'birthdate' => $DOB,
'gender' => $gender,
'student_id' => $studentID,
'program' => $program,
'country' => $country,
'email' => $email,
'phone1' => $phone1,
'phone2' => $phone2,
'marital_status' => $marital_status,
'blood_group' => $BloodGroup,
'blood_pressure' => $BloodPressure,
'sugar_level' => $SugarLevel,
'Temperature' => $temperature,
'Pulse' => $pulse,
'Resp' => $resp,
'Spo2' => $spo2,
'address' => $address,
'symptoms' => $Symptoms,
'medical_history' => $MedicalHistory,
'treatment' => $Treatment,
'drug_name' => $DrugName,
'Drug_Index' => $DrugIndex,
'Quantity' => $Quantity,
'dosage' => $Dosage,
'notes' => $Notes,
'date' => date('Y-m-d')
]);

// Update drug quantity
$affected = $db->query("UPDATE drugs SET quantity = quantity - :prescribedQty WHERE indexnumber = :drugID", [
    'prescribedQty' => $prescribedQty,
    'drugID' => $DrugIndex
]);
if ($affected->rowCount() === 0) {
    $db->rollBack();
    die("<script>alert('Stock might have just been updated. Not enough quantity left. Try again.'); window.history.back();</script>");
}
  // Commit transaction
  $db->commit();
} catch (Exception $e) {
    die("<script>alert('Error sending email: {$mail->ErrorInfo}'); window.history.back();</script>");
}
} catch (Exception $e) {
      // Roll back if anything failed
      $db->rollBack();
      die("<script>alert('Error: Sorry an error occurred'); window.history.back();</script>");
  }

$update = $db->query('UPDATE appointment SET status = :status WHERE student_id = :student_id', [
    'student_id' => $studentID,
    'status' => 'attended-to'
    ]);
    if (!$update) {
        // Redirect after successful insert
    header('Location: /Clinic-Management-System/Patients-List');
    exit();
    }
// Redirect after successful insert
header('Location: /Clinic-Management-System/Patients-List');
exit();
} else {
    die('<script>alert("Email domain not reachable"); window.history.back();</script>');
    
}