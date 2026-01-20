<?php

use Core\App;
use Core\Database;
use Core\Validator;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
// print_r($_ENV);
// exit;
$db = App::resolve(Database::class);
$logged_user_type = $_SESSION['user']['UserType'];
$logged_user_id = $_SESSION['user']['ID'];
$first_name = trim($_POST["first_name"] ?? '');
$last_name = trim($_POST["last_name"] ?? '');
$studentID = trim($_POST["Student_ID"] ?? '');
$email = trim($_POST["EMAIL"] ?? '');
$Treatment = trim($_POST["Treatment"] ?? '');
$DrugName = trim($_POST["DrugName"] ?? '');
$DrugIndex = trim($_POST["DrugIndex"] ?? '');
$Quantity = trim($_POST["Quantity"] ?? '');
$Dosage = trim($_POST["Dosage"] ?? '');
$Notes = isset($_POST['Notes']) ? trim($_POST["Notes"]) : null;
$date = date('Y-m-d'); 

if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'] ?? '')) {
    die("<script>alert('Invalid CSRF token'); window.history.back();</script>");
}
$required_fields = [
    'first name' => $first_name,
    'last name' => $last_name,
    'Student ID' => $studentID,
    'EMAIL' => $email,
    'Treatment' => $Treatment,
    'Drug Name' => $DrugName,
    'Drug Index' => $DrugIndex,
    'Quantity' => $Quantity,
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

// authorize that the current user can edit the prescription
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

$OldPrescriptions = $db->query('SELECT id, firstname, lastname, student_id, email, treatment, drug_name, dosage, notes FROM patients WHERE student_id = :student_id',[
    'student_id' => $studentID
])->find();


$first_name = $OldPrescriptions ["firstname"];
$lastname = $OldPrescriptions ["lastname"];
$OldPrescriptionsID = $OldPrescriptions ["id"];
$student_id = $OldPrescriptions ["student_id"];
$Email = $OldPrescriptions ["email"];
$treatment = $OldPrescriptions ["treatment"];
$drug_name = $OldPrescriptions ["drug_name"];
$dosage = $OldPrescriptions ["dosage"];
$notes = $OldPrescriptions ['notes'];




if ($OldPrescriptions) {
    
    $emailBody = "
    <p>Dear <b>$first_name $last_name</b>,</p>
    <p>Your prescription has been updated with the following details:</p>
    <ul>
        <li><strong>Treatment:</strong> $Treatment</li>
        <li><strong>Drug Name:</strong> $DrugName</li>
        <li><strong>Dosage:</strong> $Dosage</li>";
if (!empty($Notes)) {
    $emailBody .= "<li><strong>Notes:</strong> $Notes</li>";
}
$emailBody .= "
    </ul>
    <p>Please follow the prescribed instructions carefully. If you have any concerns, do not hesitate to reach out.</p>
    <br>
    <p>Best Regards,</p>
    <p><strong> Health Care</strong></p>";

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

// ✅ Send email
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
    $mail->Subject = 'Your Prescription Has Been Updated';
    $mail->Body = $emailBody;

    $mail->send();
} catch (Exception $e) {
    die('<script>alert("Error sending email: ' . addslashes($mail->ErrorInfo) . '"); window.history.back();</script>');
}


$db->query('INSERT INTO old_prescriptions 
(firstname, lastname,  student_id, email, treatment, drug_name, dosage, notes, date) 
VALUES 
(:firstname, :lastname,:student_id, :email, :treatment, :drug_name, :dosage, :notes, :date)', [
'firstname' => $first_name,
'lastname' => $lastname,
'student_id' => $student_id,
'email' => $Email,
'treatment' => $treatment,
'drug_name' => $drug_name,
'dosage' => $dosage,
'notes' => $notes,
'date' => $date
]);





$user = $db->query('UPDATE patients SET 
    firstname = :firstname, 
    lastname = :lastname, 
    student_id = :student_id,
    email = :email, 
    treatment = :treatment, 
    drug_name = :drug_name,
    drug_index = :drug_index,
    quantity = :quantity, 
    dosage = :dosage, 
    notes = :notes
WHERE id = :id', [
    'firstname' => $first_name,
    'lastname' => $last_name,
    'student_id' => $studentID,
    'email' => $email,
    'treatment' => $Treatment,
    'drug_name' => $DrugName,
    'drug_index' => $DrugIndex,
    'quantity' => $Quantity,
    'dosage' => $Dosage,
    'notes' => $Notes,
    'id' => $_POST['id']
]);

$affected = $db->query("UPDATE drugs SET quantity = quantity - :prescribedQty WHERE indexnumber = :drugID", [
    'prescribedQty' => $prescribedQty,
    'drugID' => $DrugIndex
]);

if ($affected->rowCount() === 0) {
    $db->rollBack();
    die("<script>alert('Stock might have just been updated. Not enough quantity left. Try again.'); window.history.back();</script>");
}

$db->commit();
}catch (Exception $e) {
    // Roll back if anything failed
    $db->rollBack();
    die("<script>alert('Error: Sorry an error occurred'); window.history.back();</script>");
}
// redirect the user
header('location: /Clinic-Management-System/Prescription-List');
exit;
}
