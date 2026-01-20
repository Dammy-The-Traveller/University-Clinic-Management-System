<?php
use Core\App;
use Core\Database;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

// include __DIR__ . '/../../../vendor/phpmailer/src/Exception.php';
// require __DIR__ . '/../../../vendor/phpmailer/src/PHPMailer.php';
// require __DIR__ . '/../../../vendor/phpmailer/src/SMTP.php';
$db = App::resolve(Database::class);
$logged_user_type = $_SESSION['user']['UserType'];
$logged_user_id = $_SESSION['user']['ID'];
$logged_user_email = $_SESSION['user']['email']; // ✅ Clinic admin email

// ✅ Get patient ID & student ID from request (sanitize input)
$PatientId = (int) trim($_POST['ID']);
$studentID = trim($_POST['student_ID']);
$status = 'approved';

if (!$PatientId || !$studentID) {
    echo json_encode(["success" => false, "error" => "Invalid request data."]);
    exit;
}

if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'] ?? '')) {
    die("<script>alert('Invalid CSRF token'); window.history.back();</script>");
}
try {
 

    
    $appointment = $db->query('SELECT fullname, email, date FROM appointment WHERE id = :ID', [
        'ID' => $PatientId
    ])->find();

    if (!$appointment) {
        echo json_encode(['error' => 'No matching appointment found']);
        exit;
    }

    $studentEmail = $appointment["email"];
    $appointmentDate = $appointment["date"];
     $fullname = $appointment["fullname"];
    // ✅ Update the appointment status
    $result = $db->query('UPDATE appointment SET status = :status WHERE id = :id AND student_id = :idnumber', [
        'id' => $PatientId,
        'idnumber' => $studentID,
        'status' => $status
    ]);

    if ($result) {
        // ✅ Send immediate approval email
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'Your Server '; // SMTP server
            $mail->SMTPAuth = true;
             $mail->Username = $_ENV['SMTP_USERNAME'] ?? 'YOUR SMTP USERNAME'; 
        $mail->Password = $_ENV['SMTP_PASSWORD'] ?? 'YOUR SMTP PASSWORD';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('Your Email Address ', 'School Health Care');
            $mail->addAddress($studentEmail);

            $mail->isHTML(true);
            $mail->Subject = 'Your Appointment Has Been Approved';
            $mail->Body = "<p>Dear <b>$fullname</b>,</p>
                Your appointment has been approved for <b>$appointmentDate</b>.<br>
                Please ensure you don't miss it.<br><br>
                Best Regards,<br>
                Lagos State University Health Care";

            $mail->send();

            echo json_encode(['success' => true, 'message' => 'Appointment Approved. Reminder Scheduled.']);
        } catch (Exception $e) {
            echo json_encode(['error' => 'Mailer Error: ' . $mail->ErrorInfo]);
        }
    } else {
        echo json_encode(['error' => 'Failed to update appointment status']);
    }
} catch (PDOException $e) {
    echo json_encode(['error' => 'Database error: Sorry an error occurred']);
}
?>
