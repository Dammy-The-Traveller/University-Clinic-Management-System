<?php
use Core\App;
use Core\Database;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

// include __DIR__ . '/../vendor/phpmailer/src/Exception.php';
// include __DIR__ . '/../vendor/phpmailer/src/PHPMailer.php';
// include __DIR__ .  '/../vendor/phpmailer/src/SMTP.php';
$db = App::resolve(Database::class);
$logged_user_type = $_SESSION['user']['UserType'];
$logged_user_id = $_SESSION['user']['ID'];


$PatientId = (int) trim($_POST['ID']);
$studentID = trim($_POST['student_ID']);
$reason = trim($_POST['reason'] ?? ''); 
$status = 'rejected';
if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'] ?? '')) {
    die("<script>alert('Invalid CSRF token'); window.history.back();</script>");
}
$required_fields = [
    'reason' => $reason
];

foreach ($required_fields as $key => $value) {
    if (empty($value)) {
        die("<script>alert('Error: $key is required. Please fill in all required fields.'); window.history.back();</script>");
    }
}

if (!$PatientId || !$studentID) {
    echo json_encode(["success" => false, "error" => "Invalid request data."]);
    exit;
}

try {
    
   

  
    $result = $db->query('UPDATE appointment SET status = :status, rejection_reason = :reason WHERE id = :id AND student_id = :idnumber', [
        'id' => $PatientId,
        'idnumber' => $studentID,
        'status' => $status,
        'reason' => $reason
    ]);

    if ($result) {
        
        // $student = $db->query('SELECT email FROM appointment WHERE id = :ID', [
        //     'ID' => $PatientId
        // ])->find();

        $appointment = $db->query('SELECT fullname, email FROM appointment WHERE id = :ID', [
            'ID' => $PatientId
        ])->find();

        if ($appointment) {
            $studentEmail = $appointment['email'];
            $fullname = $appointment["fullname"];
            // ✅ Send rejection email using PHPMailer
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'Your Server '; // SMTP server
                $mail->SMTPAuth = true;
                  $mail->Username = $_ENV['SMTP_USERNAME'] ?? 'YOUR SMTP USERNAME'; 
        $mail->Password = $_ENV['SMTP_PASSWORD'] ?? 'YOUR SMTP PASSWORD';
               $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;
                
                $mail->setFrom('Your Email Address ', 'School Clinic');
                $mail->addAddress($studentEmail);
                
                $mail->isHTML(true);
                $mail->Subject = "Your Appointment Has Been Rejected";
                $mail->Body = "<p>Dear <b>$fullname</b>,</p>
                <br>Your appointment has been rejected.
                <br><br><b>Reason:</b> $reason,
                <br><br>Please contact the clinic for further details(+234 055-020-4206).
                <br><br>Best Regards,<br>School Clinic";

                $mail->send();
                echo json_encode(['success' => true, 'message' => 'Appointment Rejected & Email Sent']);
            } catch (Exception $e) {
                echo json_encode(['error' => 'Email could not be sent. Mailer Error: ' . $mail->ErrorInfo]);
                exit;
            }
        } else {
            echo json_encode(['error' => 'No matching appointment found']);
            exit;
        }
    } else {
        echo json_encode(['error' => 'No matching appointment found']);
    }

} catch (PDOException $e) {
    echo json_encode(['error' => 'Database error: Sorry an error occurred']);
}
?>
