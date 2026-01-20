<?php

use Core\App;
use Core\Database;
use Core\Validator;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
$db = App::resolve(Database::class);
$logged_user_type = $_SESSION['user']['UserType'];
$logged_user_id = $_SESSION['user']['ID'];


$fullname = trim($_POST["fullname"] ?? '');
$age = $_POST["age"] ?? '';
$studentID = trim($_POST["Student_ID"] ?? '');
$email = trim($_POST["EMAIL"] ?? '');
$program = trim($_POST["program"] ?? '');
$gender = trim($_POST["gender"] ?? '');
$phone_number = trim($_POST["phone_number"] ?? '');
$date = trim($_POST["date"] ?? '');
$time = trim($_POST["time"] ?? '');
$problem = trim($_POST["problem"] ?? '');
$status = 'pending'; // Default status
$appointmentId = $_POST['id'] ?? null;

if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'] ?? '')) {
    die("<script>alert('Invalid CSRF token'); window.history.back();</script>");
}
// ✅ Required fields validation
$required_fields = [
    'Full Name' => $fullname,
    'Age' => $age,
    'Student ID' => $studentID,
    'Email' => $email,
    'Program' => $program,
    'Gender' => $gender,
    'Phone Number' => $phone_number,
    'Date' => $date,
    'Time' => $time,
    'Problem' => $problem,
    'Appointment ID' => $appointmentId
];

foreach ($required_fields as $key => $value) {
    if (empty($value)) {
        die("<script>alert('Error: $key is required. Please fill in all required fields.'); window.history.back();</script>");
    }
}





$existingAppointment = $db->query('SELECT date, time, problem FROM appointment WHERE id = :id AND status = :status', [
    'id' => $appointmentId,
    'status' => $status
])->find();

if (!$existingAppointment) {
    die("<script>alert('Error: Appointment not found.'); window.history.back();</script>");
}


$changesMade = false;
$emailBody = "<p>Dear $fullname,</p><p>Your appointment details have been updated and it been processed. Here are the new details:</p><ul>";

if ($existingAppointment['date'] !== $date) {
    $changesMade = true;
    $emailBody .= "<li><strong>New Date:</strong> $date</li>";
}
if ($existingAppointment['time'] !== $time) {
    $changesMade = true;
    $emailBody .= "<li><strong>New Time:</strong> $time</li>";
}
if ($existingAppointment['problem'] !== $problem) {
    $changesMade = true;
    $emailBody .= "<li><strong>Updated Problem:</strong> $problem</li>";
}

$emailBody .= "</ul><p>Please take note of these changes. If you have any questions, feel free to contact the clinic(+234 Your Phone Num).</p><br><p>Best Regards,</p><p><strong> Health Care</strong></p>";

// ✅ Send email only if changes were made
if ($changesMade) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'Your Server '; // Change this if using another mail server
        $mail->SMTPAuth = true;
       $mail->Username = $_ENV['SMTP_USERNAME'] ?? 'YOUR SMTP USERNAME'; 
        $mail->Password = $_ENV['SMTP_PASSWORD'] ?? 'YOUR SMTP PASSWORD';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('Your Email Address ', ' Health Care');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Your Appointment Details Have Been Updated';
        $mail->Body = $emailBody;

        $mail->send();
    } catch (Exception $e) {
        die("<script>alert('Error sending email: {$mail->ErrorInfo}'); window.history.back();</script>");
    }
}


// ✅ Update appointment
$db->query(
    'UPDATE appointment 
     SET fullname = :fullname, email = :email, student_id = :student_id, 
         program = :program, gender = :gender, age = :age, 
         phone_number = :phone_number, date = :date, time = :time, 
         problem = :problem, status = :status 
     WHERE id = :id',
    [
        'id' => $appointmentId,
        'fullname' => $fullname,
        'email' => $email,
        'student_id' => $studentID,
        'program' => $program,
        'gender' => $gender,
        'age' => $age,
        'phone_number' => $phone_number,
        'date' => $date,
        'time' => $time,
        'problem' => $problem,
        'status' => $status
    ]
);

// ✅ Redirect after successful update
header('Location: /Clinic-Management-System/Appointments-List');
exit;
