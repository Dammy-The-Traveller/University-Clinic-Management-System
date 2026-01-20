<?php
use Core\App;
use Core\Database;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

// include __DIR__ . '/../../../vendor/phpmailer/src/Exception.php';
// require __DIR__ . '/../../../vendor/phpmailer/src/PHPMailer.php';
// require __DIR__ . '/../../../vendor/phpmailer/src/SMTP.php';

$db = App::resolve(Database::class);

$today = date('Y-m-d');
$logged_user_email = $_SESSION['user']['email'];

// ✅ Find all approved appointments for today
$appointments = $db->query('SELECT email, date FROM appointment WHERE date = :today AND status = "approved"', [
    'today' => $today
])->get();

if (!$appointments) {
    echo "No appointments found for today.";
    exit;
}

// ✅ Loop through all appointments
foreach ($appointments as $appointment) {
    $studentEmail = $appointment["email"];
    $clinicAdminEmail = $logged_user_email;
    $appointmentDate = $appointment["date"];

   
    $subject = "Appointment Reminder - $appointmentDate";

   
    $mail = new PHPMailer(true);

    try {
        // ✅ Server settings
        $mail->isSMTP();
        $mail->Host = 'Your Server '; 
        $mail->SMTPAuth = true;
          $mail->Username = $_ENV['SMTP_USERNAME'] ?? 'YOUR SMTP USERNAME'; 
        $mail->Password = $_ENV['SMTP_PASSWORD'] ?? 'YOUR SMTP PASSWORD';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // ✅ Sender and recipient
        $mail->setFrom('Your Email Address ', 'School Health Care');
        $mail->addAddress($studentEmail); // Student's email

        // ✅ Email content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = "Dear Student,<br><br>
            This is a reminder about your appointment scheduled for today ($appointmentDate).<br>
            Please ensure you arrive on time.<br><br>
            Best Regards,<br>
            Lagos State University Health Care";

        // ✅ Send email to student
        $mail->send();
        echo "Reminder sent to student: $studentEmail <br>";

        
        $mail->clearAddresses(); 
        $mail->addAddress($clinicAdminEmail); // Clinic admin's email
        $mail->Subject = "Admin Reminder: Appointment Today - $appointmentDate";
        $mail->Body = "Dear Clinic Admin,<br><br>
            Reminder: A student has an appointment scheduled for today ($appointmentDate).<br>
            Please ensure everything is set.<br><br>
            Regards,<br> 
            School Health Care";
        
        $mail->send();
        echo "Reminder sent to admin: $clinicAdminEmail <br>";

    } catch (Exception $e) {
        echo "Mailer Error: {$mail->ErrorInfo} <br>";
    }
}
?>
