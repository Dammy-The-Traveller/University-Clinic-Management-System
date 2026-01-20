<?php
use Core\App;
use Core\Database;
use Core\Validator;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
$db = App::resolve(Database::class);
if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'] ?? '')) {
    die("<script>alert('Invalid CSRF token'); window.history.back();</script>");
}

// Get form inputs
$fullname = trim($_POST["fullname"]?? '');
$age = $_POST["age"];
$studentID = trim($_POST["Student_ID"]?? '');
$email = trim($_POST["EMAIL"]?? '');
$program = trim($_POST["program"]?? '');
$gender = trim($_POST["gender"]?? '');
$phone_number = trim($_POST["phone_number"]?? '');
$date = trim($_POST["date"]?? '');
$time = trim(date("H:i", strtotime($_POST["time"] ?? ''))?? '');
$problem = trim($_POST["problem"]?? '');
$status = 'pending';

if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
    
 } 


 if (! empty($errors)) {
    return views('book_appointment.view.php', [
        'errors' => $errors
    ]);
}
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
    'Problem' => $problem
];

foreach ($required_fields as $key => $value) {
    if (empty($value)) {
        die("<script>alert('Error: $key is required. Please fill in all required fields.'); window.history.back();</script>");
    }
}

// Check if an appointment already exists for the given date and time


$userAppointment = $db->query('SELECT * FROM appointment WHERE date = :date AND student_id = :student_id', [
    'date' => $date,
    'student_id' => $studentID,
])->find();

if ($userAppointment) {
    die('<script>alert("You already have an appointment for this day. Please reschedule or edit your existing appointment by visiting the clinic."); window.history.back();</script>');
}
$oldAppointment = $db->query('SELECT * FROM appointment WHERE date = :date AND time = :time', [
    'date' => $date,
    'time' => $time,
])->find();
if ($oldAppointment) {
    die('<script>alert("Someone else has already booked this slot. Please choose another time and date."); window.history.back();</script>');
}


// Check if the student exists
$user = $db->query('SELECT idnumber FROM r_student WHERE idnumber = :StudentID', [
    'StudentID' => $studentID,
])->find();

if (!$user) {
    // Redirect if student is not found
    die('<script>alert("Incorrect ID Number"); window.history.back();</script>');
}

if ($user) {
    
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'YOUR HOST'; // SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['SMTP_USERNAME'] ?? 'YOUR SMTP USERNAME'; 
        $mail->Password = $_ENV['SMTP_PASSWORD'] ?? 'YOUR SMTP PASSWORD';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('YOUR EMAIL ADDRESS', 'School Health Care');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Your Appointment Has Been Booked with School Health Care';
        $mail->Body = "<p>Dear <b>$fullname</b>,</p>
        <p>Your appointment with School Health Care has been successfully booked for <b>$date</b>.</p>
        <p>Please wait for further communication regarding the approval of your appointment.</p>
        <br>
        <p>Best Regards,<br>School Health Care</p>";
        

        $mail->send();

        $mail->clearAddresses(); 
        $mail->addAddress(''); // Clinic admin's email
        $mail->Subject = "Admin Reminder: Appointment- $date";
        $mail->Body = "Dear Clinic Admin,<br><br>
            Reminder: A student has an appointment scheduled for <b>$date</b>.<br>
            Please ensure everything is set.<br><br>
            Regards,<br> 
            School Health Care";
        
        $mail->send();

       // Insert appointment record
$db->query('INSERT INTO appointment (fullname, email, student_id, program, gender, age, phone_number, date, time, problem, status, rejection_reason) 
VALUES (:fullname, :email, :student_id, :program, :gender, :age, :phone_number, :date, :time, :problem, :status, :rejection_reason)', [
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
    'status' => $status,
    'rejection_reason' => 'none'
]);

    } catch (Exception $e) {
        die('<script>alert("Mail Error: ' . addslashes($mail->ErrorInfo) . '"); window.history.back();</script>');
    }
    
} 



// Redirect after successful insert
echo '<script>alert("Your appointment has been successfully booked!"); window.history.back();</script>';
exit();

